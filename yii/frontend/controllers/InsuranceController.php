<?php

namespace frontend\controllers;

use common\models\InsuranceCountries;
use common\models\Plans;
use common\models\Policy;
use common\models\PolicyDraft;
use common\models\PolicyDraftPassengers;
use common\models\Pricing;
use frontend\models\InquiryForm;
use Yii;
use yii\web\UploadedFile;

class InsuranceController extends \yii\web\Controller
{
    public function actionTravel()
    {
        $model = new InquiryForm();
        $model->setAttributes(\Yii::$app->request->get('InquiryForm'));
        if ($model->load(Yii::$app->request->post())) {
            $passengers = $model->adult + $model->children;
            $price = Pricing::find()->where(['plan_id'=>$model->plan])->andWhere(['duration'=>$model->duration])->one();

            $draft = new PolicyDraft();
            $draft->insurance_id = $model->type;
            $draft->plan_id = $model->plan;
            $draft->DepartCountryCode = $model->from_country;
            $draft->ArrivalCountryCode = $model->to_country;
            $draft->departure_date = strtotime($model->date);
            $duration = '+'.($model->duration-1).' day';
            $draft->return_date = strtotime($duration, $draft->departure_date);
            $draft->adult = $model->adult;
            $draft->children = $model->children;
            $draft->infant = $model->infants;
            $draft->price = ($price->price*$passengers);
            if($draft->save()){
                return $this->redirect(['insurance/passengers',
                    'draft'=>$draft->id
                ]);
            }else{
                var_dump($draft->errors);
                die();
            }

        }
        $plans = Plans::find()->where(['insurance_id'=>$model->type])->all();
        $insuranceCountry = InsuranceCountries::find()->where(['insurance_id'=>$model->type])->andWhere(['country_code'=>$model->from_country])->one();
        $options = array();
        foreach ($plans as $plan){
            $insuranceTitle = $plan->insurance->name;
            $price = Pricing::find()->where(['plan_id'=>$plan->id])->andWhere(['duration'=>$model->duration])->one();
            $options[$plan->id] = array('name' => $plan->name, 'price'=>$price->price);
        }
        return $this->render('index',[
            'model' => $model,
            'options' => $options,
            'insuranceTitle' => $insuranceTitle,
            'insuranceCountry' => $insuranceCountry
        ]);
    }
    public function actionPassengers($draft)
    {
        $policy = PolicyDraft::findOne($draft);
        $policy->setScenario('update');
        $attr = array();

        if($policy->adult != null){
            for ($i = 1; $i <= $policy->adult; $i++){
                $name = 'Adult' . ($i);
                $attr[] = $name;
                $labels[$name] = ucwords(Yii::t('app', "Adult Passport (#".($i).")"));
            }
        }
        if($policy->children != null){
            for ($i = 1; $i <= $policy->children; $i++){
                $name = 'Child' . ($i);
                $attr[] = $name;
                $labels[$name] = ucwords(Yii::t('app', "Child Passport (#".($i).")"));
            }
        }
        if($policy->infant != null){
            for ($i = 1; $i <= $policy->infant; $i++){
                $name = 'Infant' . ($i);
                $attr[] = $name;
                $labels[$name] = ucwords(Yii::t('app', "Infant Passport (#".($i).")"));
            }
        }

        $model = new \yii\base\DynamicModel($attr);
        $model->setAttributeLabels($labels);
        $model->addRule($attr, 'required');

        if ($model->load(Yii::$app->request->post()) && $policy->load(Yii::$app->request->post())) {
            $policy->save();
            foreach ($attr as $item){
                $model->$item = UploadedFile::getInstance($model, $item);
                $file = $model->$item;
                $fileName = rand() . '-' . strtotime(date('Y-m-d H:i:s')) . '.' . $file->extension;
                $path = 'uploads/' . $fileName;
                if($file->saveAs($path)){
                            $post = [
                                'file_base64' => base64_encode(file_get_contents('C:/xampp/htdocs/policy/uploads/' . $fileName)),
                                'apikey' => 'pS2xHPtEAwqbspQBxFBYKpFIO54pqwNg',
                                'authenticate' => true,
                                'authenticate_module' => 2,
                                'verify_expiry' => true,
                                'type' => "IPD"

                            ];
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, 'https://api.idanalyzer.com');
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
                            $response = curl_exec($ch);
                            $json_request= json_decode( $response, TRUE );
                            if(isset($json_request['error'])){
                                Yii::$app->session->setFlash('error', $json_request['error']['message']);
                            }elseif($json_request['verification']['passed']){
                                $dob = isset($json_request['result']['dob'])?$json_request['result']['dob']:"null";
                                $PolicyDraftPassengers = new PolicyDraftPassengers();
                                $PolicyDraftPassengers->draft_id = $policy->id;
                                $PolicyDraftPassengers->id_number = (isset($json_request['result']['documentNumber']))?$json_request['result']['documentNumber']:"null";
                                $PolicyDraftPassengers->first_name = (isset($json_request['result']['firstName']))?$json_request['result']['firstName']:"null";
                                $PolicyDraftPassengers->middle_name = (isset($json_request['result']['middleName']))?$json_request['result']['middleName']:"null";
                                $PolicyDraftPassengers->last_name = (isset($json_request['result']['lastName']))?$json_request['result']['lastName']:"null";
                                $PolicyDraftPassengers->dob = strtotime($dob);
                                $PolicyDraftPassengers->id_type = (isset($json_request['result']['documentType']))?$json_request['result']['documentType']:"null";
                                $PolicyDraftPassengers->country = (isset($json_request['result']['issuerOrg_full']))?$json_request['result']['issuerOrg_full']:"null";
                                $PolicyDraftPassengers->nationality = (isset($json_request['result']['nationality_full']))?$json_request['result']['nationality_full']:"null";
                                $PolicyDraftPassengers->gender = (isset($json_request['result']['sex']))?$json_request['result']['sex']:"null";
                                $PolicyDraftPassengers->warning = (isset($json_request['authentication']['warning']))? implode(',',$json_request['authentication']['warning']):"null";
                                $PolicyDraftPassengers->document_link = '/uploads/' . $fileName;
                                $PolicyDraftPassengers->save();
                                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
                            }else{
                                Yii::$app->session->setFlash('error', join(" and ",$json_request['authentication']['warning']));
                            }
                }
            }
            return $this->redirect(['review', 'draft'=>$policy->id]);

        }

        return $this->render('passengers',[
            'model' => $model,
            'policy' => $policy,
        ]);
    }
    public function actionReview($draft){
        $policy = PolicyDraft::findOne($draft);

        return $this->render('review',[
            'policy' => $policy,
        ]);
    }
    public function actionCountry(){
        $model = new InquiryForm();
        return $this->render('country',[
            'model' => $model,
        ]);
    }
    public function actionPrograms(){
        $model = new InquiryForm();
        return $this->render('programs',[
            'model' => $model,
        ]);
    }
}

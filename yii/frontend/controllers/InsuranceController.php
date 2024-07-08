<?php

namespace frontend\controllers;

use common\models\Countries;
use common\models\Customers;
use common\models\InsuranceCountries;
use common\models\Insurances;
use common\models\Plans;
use common\models\PlansCoverage;
use common\models\PlansItems;
use common\models\Policy;
use common\models\PolicyDraft;
use common\models\PolicyDraftPassengers;
use common\models\Pricing;
use frontend\models\InquiryForm;
use GuzzleHttp\Psr7\Request;
use PhpOffice\PhpSpreadsheet\Chart\Title;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class InsuranceController extends \yii\web\Controller
{

    public function actionTravel()
    {
        // dd("shatha");
        $model = new InquiryForm();

        $model->setAttributes(\Yii::$app->request->get('InquiryForm'));
        // dd($model);
        $fromCountryName = $this->getCountryName($model->from_country);
        $toCountryName = $this->getCountryName($model->to_country);
        if ($model->load(Yii::$app->request->post())) {

            $passengers = $model->adult + $model->children;
            $price = Pricing::find()
                ->where(['plan_id' => $model->plan])
                ->andWhere(['duration' => $model->duration])
                ->one();
            $draft = new PolicyDraft();
            $draft->insurance_id = $model->type;
            $draft->plan_id = $model->plan;
            $draft->DepartCountryCode = $model->from_country;
            $draft->ArrivalCountryCode = $model->to_country;
            $draft->departure_date = strtotime($model->date);
            $duration = '+' . ($model->duration - 1) . ' day';
            $draft->return_date = strtotime($duration, $draft->departure_date);
            $draft->adult = $model->adult;
            $draft->children = $model->children;
            $draft->infant = $model->infants;
            $draft->price = ($price->price * $passengers);

            if ($draft->save()) {
                return $this->redirect(['insurance/passengers', 'draft' => $draft->id]);
            } else {
                var_dump($draft->errors);
                die();
            }
        }
        $plans = Plans::find()
            ->where(['insurance_id' => $model->type])
            ->all();
        $insuranceCountry = InsuranceCountries::find()
            ->where(['insurance_id' => $model->type])
            ->andWhere(['country_code' => $model->from_country])
            ->one();



       
        
            
            foreach ($plans as $plan) {
                $insuranceTitle = $plan->insurance->name;
            
                $price = Pricing::find()
                    ->where(['plan_id' => $plan->id])
                    ->andWhere(['duration' => $model->duration])
                    ->one();
                $options[$plan->id] = [
                    'name' => $plan->name,
                    'price' => $price ? $price->price : 0,
                    'discount_price' => $price ? $price->discount_price : null,
                    'status' => $price ? $price->status : 'Pricing::STATUS_INACTIVE',
                ];
            }
            
            
            
        // dd($planCoverageItems);
        return $this->render('index', [
            'model' => $model,
            'options' => $options,
            'insuranceTitle' => $insuranceTitle ?? '',
            'insuranceCountry' => $insuranceCountry,
            'fromCountryName' => $fromCountryName,
            'toCountryName' => $toCountryName,
        ]);
    }


    protected function getCountryName($countryCode)
    {
        $country = Countries::findOne(['code' => $countryCode]);
        return $country ? $country->country : null;
    }


    public function actionPassengers($draft)
    {
        $policy = PolicyDraft::findOne($draft);

        $policy->setScenario('update');
        $attr = array();

        if ($policy->adult != null) {
            for ($i = 1; $i <= $policy->adult; $i++) {
                $name = 'Adult' . ($i);
                $attr[] = $name;
                $labels[$name] = ucwords(Yii::t('app', "Adult Passport (#" . ($i) . ")"));
            }
        }
        if ($policy->children != null) {
            for ($i = 1; $i <= $policy->children; $i++) {
                $name = 'Child' . ($i);
                $attr[] = $name;
                $labels[$name] = ucwords(Yii::t('app', "Child Passport (#" . ($i) . ")"));
            }
        }
        if ($policy->infant != null) {
            for ($i = 1; $i <= $policy->infant; $i++) {
                $name = 'Infant' . ($i);
                $attr[] = $name;
                $labels[$name] = ucwords(Yii::t('app', "Infant Passport (#" . ($i) . ")"));
            }
        }

        $model = new \yii\base\DynamicModel($attr);
        $model->setAttributeLabels($labels);
        $model->addRule($attr, 'required');

        if ($model->load(Yii::$app->request->post()) && $policy->load(Yii::$app->request->post())) {

            $policy->save();
            foreach ($attr as $item) {
                $model->$item = UploadedFile::getInstance($model, $item);

                $file = $model->$item;
                $fileName = rand() . '-' . strtotime(date('Y-m-d H:i:s')) . '.' . $file->extension;
                $path = 'uploads/' . $fileName;
                if ($file->saveAs($path)) {
                    $post = [
                        'file_base64' => base64_encode(file_get_contents('C:/xampp/htdocs/yii/uploads/' . $fileName)),
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

                    $json_request = json_decode($response, TRUE);

                    if (isset($json_request['error'])) {

                        Yii::$app->session->setFlash('error', $json_request['error']['message']);
                    } elseif ($json_request['verification']['passed']) {
                        dd("shatha");
                        $dob = isset($json_request['result']['dob']) ? $json_request['result']['dob'] : "null";
                        $PolicyDraftPassengers = new PolicyDraftPassengers();
                        $PolicyDraftPassengers->draft_id = $policy->id;
                        $PolicyDraftPassengers->id_number = (isset($json_request['result']['documentNumber'])) ? $json_request['result']['documentNumber'] : "null";
                        $PolicyDraftPassengers->first_name = (isset($json_request['result']['firstName'])) ? $json_request['result']['firstName'] : "null";
                        $PolicyDraftPassengers->middle_name = (isset($json_request['result']['middleName'])) ? $json_request['result']['middleName'] : "null";
                        $PolicyDraftPassengers->last_name = (isset($json_request['result']['lastName'])) ? $json_request['result']['lastName'] : "null";
                        $PolicyDraftPassengers->dob = strtotime($dob);
                        $PolicyDraftPassengers->id_type = (isset($json_request['result']['documentType'])) ? $json_request['result']['documentType'] : "null";
                        $PolicyDraftPassengers->country = (isset($json_request['result']['issuerOrg_full'])) ? $json_request['result']['issuerOrg_full'] : "null";
                        $PolicyDraftPassengers->nationality = (isset($json_request['result']['nationality_full'])) ? $json_request['result']['nationality_full'] : "null";
                        $PolicyDraftPassengers->gender = (isset($json_request['result']['sex'])) ? $json_request['result']['sex'] : "null";
                        $PolicyDraftPassengers->warning = (isset($json_request['authentication']['warning'])) ? implode(',', $json_request['authentication']['warning']) : "null";
                        $PolicyDraftPassengers->document_link = '/uploads/' . $fileName;
                        $PolicyDraftPassengers->save();
                        Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
                    } else {
                        Yii::$app->session->setFlash('error', join(" and ", $json_request['authentication']['warning']));
                    }
                }
            }
            return $this->redirect(['review', 'draft' => $policy->id]);
        }

        return $this->render('passengers', [
            'model' => $model,
            'policy' => $policy,
        ]);
    }



    public function actionReview($draft)
    {
        $policy = PolicyDraft::findOne($draft);

        return $this->render('review', [
            'policy' => $policy,
        ]);
    }

    public function actionType($slug = null)
    {

        if ($slug === null) {
            $firstInsurance = Insurances::find()->orderBy(['id' => SORT_ASC])->one();
            if ($firstInsurance !== null) {
                $slug = $firstInsurance->slug;
            } else {
                throw new NotFoundHttpException('No insurance records found.');
            }
        }

        $model = new InquiryForm();

        $country = InsuranceCountries::findOne(['slug' => $slug]);
        $insurance = Insurances::findOne(['slug' => $slug]);

        if ($country === null && $insurance === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('country', [
            'model' => $model,
            'country' => $country,
            'insurance' => $insurance,
        ]);
    }




    public function actionPrograms()
    {
        $model = new InquiryForm();
        return $this->render('programs', [
            'model' => $model,
        ]);
    }
    public function actionCheck()
    {
        $model = new \yii\base\DynamicModel(['country_code', 'mobile']);
        $model->addRule(['country_code', 'mobile'], 'required');
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $country_code = $model->country_code;
            $mobile = $model->mobile;

            
            $full_mobile = $country_code . ltrim($mobile, '0');
    
            $customer = Customers::findOne(['mobile' => $full_mobile]);
            if ($customer) {
                // Send OTP
                $response = $this->sendOtp($full_mobile);
                $responseData = json_decode($response, true);
    
                if ($responseData['status'] == 201) {
                    Yii::$app->session->setFlash('success', 'OTP sent successfully.');
                    Yii::$app->session->set('mobile', $full_mobile);
                    return $this->redirect(['verify-otp']);
                } else {
                    Yii::$app->session->setFlash('error', 'Failed to send OTP.');
                }
            } else {
                Yii::$app->session->setFlash('error', 'Mobile number not found.');
            }
        }
    
        return $this->render('policy', [
            'model' => $model,
        ]);
    }
    
    private function sendOtp($mobile)
    {
        $curl = curl_init();
    
        $from = "360Protect";
        $message = "Hello from Releans API";
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.releans.com/v2/otp/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "sender=$from&mobile=$mobile&content=$message",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJpZCI6ImEzNWE5MmFmLWVhMGItNGYwNy04ZmMzLWQ2NmM3NWVmOTlkZCIsImlhdCI6MTcyMDA3NzI4MSwiaXNzIjoxOTQ3OH0.-cHxsksuyLILpuuBbKmNAo_TiZSJTwmtjNPF1CeyRug"
            ),
        ));
    
        $response = curl_exec($curl);
        curl_close($curl);
    
        return $response;
    }
    
    public function actionVerifyOtp()
    {
        $model = new \yii\base\DynamicModel(['otp']);
        $model->addRule(['otp'], 'required');
    
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $otp = $model->otp;
            $mobile = Yii::$app->session->get('mobile');
    
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.releans.com/v2/otp/check",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "mobile=$mobile&code=$otp",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJpZCI6ImEzNWE5MmFmLWVhMGItNGYwNy04ZmMzLWQ2NmM3NWVmOTlkZCIsImlhdCI6MTcyMDA3NzI4MSwiaXNzIjoxOTQ3OH0.-cHxsksuyLILpuuBbKmNAo_TiZSJTwmtjNPF1CeyRug"
                ),
            ));
    
            $response = curl_exec($curl);
            curl_close($curl);
    
            $responseData = json_decode($response, true);
    
            if (isset($responseData['status']) && $responseData['status'] == 200) {
                Yii::$app->session->setFlash('success', 'OTP verified successfully.');
                return $this->redirect(['display-policy']);
            } else {
                Yii::$app->session->setFlash('error', 'Failed to verify OTP.');
            }
        }
    
        return $this->render('verify-otp', [
            'model' => $model,
        ]);
    }
    




    // private function verifyOtp($mobile, $otp)
    // {
    //     $curl = curl_init();
    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => "https://api.releans.com/v2/otp/check",
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => "",
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => "POST",
    //         CURLOPT_POSTFIELDS => "mobile=$mobile&code=$otp",
    //         CURLOPT_HTTPHEADER => array(
    //             "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJpZCI6ImEzNWE5MmFmLWVhMGItNGYwNy04ZmMzLWQ2NmM3NWVmOTlkZCIsImlhdCI6MTcyMDA3NzI4MSwiaXNzIjoxOTQ3OH0.-cHxsksuyLILpuuBbKmNAo_TiZSJTwmtjNPF1CeyRug"
    //         ),
    //     ));


    //     dd( array(
    //         CURLOPT_URL => "https://api.releans.com/v2/otp/check",
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => "",
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => "POST",
    //         CURLOPT_POSTFIELDS => "mobile=$mobile&code=$otp",
    //         CURLOPT_HTTPHEADER => array(
    //             "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJpZCI6ImEzNWE5MmFmLWVhMGItNGYwNy04ZmMzLWQ2NmM3NWVmOTlkZCIsImlhdCI6MTcyMDA3NzI4MSwiaXNzIjoxOTQ3OH0.-cHxsksuyLILpuuBbKmNAo_TiZSJTwmtjNPF1CeyRug"
    //         ),
    //     ) );
    //     $response = curl_exec($curl);

    //     curl_close($curl);
    //     return $response;
    // }


    public function actionDisplayPolicy()
    {
        $mobile = Yii::$app->session->get('mobile');
        $customer = Customers::findOne(['mobile' => $mobile]);

        if ($customer) {
            $policies = Policy::find()->where(['customer_id' => $customer->id])->all();
        } else {
            $policies = [];
        }
        Yii::$app->session->remove('mobile');
        return $this->render('display-policy', [
            'policies' => $policies,
        ]);
    }
}

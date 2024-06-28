<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "policy_draft".
 *
 * @property int $id
 * @property int $insurance_id
 * @property int $plan_id
 * @property string|null $email
 * @property string|null $mobile
 * @property string|null $from_airport
 * @property string|null $DepartCountryCode
 * @property int $departure_date
 * @property string|null $going_to
 * @property string|null $ArrivalCountryCode
 * @property int $return_date
 * @property int $created_at
 * @property int $updated_at
 * @property int|null $source
 * @property float|null $price
 * @property int|null $adult
 * @property int|null $children
 * @property int|null $infant
 *
 * @property Insurances $insurance
 * @property Plans $plan
 * @property PolicyDraftPassengers[] $policyDraftPassengers
 */
class PolicyDraft extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'policy_draft';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mobile', 'email'], 'required', 'on' => 'update'],
            [[ 'plan_id', 'departure_date', 'return_date'], 'required'],
            [[ 'plan_id', 'departure_date', 'return_date', 'created_at', 'updated_at', 'source', 'adult', 'children', 'infant'], 'integer'],
            [['price'], 'number'],
            [['email', 'mobile'], 'string', 'max' => 255],
            [['from_airport', 'going_to'], 'string', 'max' => 100],
            [['DepartCountryCode', 'ArrivalCountryCode'], 'string', 'max' => 11],
            ['exist', 'skipOnError' => true, 'targetClass' => Insurances::class, 'targetAttribute' => ['insurance_id' => 'id']],
            [['plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plans::class, 'targetAttribute' => ['plan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
       
            'plan_id' => Yii::t('app', 'Plan ID'),
            'email' => Yii::t('app', 'Email'),
            'mobile' => Yii::t('app', 'Mobile'),
            'from_airport' => Yii::t('app', 'From Airport'),
            'DepartCountryCode' => Yii::t('app', 'Depart Country Code'),
            'departure_date' => Yii::t('app', 'Departure Date'),
            'going_to' => Yii::t('app', 'Going To'),
            'ArrivalCountryCode' => Yii::t('app', 'Arrival Country Code'),
            'return_date' => Yii::t('app', 'Return Date'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'source' => Yii::t('app', 'Source'),
            'price' => Yii::t('app', 'Price'),
            'adult' => Yii::t('app', 'Adult'),
            'children' => Yii::t('app', 'Children'),
            'infant' => Yii::t('app', 'Infant'),
        ];
    }

    /**
     * Gets query for [[Insurance]].
     *
     * @return \yii\db\ActiveQuery
     */

    /**
     * Gets query for [[Plan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(Plans::class, ['id' => 'plan_id']);
    }

    /**
     * Gets query for [[PolicyDraftPassengers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPolicyDraftPassengers()
    {
        return $this->hasMany(PolicyDraftPassengers::class, ['draft_id' => 'id']);
    }
}

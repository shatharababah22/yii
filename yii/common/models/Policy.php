<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "policy".
 *
 * @property int $id
 * @property int $customer_id
 * @property string $from_airport
 * @property string|null $DepartCountryCode
 * @property int $departure_date
 * @property string $going_to
 * @property string|null $ArrivalCountryCode
 * @property int $return_date
 * @property string|null $ProposalState
 * @property string|null $ItineraryID
 * @property string|null $PNR
 * @property string|null $PolicyNo
 * @property string|null $PolicyPurchasedDateTime
 * @property string|null $PolicyURLLink
 * @property int $status
 * @property string|null $status_description
 * @property int $created_at
 * @property int $updated_at
 * @property int|null $source
 * @property float|null $price
 */
class Policy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'policy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'from_airport', 'departure_date', 'going_to', 'return_date', 'status', 'created_at', 'updated_at'], 'required'],
            [['customer_id', 'departure_date', 'return_date', 'status', 'created_at', 'updated_at', 'source'], 'integer'],
            [['PolicyURLLink', 'status_description'], 'string'],
            [['price'], 'number'],
            [['from_airport', 'going_to', 'ProposalState'], 'string', 'max' => 100],
            [['DepartCountryCode', 'ArrivalCountryCode'], 'string', 'max' => 11],
            [['ItineraryID'], 'string', 'max' => 255],
            [['PNR', 'PolicyNo', 'PolicyPurchasedDateTime'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'customer_id' => Yii::t('app', 'Customer Email'),
            'from_airport' => Yii::t('app', 'From Airport'),
            'DepartCountryCode' => Yii::t('app', 'Depart Country Code'),
            'departure_date' => Yii::t('app', 'Departure Date'),
            'going_to' => Yii::t('app', 'Going To'),
            'ArrivalCountryCode' => Yii::t('app', 'Arrival Country Code'),
            'return_date' => Yii::t('app', 'Return Date'),
            'ProposalState' => Yii::t('app', 'Proposal State'),
            'ItineraryID' => Yii::t('app', 'Itinerary ID'),
            'PNR' => Yii::t('app', 'Pnr'),
            'PolicyNo' => Yii::t('app', 'Policy No'),
            'PolicyPurchasedDateTime' => Yii::t('app', 'Policy Purchased Date Time'),
            'PolicyURLLink' => Yii::t('app', 'Policy Url Link'),
            'status' => Yii::t('app', 'Status'),
            'status_description' => Yii::t('app', 'Status Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'source' => Yii::t('app', 'Source'),
            'price' => Yii::t('app', 'Price'),
        ];
    }


 

    public function getCustomer()
    {
        return $this->hasOne(Customers::class, ['id' => 'customer_id']);
    }
}

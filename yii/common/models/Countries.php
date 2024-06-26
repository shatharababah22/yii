<?php
namespace common\models;

use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property int $id
 * @property string $code
 * @property string $country
 * @property float|null $callCode
 * @property string $zone
 * @property string|null $currency
 * @property int $active
 * @property Airports[] $airports
 */

class Countries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'country'], 'required'],
            [['callCode'], 'number'],
            [['active'], 'integer'],
            [['code', 'currency'], 'string', 'max' => 5],
            [['country'], 'string', 'max' => 255],
            [['zone'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'country' => Yii::t('app', 'Country'),
            'callCode' => Yii::t('app', 'Call Code'),
            'zone' => Yii::t('app', 'Zone'),
            'currency' => Yii::t('app', 'Currency'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * Gets query for [[Airports]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAirports()
    {
        return $this->hasMany(Airports::class, ['country_id' => 'id']);
    }
}

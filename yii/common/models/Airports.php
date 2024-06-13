<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "airports".
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $cityCode
 * @property string|null $cityName
 * @property string|null $countryName
 * @property string|null $countryCode
 */
class Airports extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'airports';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'cityCode'], 'string', 'max' => 50],
            [['name', 'cityName', 'countryName', 'countryCode'], 'string', 'max' => 200],
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
            'name' => Yii::t('app', 'Name'),
            'cityCode' => Yii::t('app', 'City Code'),
            'cityName' => Yii::t('app', 'City Name'),
            'countryName' => Yii::t('app', 'Country Name'),
            'countryCode' => Yii::t('app', 'Country Code'),
        ];
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plans".
 *
 * @property int $id
 * @property int $insurance_id
 * @property string $name
 * @property string|null $description
 * @property string|null $overview
 * @property int|null $max_age
 * @property int|null $min_age
 * @property string $plan_code
 *
 * @property Insurances $insurance
 * @property Pricing[] $pricings
 */
class Plans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['insurance_id', 'name', 'plan_code'], 'required'],
            [['insurance_id', 'max_age', 'min_age'], 'integer'],
            [['description', 'overview'], 'string'],
            [['name', 'plan_code'], 'string', 'max' => 255],
            [['insurance_id'], 'exist', 'skipOnError' => true, 'targetClass' => Insurances::class, 'targetAttribute' => ['insurance_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'insurance_id' => Yii::t('app', 'Insurance ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'overview' => Yii::t('app', 'Overview'),
            'max_age' => Yii::t('app', 'Max Age'),
            'min_age' => Yii::t('app', 'Min Age'),
            'plan_code' => Yii::t('app', 'Plan Code'),
        ];
    }

    /**
     * Gets query for [[Insurance]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInsurance()
    {
        return $this->hasOne(Insurances::class, ['id' => 'insurance_id']);
    }

    /**
     * Gets query for [[Pricings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPricings()
    {
        return $this->hasMany(Pricing::class, ['plan_id' => 'id']);
    }
}

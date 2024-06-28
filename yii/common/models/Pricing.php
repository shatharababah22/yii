<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pricing".
 *
 * @property int $id
 * @property int $plan_id
 * @property int $duration
 * @property string $passenger
 * @property float $price
 *
 * @property Plans $plan
 */
class Pricing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pricing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plan_id', 'duration', 'passenger', 'price'], 'required'],
            [['plan_id', 'duration'], 'integer'],
            [['price'], 'number'],
            [['passenger'], 'string', 'max' => 255],
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
            'plan_id' => Yii::t('app', 'Plan Code'),
            'duration' => Yii::t('app', 'Duration'),
            'passenger' => Yii::t('app', 'Passenger'),
            'price' => Yii::t('app', 'Price'),
        ];
    }

    /**
     * Gets query for [[Plan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(Plans::class, ['id' => 'plan_id']);
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plans_items".
 *
 * @property int $id
 * @property string $title
 *
 * @property PlansCoverage[] $plansCoverages
 */
class PlansItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plans_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            // 'plan_id' => Yii::t('app', 'Plan Code'),
        ];
    }

    /**
     * Gets query for [[PlansCoverages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCoverages()
    {
        return $this->hasMany(PlansCoverage::class, ['item_id' => 'id']);
    }


    // public function getPlan()
    // {
    //     return $this->hasOne(Plans::class, ['id' => 'plan_id']);
    // }
}

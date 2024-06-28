<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plans_coverage".
 *
 * @property int $id
 * @property int $item_id
 * @property string $YorN
 * @property string $description
 *
 * @property PlansItems $item
 */
class PlansCoverage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plans_coverage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'YorN', 'description'], 'required'],
            [['item_id'], 'integer'],
            [['description'], 'string'],
            [['YorN'], 'string', 'max' => 10],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => PlansItems::class, 'targetAttribute' => ['item_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'item_id' => Yii::t('app', 'Title'),
            'YorN' => Yii::t('app', 'Status'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * Gets query for [[Item]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(PlansItems::class, ['id' => 'item_id']);
    }


    
}




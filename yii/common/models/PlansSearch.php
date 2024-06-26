<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Plans;

/**
 * PlansSearch represents the model behind the search form of `common\models\Plans`.
 */
class PlansSearch extends Plans
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'insurance_id', 'max_age', 'min_age'], 'integer'],
            [['name', 'description', 'overview', 'plan_code'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Plans::find();

        // add conditions that should always apply here

      
        $totalCount = $query->count();

     

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 1,
            ],
             
            'totalCount' => $totalCount
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'insurance_id' => $this->insurance_id,
            'max_age' => $this->max_age,
            'min_age' => $this->min_age,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'overview', $this->overview])
            ->andFilterWhere(['like', 'plan_code', $this->plan_code]);

        return $dataProvider;
    }
}

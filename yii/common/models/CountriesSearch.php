<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Countries;

/**
 * CountriesSearch represents the model behind the search form of `common\models\Countries`.
 */
class CountriesSearch extends Countries
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['code', 'country', 'zone', 'currency'], 'safe'],
            [['callCode'], 'number'],
            [['active'], 'boolean'],
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
        $query = Countries::find();
    
        $this->load($params);
    
        if (!$this->validate()) {
            // If validation fails, return a data provider with no records
            $query->where('0=1');
            return new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);
        }
    
     
        $query->andFilterWhere([
            'id' => $this->id,
            'callCode' => $this->callCode,
            'active' => $this->active,
        ]);
    
        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'zone', $this->zone])
            ->andFilterWhere(['like', 'currency', $this->currency]);
    
    
        $totalCount = $query->count();
    
  
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
    
        $dataProvider->pagination->totalCount = $totalCount;
    
        return $dataProvider;
    }
    
}

<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InsuranceCountries;

/**
 * InsuranceCountriesSearch represents the model behind the search form of `common\models\InsuranceCountries`.
 */
class InsuranceCountriesSearch extends InsuranceCountries
{
    /**
     * {@inheritdoc}
     */

     public $insurance_name;
    public function rules()
    {
        return [
            [['id',], 'integer'],
            [['country_code','insurance_name', 'company_name', 'company_logo', 'source_country', 'source_country_code'], 'safe'],
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
        $query = InsuranceCountries::find();

        // add conditions that should always apply here
        $query->joinWith(['insurance']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['insurance_name'] = [
            'asc' => ['insurances.name' => SORT_ASC],
            'desc' => ['insurances.name' => SORT_DESC],
        ];
    
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'insurances.name' => $this->insurance_name,
        ]);

        $query->andFilterWhere(['like', 'country_code', $this->country_code])
            ->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'company_logo', $this->company_logo])
            ->andFilterWhere(['like', 'source_country', $this->source_country])
            ->andFilterWhere(['like', 'source_country_code', $this->source_country_code]);

        return $dataProvider;
    }
}

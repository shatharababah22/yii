<?php
namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PlansItems;
use common\models\Plans;

/**
 * PlansItemsSearch represents the model behind the search form of `common\models\PlansItems`.
 */
class PlansItemsSearch extends PlansItems
{
    public $plan_code; // Add a new public property

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'plan_code'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
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
        $query = PlansItems::find();

        // Join with the Plans table
        $query->joinWith(['plan']);

        $totalCount = $query->count();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 1,
            ],
            'totalCount' => $totalCount,
        ]);

        $dataProvider->sort->attributes['plan_code'] = [
            'asc' => ['plans.plan_code' => SORT_ASC],
            'desc' => ['plans.plan_code' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

 
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
              ->andFilterWhere(['like', 'plans.plan_code', $this->plan_code]);

        return $dataProvider;
    }
}

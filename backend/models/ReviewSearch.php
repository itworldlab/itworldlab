<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Review;

/**
 * ReviewSearch represents the model behind the search form of `backend\models\Review`.
 */
class ReviewSearch extends Review
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'user_id', 'status', 'product_id', 'integrator_id'], 'integer'],
            [['title', 'plus', 'minus', 'total'], 'safe'],
            [['rate_average', 'rate_boon', 'rate_func', 'rate_support', 'rate_price'], 'number'],
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
        $query = Review::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'created_at' => $this->created_at,
            'rate_average' => $this->rate_average,
            'rate_boon' => $this->rate_boon,
            'rate_func' => $this->rate_func,
            'rate_support' => $this->rate_support,
            'rate_price' => $this->rate_price,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'product_id' => $this->product_id,
            'integrator_id' => $this->integrator_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'plus', $this->plus])
            ->andFilterWhere(['like', 'minus', $this->minus])
            ->andFilterWhere(['like', 'total', $this->total]);

        return $dataProvider;
    }
}

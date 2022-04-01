<?php

namespace backend\models\product;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\product\ProductTarif;

/**
 * ProductTarifSearch represents the model behind the search form of `backend\models\product\ProductTarif`.
 */
class ProductTarifSearch extends ProductTarif
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_id'], 'integer'],
            [['price'], 'number'],
            [['users_count', 'demo_link'], 'safe'],
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
        $query = ProductTarif::find();

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
            'product_id' => $this->product_id,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'users_count', $this->users_count])
            ->andFilterWhere(['like', 'demo_link', $this->demo_link]);

        return $dataProvider;
    }
}

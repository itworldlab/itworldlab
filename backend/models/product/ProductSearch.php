<?php

namespace backend\models\product;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\product\Product;

/**
 * ProductSearch represents the model behind the search form of `backend\models\product\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'install_count', 'rate_count', 'admin_id', 'status', 'category_id'], 'integer'],
            [['rating', 'rate_average', 'rate_boon', 'rate_func', 'rate_support', 'rate_price'], 'number'],
            [['name','short_descr','descr'], 'string'],
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
        $query = Product::find()->joinWith(["product_lang","product_lang"]);

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
            'category_id' => $this->category_id,
            'rating' => $this->rating,
            'install_count' => $this->install_count,
            'rate_average' => $this->rate_average,
            'rate_boon' => $this->rate_boon,
            'rate_func' => $this->rate_func,
            'rate_support' => $this->rate_support,
            'rate_price' => $this->rate_price,
            'rate_count' => $this->rate_count,
            'admin_id' => $this->admin_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'product_lang.name', (string)$this->name]);
        $query->andFilterWhere(['like', 'product_lang.short_descr', (string)$this->short_descr]);
        $query->andFilterWhere(['like', 'product_lang.descr', (string)$this->descr]);

        return $dataProvider;
    }
}

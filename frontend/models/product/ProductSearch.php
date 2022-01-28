<?php

namespace frontend\models\product;

use backend\models\product\ProductsCategories;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProductSearch represents the model behind the search form of `frontend\models\product\Product`.
 */
class ProductSearch extends Product
{
    public $category_id;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'install_count', 'rate_count', 'admin_id', 'status','category_id'], 'integer'],
            [['rating', 'rate_average', 'rate_boon', 'rate_func', 'rate_support', 'rate_price'], 'number'],
//            [['logo'], 'safe'],
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
        $query = Product::find();

        if($this->category_id > 0){
            $products = [];
            foreach(ProductsCategories::find()->where(['product_category_id'=>$this->category_id])->all() as $item){
                $products[] = $item->product_id;
            }
            foreach(\backend\models\product\Product::find()->where(['category_id'=>$this->category_id])->all() as $item){
                $products[] = $item->id;
            }
            $query = $query->where(['in','id',$products]);
        }

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

        $query->andFilterWhere(['like', 'logo', $this->logo]);

        return $dataProvider;
    }
}

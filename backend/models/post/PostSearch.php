<?php

namespace backend\models\post;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\post\Post;

/**
 * PostSearch represents the model behind the search form of `backend\models\post\Post`.
 */
class PostSearch extends Post
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'views', 'created_at', 'created_id', 'updated_at', 'updated_id', 'status', 'category_id', 'region_id'], 'integer'],
            [['image'], 'safe'],
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
        $query = Post::find();

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
            'views' => $this->views,
            'created_at' => $this->created_at,
            'created_id' => $this->created_id,
            'updated_at' => $this->updated_at,
            'updated_id' => $this->updated_id,
            'status' => $this->status,
            'category_id' => $this->category_id,
            'region_id' => $this->region_id,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}

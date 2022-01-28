<?php

namespace backend\models\product;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\product\Prop;

/**
 * PropSearch represents the model behind the search form of `backend\models\product\Prop`.
 */
class PropSearch extends Prop
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'prop_type_id', 'status'], 'integer'],
            [['type', 'icon'], 'safe'],
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
        $query = Prop::find();

        if(isset($_GET['prop_type_id'])){
            $query = $query->where(['prop_type_id'=>\Yii::$app->request->get("prop_type_id")]);
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
            'prop_type_id' => $this->prop_type_id,
//            'category_id' => $this->category_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'icon', $this->icon]);

        return $dataProvider;
    }
}

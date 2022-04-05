<?php

namespace backend\models\company;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\company\Company;

/**
 * CompanySearch represents the model behind the search form of `backend\models\company\Company`.
 */
class CompanySearch extends Company
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'projects_count', 'average_rate', 'open_date', 'status', 'category_id', 'region_id'], 'integer'],
            [['logo_image', 'wall_image'], 'safe'],
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
        $query = Company::find();

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
            'projects_count' => $this->projects_count,
            'average_rate' => $this->average_rate,
            'open_date' => $this->open_date,
            'status' => $this->status,
            'category_id' => $this->category_id,
            'region_id' => $this->region_id,
        ]);

        $query->andFilterWhere(['like', 'logo_image', $this->logo_image])
            ->andFilterWhere(['like', 'wall_image', $this->wall_image]);

        return $dataProvider;
    }
}

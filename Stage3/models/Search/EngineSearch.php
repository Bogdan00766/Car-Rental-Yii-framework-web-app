<?php

namespace app\models\Search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Engine;

/**
 * EngineSearch represents the model behind the search form of `app\models\Engine`.
 */
class EngineSearch extends Engine
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'Power', 'Cylinders'], 'integer'],
            [['Serial_Number', 'Fuel'], 'safe'],
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
        $query = Engine::find();

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
            'Id' => $this->Id,
            'Power' => $this->Power,
            'Cylinders' => $this->Cylinders,
        ]);

        $query->andFilterWhere(['like', 'Serial_Number', $this->Serial_Number])
            ->andFilterWhere(['like', 'Fuel', $this->Fuel]);

        return $dataProvider;
    }
}

<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Rent;

/**
 * RentSearch represents the model behind the search form of `app\models\Rent`.
 */
class RentSearch extends Rent
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'rent_time', 'client_id'], 'integer'],
            [['rent_start', 'car_id'], 'safe'],
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
        $query = Rent::find();

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
            'rent_time' => $this->rent_time,
            'client_id' => $this->client_id,
            'rent_start' => $this->rent_start,
        ]);

        $query->andFilterWhere(['like', 'car_id', $this->car_id]);

        return $dataProvider;
    }
}

<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Bus;

/**
 * BusSearch represents the model behind the search form about `frontend\models\Bus`.
 */
class BusSearch extends Bus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bus'], 'integer'],
            [['no_polisi', 'jam_operasional'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Bus::find();

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
            'id_bus' => $this->id_bus,
        ]);

        $query->andFilterWhere(['like', 'no_polisi', $this->no_polisi])
            ->andFilterWhere(['like', 'jam_operasional', $this->jam_operasional]);

        return $dataProvider;
    }
}

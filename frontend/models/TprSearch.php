<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Tpr;

/**
 * TprSearch represents the model behind the search form of `frontend\models\Tpr`.
 */
class TprSearch extends Tpr
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tpr', 'terminal', 'tpr', 'kemandoran'], 'integer'],
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
        $query = Tpr::find();

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
            'id_tpr' => $this->id_tpr,
            'terminal' => $this->terminal,
            'tpr' => $this->tpr,
            'kemandoran' => $this->kemandoran,
        ]);

        return $dataProvider;
    }
}

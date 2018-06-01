<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Bon;

/**
 * BonSearch represents the model behind the search form of `frontend\models\Bon`.
 */
class BonSearch extends Bon
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bon', 'bon_sopir', 'bon_kondektur'], 'integer'],
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
        $query = Bon::find();

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
            'id_bon' => $this->id_bon,
            'bon_sopir' => $this->bon_sopir,
            'bon_kondektur' => $this->bon_kondektur,
        ]);

        return $dataProvider;
    }
}

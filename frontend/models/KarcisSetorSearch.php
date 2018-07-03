<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\KarcisSetor;

/**
 * KarcisSetorSearch represents the model behind the search form of `frontend\models\KarcisSetor`.
 */
class KarcisSetorSearch extends KarcisSetor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karcis', 'pergi_awal', 'pergi_akhir', 'pulang_awal', 'pulang_akhir', 'id_jadwal'], 'integer'],
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
        $query = KarcisSetor::find();

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
            'id_karcis' => $this->id_karcis,
            'pergi_awal' => $this->pergi_awal,
            'pergi_akhir' => $this->pergi_akhir,
            'pulang_awal' => $this->pulang_awal,
            'pulang_akhir' => $this->pulang_akhir,
            'id_jadwal' => $this->id_jadwal,
        ]);

        return $dataProvider;
    }
}

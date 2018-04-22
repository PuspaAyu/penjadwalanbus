<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Setoran;

/**
 * SetoranSearch represents the model behind the search form about `frontend\models\Setoran`.
 */
class SetoranSearch extends Setoran
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_setoran', 'pendapatan_kotor', 'pendapatan_bersih', 'pinjaman', 'solar', 'ongkos'], 'integer'],
            [['tgl_setor'], 'safe'],
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
        $query = Setoran::find();

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
            'id_setoran' => $this->id_setoran,
            'pendapatan_kotor' => $this->pendapatan_kotor,
            'pendapatan_bersih' => $this->pendapatan_bersih,
            'pinjaman' => $this->pinjaman,
            'solar' => $this->solar,
            'ongkos' => $this->ongkos,
            'tgl_setor' => $this->tgl_setor,
        ]);

        return $dataProvider;
    }
}

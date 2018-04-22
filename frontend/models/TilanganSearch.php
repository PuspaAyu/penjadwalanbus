<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Tilangan;

/**
 * TilanganSearch represents the model behind the search form about `frontend\models\Tilangan`.
 */
class TilanganSearch extends Tilangan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tilangan'], 'integer'],
            [['tanggal_tilangan', 'denda', 'jenis_pelanggaran', 'tempat_kejadian', 'tanggal_batas_tilang', 'status'], 'safe'],
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
        $query = Tilangan::find();

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
            'id_tilangan' => $this->id_tilangan,
            'tanggal_tilangan' => $this->tanggal_tilangan,
            'tanggal_batas_tilang' => $this->tanggal_batas_tilang,
        ]);

        $query->andFilterWhere(['like', 'denda', $this->denda])
            ->andFilterWhere(['like', 'jenis_pelanggaran', $this->jenis_pelanggaran])
            ->andFilterWhere(['like', 'tempat_kejadian', $this->tempat_kejadian])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}

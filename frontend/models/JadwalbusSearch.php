<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Jadwalbus;

/**
 * JadwalbusSearch represents the model behind the search form of `frontend\models\Jadwalbus`.
 */
class JadwalbusSearch extends Jadwalbus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jadwal', 'id_bus', 'id_pegawai', 'id_jurusan'], 'integer'],
            [['tanggal', 'jam_berangkat', 'jam_datang'], 'safe'],
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
        $query = Jadwalbus::find();

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
            'id_jadwal' => $this->id_jadwal,
            'tanggal' => $this->tanggal,
            'jam_berangkat' => $this->jam_berangkat,
            'id_bus' => $this->id_bus,
            'id_pegawai' => $this->id_pegawai,
            'jam_datang' => $this->jam_datang,
            'id_jurusan' => $this->id_jurusan,
        ]);

        return $dataProvider;
    }
}

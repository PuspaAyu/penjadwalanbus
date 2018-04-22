<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Pegawai;

/**
 * PegawaiSearch represents the model behind the search form about `frontend\models\Pegawai`.
 */
class PegawaiSearch extends Pegawai
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'no_induk', 'no_tlp'], 'integer'],
            [['nama', 'alamat', 'jabatan', 'riwayat_pendidikan', 'riwayat_pekerjaan', 'tgl_masuk', 'jenis_kelamin', 'status', 'agama', 'kota', 'ktp_habis', 'sim_habis'], 'safe'],
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
        $query = Pegawai::find();

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
            'id_pegawai' => $this->id_pegawai,
            'no_induk' => $this->no_induk,
            'no_tlp' => $this->no_tlp,
            'tgl_masuk' => $this->tgl_masuk,
            'ktp_habis' => $this->ktp_habis,
            'sim_habis' => $this->sim_habis,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'jabatan', $this->jabatan])
            ->andFilterWhere(['like', 'riwayat_pendidikan', $this->riwayat_pendidikan])
            ->andFilterWhere(['like', 'riwayat_pekerjaan', $this->riwayat_pekerjaan])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'kota', $this->kota]);

        return $dataProvider;
    }
}

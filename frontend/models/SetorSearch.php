<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Setor;

/**
 * SetorSearch represents the model behind the search form of `frontend\models\Setor`.
 */
class SetorSearch extends Setor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_setor', 'id_jadwal', 'nom_solar_pergi', 'nom_solar_plg', 'um_sopir', 'um_kond', 'cuci_bis', 'tpr', 'tol', 'siaran', 'parkir', 'lain_lain', 'potong_minum', 'pendapatan_kotor', 'bersih_perjalanan', 'total_bersih'], 'integer'],
             [['solar_pergi', 'solar_plg'], 'number'],
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
        $query = Setor::find();

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
            'id_setor' => $this->id_setor,
            'id_jadwal' => $this->id_jadwal,
            'solar_pergi' => $this->solar_pergi,
            'nom_solar_pergi' => $this->nom_solar_pergi,
            'solar_plg' => $this->solar_plg,
            'nom_solar_plg' => $this->nom_solar_plg,
            'um_sopir' => $this->um_sopir,
            'um_kond' => $this->um_kond,
            'cuci_bis' => $this->cuci_bis,
            'tpr' => $this->tpr,
            'tol' => $this->tol,
            'siaran' => $this->siaran,
            'parkir' => $this->parkir,
            'lain_lain' => $this->lain_lain,
            'potong_minum' => $this->potong_minum,
            'pendapatan_kotor' => $this->pendapatan_kotor,
            'bersih_perjalanan' => $this->bersih_perjalanan,
            'total_bersih' => $this->total_bersih,
        ]);

        return $dataProvider;
    }
}

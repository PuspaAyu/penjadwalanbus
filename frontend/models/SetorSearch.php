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
            [['id_setor', 'id_jadwal', 'id_tpr', 'nom_solar_pergi', 'nom_solar_plg', 'um_sopir', 'um_kond', 'cuci_bis', 'tpr2', 'tol', 'siaran', 'parkir', 'lain_lain', 'potong_minum', 'pendapatan_kotor', 'bersih_perjalanan', 'total_bersih','rit_1', 'rit_2','dipotong_premi','bon_sopir','bon_kondektur', 'premi_sopir', 'premi_kondektur'], 'integer'],
            [['tpr_sby', 'mandor_sby', 'tpr_caruban', 'mandor_caruban', 'tpr_ngawi', 'mandor_ngawi', 'tpr_solo', 'mandor_solo', 'tpr_kartosuro', 'mandor_kartosuro', 'tpr_salatiga', 'mandor_salatiga', 'tpr_semarang', 'mandor_semarang'], 'integer'],
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
            'id_tpr' => $this->id_tpr,
            'tpr_sby' => $this->tpr_sby,
            'mandor_sby' => $this->mandor_sby,
            'tpr_caruban' => $this->tpr_caruban,
            'mandor_caruban' => $this->mandor_caruban,
            'tpr_ngawi' => $this->tpr_ngawi,
            'mandor_ngawi' => $this->mandor_ngawi,
            'tpr_solo' => $this->tpr_solo,
            'mandor_solo' => $this->mandor_solo,
            'tpr_kartosuro' => $this->tpr_kartosuro,
            'mandor_kartosuro' => $this->mandor_kartosuro,
            'tpr_salatiga' => $this->tpr_salatiga,
            'mandor_salatiga' => $this->mandor_salatiga,
            'tpr_semarang' => $this->tpr_semarang,
            'mandor_semarang' => $this->mandor_semarang,
            'rit_1' => $this->rit_1,
            'rit_2' => $this->rit_2,
            'bon_sopir' => $this->bon_sopir,
            'bon_kondektur' => $this->bon_kondektur,
            'solar_pergi' => $this->solar_pergi,
            'nom_solar_pergi' => $this->nom_solar_pergi,
            'solar_plg' => $this->solar_plg,
            'nom_solar_plg' => $this->nom_solar_plg,
            'um_sopir' => $this->um_sopir,
            'um_kond' => $this->um_kond,
            'cuci_bis' => $this->cuci_bis,
            'tpr2' => $this->tpr2,
            'tol' => $this->tol,
            'siaran' => $this->siaran,
            'parkir' => $this->parkir,
            'lain_lain' => $this->lain_lain,
            'potong_minum' => $this->potong_minum,
            'pendapatan_kotor' => $this->pendapatan_kotor,
            'bersih_perjalanan' => $this->bersih_perjalanan,
            'total_bersih' => $this->total_bersih,
            'dipotong_premi' => $this->dipotong_premi,
            'premi_sopir' => $this->premi_sopir,
            'premi_kondektur' => $this->premi_kondektur,
        ]);

        return $dataProvider;
    }
}

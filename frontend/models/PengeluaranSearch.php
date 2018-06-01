<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Pengeluaran;

/**
 * PengeluaranSearch represents the model behind the search form of `frontend\models\Pengeluaran`.
 */
class PengeluaranSearch extends Pengeluaran
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pengeluaran', 'solar_pergi', 'solar_pulang', 'um_sopir', 'um_kondektur', 'cuci bis', 'tpr', 'tol', 'siaran', 'parkir', 'lain_lain', 'uang_minuman'], 'integer'],
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
        $query = Pengeluaran::find();

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
            'id_pengeluaran' => $this->id_pengeluaran,
            'solar_pergi' => $this->solar_pergi,
            'solar_pulang' => $this->solar_pulang,
            'um_sopir' => $this->um_sopir,
            'um_kondektur' => $this->um_kondektur,
            'cuci bis' => $this->cuci bis,
            'tpr' => $this->tpr,
            'tol' => $this->tol,
            'siaran' => $this->siaran,
            'parkir' => $this->parkir,
            'lain_lain' => $this->lain_lain,
            'uang_minuman' => $this->uang_minuman,
        ]);

        return $dataProvider;
    }
}

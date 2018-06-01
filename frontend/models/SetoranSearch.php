<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Setoran;

/**
 * SetoranSearch represents the model behind the search form of `frontend\models\Setoran`.
 */
class SetoranSearch extends Setoran
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_setoran', 'id_karcis', 'id_bon', 'id_tpr', 'id_pengeluaran', 'pendapatan_kotor', 'bersih_perjalanan'], 'integer'],
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
            'id_karcis' => $this->id_karcis,
            'id_bon' => $this->id_bon,
            'id_tpr' => $this->id_tpr,
            'id_pengeluaran' => $this->id_pengeluaran,
            'pendapatan_kotor' => $this->pendapatan_kotor,
            'bersih_perjalanan' => $this->bersih_perjalanan,
        ]);

        return $dataProvider;
    }
}

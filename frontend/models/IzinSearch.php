<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Izin;

/**
 * IzinSearch represents the model behind the search form about `frontend\models\Izin`.
 */
class IzinSearch extends Izin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_izin'], 'integer'],
            [['tgl_izin', 'jenis_izin'], 'safe'],
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
        $query = Izin::find();

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
            'id_izin' => $this->id_izin,
            'tgl_izin' => $this->tgl_izin,
        ]);

        $query->andFilterWhere(['like', 'jenis_izin', $this->jenis_izin]);

        return $dataProvider;
    }
}

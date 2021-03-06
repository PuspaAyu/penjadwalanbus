<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Stok;

/**
 * StokSearch represents the model behind the search form of `frontend\models\Stok`.
 */
class StokSearch extends Stok
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_stok'], 'integer'],
            [['tipe_karcis'], 'safe'],
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
        $query = Stok::find();

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
            'id_stok' => $this->id_stok,
            
        ]);

        $query->andFilterWhere(['like', 'tipe_karcis', $this->tipe_karcis]);

        return $dataProvider;
    }
}

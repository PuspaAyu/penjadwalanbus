<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Hutang;

/**
 * HutangSearch represents the model behind the search form about `frontend\models\Hutang`.
 */
class HutangSearch extends Hutang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_hutang', 'jumlah_hutang'], 'integer'],
            [['status_hutang', 'alasan'], 'safe'],
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
        $query = Hutang::find();

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
            'id_hutang' => $this->id_hutang,
            'jumlah_hutang' => $this->jumlah_hutang,
        ]);

        $query->andFilterWhere(['like', 'status_hutang', $this->status_hutang])
            ->andFilterWhere(['like', 'alasan', $this->alasan]);

        return $dataProvider;
    }
}

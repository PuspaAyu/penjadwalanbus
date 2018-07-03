<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Tpr;

/**
 * TprSearch represents the model behind the search form of `frontend\models\Tpr`.
 */
class TprSearch extends Tpr
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tpr', 'tpr_sby', 'mandor_sby', 'tpr_caruban', 'mandor_caruban', 'tpr_ngawi', 'mandor_ngawi', 'tpr_solo', 'mandor_solo', 'tpr_kartosuro', 'mandor_kartosuro', 'tpr_salatiga', 'mandor_salatiga', 'tpr_semarang', 'mandor_semarang'], 'integer'],
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
        $query = Tpr::find();

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
        ]);

        return $dataProvider;
    }
}

<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tpr".
 *
 * @property int $id_tpr
 * @property int $tpr_sby
 * @property int $mandor_sby
 * @property int $tpr_caruban
 * @property int $mandor_caruban
 * @property int $tpr_ngawi
 * @property int $mandor_ngawi
 * @property int $tpr_solo
 * @property int $mandor_solo
 * @property int $tpr_kartosuro
 * @property int $mandor_kartosuro
 * @property int $tpr_salatiga
 * @property int $mandor_salatiga
 * @property int $tpr_semarang
 * @property int $mandor_semarang
 */
class Tpr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tpr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tpr_sby', 'mandor_sby', 'tpr_caruban', 'mandor_caruban', 'tpr_ngawi', 'mandor_ngawi', 'tpr_solo', 'mandor_solo', 'tpr_kartosuro', 'mandor_kartosuro', 'tpr_salatiga', 'mandor_salatiga', 'tpr_semarang', 'mandor_semarang'], 'required'],
            [['tpr_sby', 'mandor_sby', 'tpr_caruban', 'mandor_caruban', 'tpr_ngawi', 'mandor_ngawi', 'tpr_solo', 'mandor_solo', 'tpr_kartosuro', 'mandor_kartosuro', 'tpr_salatiga', 'mandor_salatiga', 'tpr_semarang', 'mandor_semarang'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tpr' => 'Id Tpr',
            'tpr_sby' => 'Tpr Sby',
            'mandor_sby' => 'Mandor Sby',
            'tpr_caruban' => 'Tpr Caruban',
            'mandor_caruban' => 'Mandor Caruban',
            'tpr_ngawi' => 'Tpr Ngawi',
            'mandor_ngawi' => 'Mandor Ngawi',
            'tpr_solo' => 'Tpr Solo',
            'mandor_solo' => 'Mandor Solo',
            'tpr_kartosuro' => 'Tpr Kartosuro',
            'mandor_kartosuro' => 'Mandor Kartosuro',
            'tpr_salatiga' => 'Tpr Salatiga',
            'mandor_salatiga' => 'Mandor Salatiga',
            'tpr_semarang' => 'Tpr Semarang',
            'mandor_semarang' => 'Mandor Semarang',
        ];
    }
}

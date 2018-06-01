<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pengeluaran".
 *
 * @property int $id_pengeluaran
 * @property int $solar_pergi
 * @property int $solar_pulang
 * @property int $um_sopir
 * @property int $um_kondektur
 * @property int $cuci bis
 * @property int $tpr
 * @property int $tol
 * @property int $siaran
 * @property int $parkir
 * @property int $lain_lain
 * @property int $uang_minuman
 */
class Pengeluaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pengeluaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['solar_pergi', 'solar_pulang', 'um_sopir', 'um_kondektur', 'cuci bis', 'tpr', 'tol', 'siaran', 'parkir', 'lain_lain', 'uang_minuman'], 'required'],
            [['solar_pergi', 'solar_pulang', 'um_sopir', 'um_kondektur', 'cuci bis', 'tpr', 'tol', 'siaran', 'parkir', 'lain_lain', 'uang_minuman'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pengeluaran' => 'Id Pengeluaran',
            'solar_pergi' => 'Solar Pergi',
            'solar_pulang' => 'Solar Pulang',
            'um_sopir' => 'Um Sopir',
            'um_kondektur' => 'Um Kondektur',
            'cuci bis' => 'Cuci Bis',
            'tpr' => 'Tpr',
            'tol' => 'Tol',
            'siaran' => 'Siaran',
            'parkir' => 'Parkir',
            'lain_lain' => 'Lain Lain',
            'uang_minuman' => 'Uang Minuman',
        ];
    }
}

<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "setor".
 *
 * @property int $id_setor
 * @property int $id_jadwal
 * @property int $solar_pergi
 * @property int $nom_solar_pergi
 * @property int $solar_plg
 * @property int $nom_solar_plg
 * @property int $um_sopir
 * @property int $um_kond
 * @property int $cuci_bis
 * @property int $tpr
 * @property int $tol
 * @property int $siaran
 * @property int $lain_lain
 * @property int $potong_minum
 * @property int $pendapatan_kotor
 * @property int $bersih_perjalanan
 * @property int $total_bersih
 */
class Setor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'setor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jadwal', 'solar_pergi', 'nom_solar_pergi', 'solar_plg', 'nom_solar_plg', 'um_sopir', 'um_kond', 'cuci_bis', 'tpr', 'tol', 'siaran', 'lain_lain', 'potong_minum', 'pendapatan_kotor', 'bersih_perjalanan', 'total_bersih'], 'required'],
            [['id_jadwal', 'solar_pergi', 'nom_solar_pergi', 'solar_plg', 'nom_solar_plg', 'um_sopir', 'um_kond', 'cuci_bis', 'tpr', 'tol', 'siaran', 'lain_lain', 'potong_minum', 'pendapatan_kotor', 'bersih_perjalanan', 'total_bersih'], 'integer'],
            [['solar_pergi', 'solar_plg'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_setor' => 'Id Setor',
            'id_karcis' => 'Id Karcis',
            'solar_pergi' => 'Solar Pergi',
            'nom_solar_pergi' => 'Nom Solar Pergi',
            'solar_plg' => 'Solar Plg',
            'nom_solar_plg' => 'Nom Solar Plg',
            'um_sopir' => 'Um Sopir',
            'um_kond' => 'Um Kond',
            'cuci_bis' => 'Cuci Bis',
            'tpr' => 'Tpr',
            'tol' => 'Tol',
            'siaran' => 'Siaran',
            'lain_lain' => 'Lain Lain',
            'potong_minum' => 'Potong Minum',
            'pendapatan_kotor' => 'Pendapatan Kotor',
            'bersih_perjalanan' => 'Bersih Perjalanan',
            'total_bersih' => 'Total Bersih',
        ];
    }
}

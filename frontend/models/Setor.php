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
            [['id_jadwal'], 'required'],
            [['id_jadwal','id_karcis','nom_solar_pergi', 'nom_solar_plg', 'um_sopir', 'um_kond', 'cuci_bis', 'tpr2', 'tol', 'siaran', 'parkir', 'lain_lain', 'potong_minum', 'pendapatan_kotor', 'bersih_perjalanan', 'total_bersih', 'rit_1', 'rit_2','dipotong_premi','bon_sopir','bon_kondektur', 'premi_sopir', 'premi_kondektur'], 'integer'],
            [['tpr_sby', 'mandor_sby', 'tpr_caruban', 'mandor_caruban', 'tpr_ngawi', 'mandor_ngawi', 'tpr_solo', 'mandor_solo', 'tpr_kartosuro', 'mandor_kartosuro', 'tpr_salatiga', 'mandor_salatiga', 'tpr_semarang', 'mandor_semarang'], 'integer'],
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
            'rit_1' => 'Rit I',
            'rit_2' => "Rit II",
            'bon_sopir' => 'Bon Sopir',
            'bon_kondektur' => 'Bon Kondektur',
            'solar_pergi' => 'Solar Pergi',
            'nom_solar_pergi' => 'Nom Solar Pergi',
            'solar_plg' => 'Solar Plg',
            'nom_solar_plg' => 'Nom Solar Plg',
            'um_sopir' => 'Um Sopir',
            'um_kond' => 'Um Kond',
            'cuci_bis' => 'Cuci Bis',
            'tpr2' => 'Tpr',
            'tol' => 'Tol',
            'siaran' => 'Siaran',
            'parkir' => 'Parkir',
            'lain_lain' => 'Lain Lain',
            'potong_minum' => 'Potong Minum',
            'pendapatan_kotor' => 'Pendapatan Kotor',
            'bersih_perjalanan' => 'Bersih Perjalanan',
            'total_bersih' => 'Total Bersih',
            'dipotong_premi' => 'Dipotong Premi',
            'premi_sopir' => 'Premi Sopir',
            'premi_kondektur' => 'Premi Kondektur'
        ];
    }
}

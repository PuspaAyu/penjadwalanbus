<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "setoran".
 *
 * @property integer $id_setoran
 * @property integer $pendapatan_kotor
 * @property integer $pendapatan_bersih
 * @property integer $pinjaman
 * @property integer $solar
 * @property integer $ongkos
 * @property string $tgl_setor
 */
class Setoran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'setoran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jadwal','id_karcis','id_bon','id_tpr','id_pengeluaran','bersih_perjalanan','pendapatan_kotor'], 'required'],
            [['id_jadwal','id_karcis','id_bon','id_tpr','id_pengeluaran','bersih_perjalanan','pendapatan_kotor'], 'integer'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_setoran' => 'Id Setoran',
            'id_jadwal' => 'Id Jadwal',
            'id_karcis' => 'Id Karcis',
            'id_bon' => 'Id Bon',
            'id_tpr' => 'Id Tpr',
            'id_pengeluaran' => 'Id Pengeluaran',
            'bersih_perjalanan' => 'Bersih Perjalanan',
            'pendapatan_kotor' => 'Pendapatan Kotor',
           
        ];
    }
}

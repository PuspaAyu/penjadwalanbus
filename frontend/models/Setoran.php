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
            [['pendapatan_kotor', 'pendapatan_bersih', 'pinjaman', 'solar', 'ongkos', 'tgl_setor'], 'required'],
            [['pendapatan_kotor', 'pendapatan_bersih', 'pinjaman', 'solar', 'ongkos'], 'integer'],
            [['tgl_setor'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_setoran' => 'Id Setoran',
            'pendapatan_kotor' => 'Pendapatan Kotor',
            'pendapatan_bersih' => 'Pendapatan Bersih',
            'pinjaman' => 'Pinjaman',
            'solar' => 'Solar',
            'ongkos' => 'Ongkos',
            'tgl_setor' => 'Tgl Setor',
        ];
    }
}

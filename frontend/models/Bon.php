<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bon".
 *
 * @property int $id_bon
 * @property int $bon_sopir
 * @property int $bon_kondektur
 */
class Bon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pegawai','tgl','nominal','tipe'], 'required'],
            [['id_pegawai','nominal','tipe'], 'integer'],
            [['tgl'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_bon' => 'Id Bon',
            'id_pegawai' => 'Id Pegawai',
            'tgl' => 'Tanggal',
            'nominal' => 'Nominal',
            'tipe' => 'Tipe'
        ];
    }
}

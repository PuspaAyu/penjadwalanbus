<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "jadwal_bus".
 *
 * @property int $id_jadwal
 * @property string $tanggal
 * @property int $id_bus
 * @property int $id_sopir
 * @property int $id_kondektur
 * @property int $id_jurusan
 */
class JadwalBus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jadwal_bus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal'], 'required'],
            [['tanggal'],'safe'],
            [['id_bus', 'id_jurusan', 'id_sopir', 'id_kondektur'], 'integer'],
            [['id_bus'], 'exist', 
                         'skipOnError' => true, 
                         'targetClass' => Bus::className(), 
                         'targetAttribute' => ['id_bus' => 'id_bus'
                ]],
            // [['id_pegawai'], 'exist', 
            //              'skipOnError' => true, 
            //              'targetClass' => Pegawai::className(), 
            //              'targetAttribute' => ['id_pegawai' => 'id_pegawai']
            // ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jadwal' => 'Id Jadwal',
            'tanggal' => 'Tanggal',
            'id_bus' => 'Id Bus',
            'id_jurusan' => 'Id Jurusan',
            'id_sopir' => 'Id Sopir',
            'id_kondektur' => 'Id Kondektur',
        ];
    }

    public function getBus()
    {
        return $this->hasOne(Bus::className(), ['id_bus' => 'id_bus']);
    }

    // public function getPegawai()
    // {
    //     return $this->hasOne(Pegawai::className(), ['id_pegawai' => 'id_pegawai']);
    // }
}
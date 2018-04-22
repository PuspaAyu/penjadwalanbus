<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "jadwal_bus".
 *
 * @property int $id_jadwal
 * @property string $tanggal
 * @property string $jam_berangkat
 * @property int $id_bus
 * @property int $id_pegawai
 * @property string $jam_datang
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
            [['tanggal', 'jam_berangkat', 'id_bus', 'id_pegawai', 'jam_datang', 'id_jurusan'], 'required'],
            [['tanggal', 'jam_berangkat', 'jam_datang'], 'safe'],
            [['id_bus', 'id_pegawai', 'id_jurusan'], 'integer'],
            [['id_bus'], 'exist', 
                         'skipOnError' => true, 
                         'targetClass' => Bus::className(), 
                         'targetAttribute' => ['id_bus' => 'id_bus'
                ]],
            [['id_pegawai'], 'exist', 
                         'skipOnError' => true, 
                         'targetClass' => Pegawai::className(), 
                         'targetAttribute' => ['id_pegawai' => 'id_pegawai'
                ]],
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
            'jam_berangkat' => 'Jam Berangkat',
            'id_bus' => 'Id Bus',
            'id_pegawai' => 'Id Pegawai',
            'jam_datang' => 'Jam Datang',
            'id_jurusan' => 'Id Jurusan',
        ];
    }

    public function getBus()
    {
        return $this->hasOne(Bus::className(), ['id_bus' => 'id_bus']);
    }

    public function getPegawai()
    {
        return $this->hasOne(Pegawai::className(), ['id_pegawai' => 'id_pegawai']);
    }
}

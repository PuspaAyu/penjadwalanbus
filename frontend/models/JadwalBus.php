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
            [['id_bus', 'id_sopir', 'id_kondektur', 'id_karcis', 'pergi_awal', 'pergi_akhir', 'pulang_akhir', 'pulang_awal'], 'integer'],
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
            'id_karcis' => 'Id Karcis',
            'pergi_awal' => 'Pergi Awal',
            'pergi_akhir' => 'Pergi AKhir',
            'pulang_awal' => 'Pulang Awal',
            'pulang_akhir' => 'Pulang Akhir'
            
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
<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "izin".
 *
 * @property int $id_izin
 * @property string $tgl_izin
 * @property string $jenis_izin
 * @property int $id_pegawai
 */
class Izin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl_izin', 'jenis_izin', 'id_pegawai'], 'required'],
            [['tgl_izin'], 'safe'],
            [['id_pegawai'], 'integer'],
            [['jenis_izin'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_izin' => 'Id Izin',
            'tgl_izin' => 'Tgl Izin',
            'jenis_izin' => 'Jenis Izin',
            'id_pegawai' => 'Id Pegawai',
        ];
    }
}

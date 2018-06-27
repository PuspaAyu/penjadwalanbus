<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tilangan".
 *
 * @property integer $id_tilangan
 * @property string $denda
 * @property string $jenis_pelanggaran
 * @property string $tempat_kejadian
 * @property string $tanggal_batas_tilang
 * @property string $status
 */
class Tilangan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tilangan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['denda', 'jenis_pelanggaran', 'tempat_kejadian', 'tanggal_batas_tilang', 'status'], 'required'],
            [['tanggal_batas_tilang'], 'safe'],
            [['denda', 'jenis_pelanggaran', 'tempat_kejadian'], 'string', 'max' => 20],
            [['status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tilangan' => 'Id Tilangan',
            'id_jadwal' => 'Id Jadwal',
            'denda' => 'Denda',
            'jenis_pelanggaran' => 'Jenis Pelanggaran',
            'tempat_kejadian' => 'Tempat Kejadian',
            'tanggal_batas_tilang' => 'Tanggal Batas Tilang',
            'status' => 'Status',
        ];
    }

    public function getTilangan()
    {
        return  (new \yii\db\Query())
                ->select([
                    'id_tilangan',
                    'tanggal_batas_tilang',
                    new \yii\db\Expression('CURDATE() as tgl_sekarang'),
                    new \yii\db\Expression('DATEDIFF(CURDATE(), tanggal_batas_tilang) as selisih')
                ])
                ->from(self::tableName())
                ->all();
    }
}

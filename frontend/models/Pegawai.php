<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property integer $id_pegawai
 * @property string $nama
 * @property integer $no_induk
 * @property string $alamat
 * @property integer $no_tlp
 * @property string $jabatan
 * @property string $riwayat_pendidikan
 * @property string $riwayat_pekerjaan
 * @property string $tgl_masuk
 * @property string $jenis_kelamin
 * @property string $status
 * @property string $agama
 * @property string $kota
 * @property string $ktp_habis
 * @property string $sim_habis
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'no_induk', 'alamat', 'no_tlp', 'jabatan', 'riwayat_pendidikan', 'riwayat_pekerjaan', 'tgl_masuk', 'jenis_kelamin', 'status', 'agama', 'kota', 'ktp_habis', 'sim_habis'], 'required'],
            [['no_induk', 'no_tlp'], 'integer'],
            [['tgl_masuk', 'ktp_habis', 'sim_habis'], 'safe'],
            [['nama', 'alamat', 'riwayat_pendidikan', 'riwayat_pekerjaan', 'kota'], 'string', 'max' => 20],
            [['jabatan', 'jenis_kelamin', 'status', 'agama'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pegawai' => 'Id Pegawai',
            'nama' => 'Nama',
            'no_induk' => 'No Induk',
            'alamat' => 'Alamat',
            'no_tlp' => 'No Tlp',
            'jabatan' => 'Jabatan',
            'riwayat_pendidikan' => 'Riwayat Pendidikan',
            'riwayat_pekerjaan' => 'Riwayat Pekerjaan',
            'tgl_masuk' => 'Tgl Masuk',
            'jenis_kelamin' => 'Jenis Kelamin',
            'status' => 'Status',
            'agama' => 'Agama',
            'kota' => 'Kota',
            'ktp_habis' => 'Ktp Habis',
            'sim_habis' => 'Sim Habis',
        ];
    }
}

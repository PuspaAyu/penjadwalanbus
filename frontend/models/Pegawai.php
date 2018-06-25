<?php

namespace frontend\models;

use Yii;
use frontend\models\Jabatan;

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
            [['nama', 'no_induk', 'alamat', 'no_tlp', 'id_jabatan', 'tgl_masuk', 'kota'], 'required'],
            [['no_induk', 'id_jabatan'], 'integer'],
            [['tgl_masuk'], 'safe'],
            [['nama', 'kota'], 'string', 'max' => 20],
            [['alamat'], 'string', 'max' => 100],
            [['no_tlp'], 'string', 'max' => 15],
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
            'id_jabatan' => 'Jabatan',
            'tgl_masuk' => 'Tgl Masuk',
            'kota' => 'Kota',
           
        ];
    }

    public function getJabatan(){
        $jabatan = Jabatan::find()->where(['id_jabatan'=>$this->id_jabatan])->one();
            return $jabatan->jenis_jabatan;
    }
}

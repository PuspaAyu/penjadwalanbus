<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "komplain".
 *
 * @property int $id_komplain
 * @property int $id_jadwal
 * @property string $isi_komplain
 * @property string $tgl_komplain
 */
class Komplain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'komplain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jadwal', 'isi_komplain', 'tgl_komplain'], 'required'],
            [['id_jadwal'], 'integer'],
            [['tgl_komplain'], 'safe'],
            [['isi_komplain'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_komplain' => 'Id Komplain',
            'id_jadwal' => 'Masukkan nomer jadwal',
            'isi_komplain' => 'Isi Komplain',
            'tgl_komplain' => 'Tgl Komplain',
        ];
    }
}

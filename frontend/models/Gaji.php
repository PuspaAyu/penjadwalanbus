<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "gaji".
 *
 * @property integer $id_gaji
 * @property integer $jumlah_gaji
 * @property string $status_gaji
 * @property string $waktu_gaji
 */
class Gaji extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gaji';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jumlah_gaji', 'status_gaji', 'waktu_gaji'], 'required'],
            [['jumlah_gaji'], 'integer'],
            [['waktu_gaji'], 'safe'],
            [['status_gaji'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_gaji' => 'Id Gaji',
            'jumlah_gaji' => 'Jumlah Gaji',
            'status_gaji' => 'Status Gaji',
            'waktu_gaji' => 'Waktu Gaji',
        ];
    }
}

<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "karcis".
 *
 * @property integer $id_karcis
 * @property integer $karcis_pergi
 * @property integer $karcis_pulang
 */
class Karcis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karcis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_stok', 'pergi_awal', 'pergi_akhir', 'pulang_awal', 'pulang_akhir'], 'required'],
            [['id_stok', 'pergi_awal', 'pergi_akhir', 'pulang_awal', 'pulang_akhir'], 'default', 'value' => null],
            [['pergi_awal', 'pergi_akhir', 'pulang_awal', 'pulang_akhir'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_karcis' => 'Id Karcis',
            'id_stok' => 'Id Stok',
            'id_jadwal' => 'Id Jadwal',
            'pergi_awal' => 'Awal',
            'pergi_akhir' => 'Akhir',
            'pulang_awal' => 'Awal',
            'pulang_akhir' => 'Akhir',
        ];
    }
}

<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "karcis_setor".
 *
 * @property int $id_karcis
 * @property int $pergi_awal
 * @property int $pergi_akhir
 * @property int $pulang_awal
 * @property int $pulang_akhir
 * @property int $id_jadwal
 */
class KarcisSetor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karcis_setor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pergi_awal', 'pergi_akhir', 'pulang_awal', 'pulang_akhir', 'id_jadwal'], 'required'],
            [['pergi_awal', 'pergi_akhir', 'pulang_awal', 'pulang_akhir', 'id_jadwal'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_karcis' => 'Id Karcis',
            'pergi_awal' => 'Pergi Awal',
            'pergi_akhir' => 'Pergi Akhir',
            'pulang_awal' => 'Pulang Awal',
            'pulang_akhir' => 'Pulang Akhir',
            'id_jadwal' => 'Id Jadwal',
        ];
    }
}

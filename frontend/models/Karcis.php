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
            [['karcis_pergi', 'karcis_pulang'], 'required'],
            [['karcis_pergi', 'karcis_pulang'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_karcis' => 'Id Karcis',
            'karcis_pergi' => 'Karcis Pergi',
            'karcis_pulang' => 'Karcis Pulang',
        ];
    }
}

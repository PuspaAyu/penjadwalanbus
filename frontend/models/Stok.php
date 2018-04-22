<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "stok".
 *
 * @property integer $id_stok
 * @property string $tipe_karcis
 * @property integer $stok_jmlh_karcis
 */
class Stok extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stok';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipe_karcis', 'stok_jmlh_karcis'], 'required'],
            [['stok_jmlh_karcis'], 'integer'],
            [['tipe_karcis'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_stok' => 'Id Stok',
            'tipe_karcis' => 'Tipe Karcis',
            'stok_jmlh_karcis' => 'Stok Jmlh Karcis',
        ];
    }
}

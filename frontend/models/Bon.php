<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bon".
 *
 * @property int $id_bon
 * @property int $id_pegawai
 * @property string $tgl
 * @property double $nominal
 * @property int $tipe
 */
class Bon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'tgl', 'nominal', 'tipe'], 'required'],
            [['id_pegawai', 'tipe'], 'integer'],
            [['tgl'], 'safe'],
            [['nominal'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_bon' => 'Id Bon',
            'id_pegawai' => 'Id Pegawai',
            'tgl' => 'Tgl',
            'nominal' => 'Nominal',
            'tipe' => 'Tipe',
        ];
    }
}

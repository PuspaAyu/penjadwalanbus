<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pegawai_shift".
 *
 * @property int $id
 * @property int $id_pegawai
 * @property string $tanggal
 * @property string $shift
 */
class PegawaiShift extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pegawai_shift';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'tanggal', 'shift'], 'required'],
            [['id_pegawai'], 'integer'],
            [['tanggal'], 'safe'],
            [['shift'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pegawai' => 'Id Pegawai',
            'tanggal' => 'Tanggal',
            'shift' => 'Shift',
        ];
    }
}

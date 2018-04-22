<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bus".
 *
 * @property integer $id_bus
 * @property string $no_polisi
 * @property string $jam_operasional
 */
class Bus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_polisi', 'jam_operasional'], 'required'],
            [['no_polisi', 'jam_operasional'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_bus' => 'Id Bus',
            'no_polisi' => 'No Polisi',
            'jam_operasional' => 'Jam Operasional',
        ];
    }

    // public function getJadwalBus()
    // {
    //     return $this->hasMany(JadwalBus::className(), ['id_bus'=>'id_bus']);
    // }
}


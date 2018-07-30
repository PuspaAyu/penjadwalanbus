<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "history".
 *
 * @property int $id
 * @property string $no_polisi
 * @property string $jam_operasional
 * @property int $id_jurusan
 * @property int $status
 * @property int $id_karcis
 */
class History extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bus','no_polisi', 'jam_operasional', 'id_jurusan', 'id_karcis'], 'required'],
            [['id_jurusan', 'status', 'id_karcis'], 'integer'],
            [['no_polisi', 'jam_operasional'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_polisi' => 'No Polisi',
            'jam_operasional' => 'Jam Operasional',
            'id_jurusan' => 'Id Jurusan',
            'status' => 'Status',
            'id_karcis' => 'Id Karcis',
        ];
    }
}

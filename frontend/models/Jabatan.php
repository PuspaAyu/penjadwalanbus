<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "jabatan".
 *
 * @property integer $id_jabatan
 * @property string $jenis_jabatan
 */
class Jabatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jabatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_jabatan'], 'required'],
            [['jenis_jabatan'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jabatan' => 'Id Jabatan',
            'jenis_jabatan' => 'Jenis Jabatan',
        ];
    }
}

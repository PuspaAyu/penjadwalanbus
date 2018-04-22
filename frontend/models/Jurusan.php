<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "jurusan".
 *
 * @property integer $id_jurusan
 * @property string $jurusan
 */
class Jurusan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jurusan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jurusan'], 'required'],
            [['jurusan'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jurusan' => 'Id Jurusan',
            'jurusan' => 'Jurusan',
        ];
    }
}

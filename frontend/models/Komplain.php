<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "komplain".
 *
 * @property integer $id_komplain
 * @property string $isi_komplain
 */
class Komplain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'komplain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['isi_komplain'], 'required'],
            [['isi_komplain'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_komplain' => 'Id Komplain',
            'isi_komplain' => 'Isi Komplain',
        ];
    }
}

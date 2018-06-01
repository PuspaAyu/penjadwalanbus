<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bon".
 *
 * @property int $id_bon
 * @property int $bon_sopir
 * @property int $bon_kondektur
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
            [['bon_sopir', 'bon_kondektur'], 'required'],
            [['bon_sopir', 'bon_kondektur'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_bon' => 'Id Bon',
            'bon_sopir' => 'Bon Sopir',
            'bon_kondektur' => 'Bon Kondektur',
        ];
    }
}

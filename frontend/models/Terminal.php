<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "terminal".
 *
 * @property int $id_terminal
 * @property string $terminal
 */
class Terminal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'terminal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['terminal'], 'required'],
            [['terminal'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_terminal' => 'Id Terminal',
            'terminal' => 'Terminal',
        ];
    }
}

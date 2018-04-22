<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "hutang".
 *
 * @property integer $id_hutang
 * @property integer $jumlah_hutang
 * @property string $status_hutang
 * @property string $alasan
 */
class Hutang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hutang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jumlah_hutang', 'status_hutang', 'alasan'], 'required'],
            [['jumlah_hutang'], 'integer'],
            [['status_hutang'], 'string', 'max' => 10],
            [['alasan'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_hutang' => 'Id Hutang',
            'jumlah_hutang' => 'Jumlah Hutang',
            'status_hutang' => 'Status Hutang',
            'alasan' => 'Alasan',
        ];
    }
}

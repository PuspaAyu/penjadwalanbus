<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tpr".
 *
 * @property int $id_tpr
 * @property int $terminal
 * @property int $tpr
 * @property int $kemandoran
 */
class Tpr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tpr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_terminal', 'id_bus', 'tpr', 'kemandoran'], 'required'],
            [['id_terminal', 'id_bus', 'tpr', 'kemandoran'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tpr' => 'Id Tpr',
            'id_terminal' => 'Terminal',
            'tpr' => 'Tpr',
            'kemandoran' => 'Kemandoran',
        ];
    }
}

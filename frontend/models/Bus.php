<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

use frontend\models\Jurusan;

/**
 * This is the model class for table "bus".
 *
 * @property int $id_bus
 * @property string $no_polisi
 * @property string $jam_operasional
 * @property int $id_jurusan
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
            [['no_polisi', 'jam_operasional', 'id_jurusan'], 'required'],
            [['id_jurusan', 'status'], 'integer'],
            [['no_polisi', 'jam_operasional'], 'string', 'max' => 10],
            //[['id_jurusan'], 'string', 'max' => 50],
            // [['id_jurusan'], 'exist', 
            //          'skipOnError' => true, 
            //            'targetClass' => Jurusan::className(), 
            //            'targetAttribute' => ['id_jurusan' => 'id_jurusan'
            //  ]],
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
            'id_jurusan' => 'Id Jurusan',
            'status' => 'status',
        ];
    }

    public function getJurusan()
    {
        $jurusan = Jurusan::find()->where(['id_jurusan'=>$this->id_jurusan])->one();
        if($this->id_jurusan != 0){
            return $jurusan->jurusan;
        }
    }
}

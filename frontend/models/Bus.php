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
            [['no_polisi', 'jam_operasional', 'id_jurusan','id_karcis'], 'required'],
            [['id_jurusan', 'status', 'id_karcis'], 'integer'],
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
            'id_jurusan' => 'Jurusan',
            'status' => 'status',
            'seri' => 'seri',
            'id_karcis' => 'Karcis'
        ];
    }

    public function getJurusan()
    {
        $jurusan = Jurusan::find()->where(['id_jurusan'=>$this->id_jurusan])->one();
        if($this->id_jurusan != 0){
            return $jurusan->jurusan;
        }
    }

    public function getByStatus($status)
    {
        return Bus::find()->where(['status' => $status])->all();
    }

    public function getShift($idBus)
    {
        $shift = Bus::find()->where(['id_bus'=> $idBus])->one();
        return $shift;
    }
}

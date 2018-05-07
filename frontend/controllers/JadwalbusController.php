<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Jadwalbus;
use frontend\models\JadwalbusSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\models\Bus;
use yii\models\Pegawai;
use yii\data\ActiveDataProvider;
use yii\db\Query;

/**
 * JadwalbusController implements the CRUD actions for Jadwalbus model.
 */
class JadwalbusController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Jadwalbus models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'layout_admin';

        $query = new Query;
        $query->select(['bus.jam_operasional', 'bus.no_polisi', 'sopir.nama as sopir', 'kondektur.nama as kondektur', 'jurusan.jurusan'])
              ->from('jadwal_bus')
              ->join('LEFT JOIN', 'pegawai sopir', 'sopir.id_pegawai = jadwal_bus.id_sopir')
              ->join('LEFT JOIN', 'pegawai kondektur', 'kondektur.id_pegawai = jadwal_bus.id_kondektur')
              ->join('LEFT JOIN', 'bus', 'bus.id_bus = jadwal_bus.id_bus')
              ->join('LEFT JOIN', 'jurusan', 'jurusan.id_jurusan = bus.id_jurusan')
              ->orderBy('bus.jam_operasional');

        $command = $query->createCommand(); 
        $data = $command->queryAll();
        $rand = rand(1,137);
         $randomJadwal = $rand[$data];
        echo $randomJadwal;

        //initShift();

        return $this->render('index', [
            'jadwal' => $data,
        ]);


    }

    public function initShift(){
        $query = "SELECT * FROM 'bus'";
        $result = Yii::$app->db->createCommand($query)->queryAll();
    
}

<?php

namespace frontend\controllers;
use yii\filters\VerbFilter;
use frontend\models\Jadwal;
use frontend\models\Pegawai;
use frontend\models\Bus;
use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;


class JadwalController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $jadwalBus = Bus::find()->all();
        $pegawai = Pegawai::find()->all();
        $totalBus = Bus::find()->count();
        $sopir = Pegawai::find()->where(['jabatan' => 'sopir'])->all();
        $kondektur = Pegawai::find()->where(['jabatan' => 'kondektur'])->all();
    	// $query	= new Query;
    	// $query->select('bus.*, pegawai.*')
    	// 		->from('bus')
    	// 		->join('LEFT JOIN', 'pegawai', 'pegawai.id_pegawai=bus.id_bus');

    	// $command	= $query->createCommand();
        // $Jadwalbus = $command->queryAll();
        

        // var_dump(array(
        //     'bus' => $jadwalBus,
        //     'sopir' => $sopir,
        //     'kondektur' => $kondektur,
        // ));
        // die();

        // foreach ($jadwalBus as $key) {
        //     $dataBus = $key['id_bus'];
        //     print_r($dataBus);
        //     echo "<br>";
            
        //     // var_dump($pegawaiJabatan);
        //     // array_push($jadwalBus, $pegawaiJabatan);
        // }
        // $dataPegawai = array();
        // foreach ($pegawai as $key) {
        //     if ($key['jabatan'] == 'sopir') {
        //         $dataPegawai = $key['nama'];
        //     }elseif ($key['jabatan'] == 'kondektur') {
        //         $dataPegawai = $key['nama'];
        //     }else{
        //         $dataPegawai = null;
        //     }

        //     print_r($dataPegawai);
        //     echo "<br>";

        // }

        // die();

        return $this->render('index', [ 
            'jadwalBus' => $jadwalBus,
            'sopir' => $sopir,
            'kondektur' => $kondektur,
        ]);
    }

}

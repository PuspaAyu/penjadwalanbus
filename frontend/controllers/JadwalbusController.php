<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Jadwalbus;
use frontend\models\JadwalbusSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use frontend\models\Bus;
use yii\helpers\ArrayHelper;
use frontend\models\Pegawai;
use DateTime;
use DateInterval;
use DatePeriod;

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
    public function actionIndex(){
      $this->layout = 'layout_admin';
      $model = Jadwalbus::find()->all();

      $query = (new \yii\db\Query())
         ->select(['*'])
         ->from('jadwal_bus')
         ->groupBy('tanggal')
         ->all();
      return $this->render('index',[
        'query'=>$query,
        'model'=>$model
      ]);
    }


    public function actionShow($tanggal)
    {
        $this->layout = 'layout_admin';

        //join->dimana tanggal di tabel jadwal bus apakah ada id pegawai di tabel pegawai
        $querysopir = new Query;
        $querysopir->select(['pegawai.id_pegawai'])
                  ->from('pegawai')
                  ->join('JOIN', 'jadwal_bus', 'jadwal_bus.id_sopir=pegawai.id_pegawai')
                  ->where(['pegawai.id_jabatan' => '1', 'jadwal_bus.tanggal' => $tanggal]);
        $commandsopir = $querysopir->createCommand();
        $datasopir = $commandsopir->queryAll();

        //menampung data sopir untuk dilooping dan memasukkan ke dalah wadah
        $tempsopir = array();
        for ($i=0; $i < count($datasopir); $i++) {
          array_push($tempsopir, $datasopir[$i]['id_pegawai']);
        }

        $querykondektur = new Query;
        $querykondektur->select(['pegawai.id_pegawai'])
                  ->from('pegawai')
                  ->join('JOIN', 'jadwal_bus', 'jadwal_bus.id_kondektur=pegawai.id_pegawai')
                  ->where(['pegawai.id_jabatan' => '2', 'jadwal_bus.tanggal' => $tanggal]);

        $commandkondektur = $querykondektur->createCommand();
        $datakondektur = $commandkondektur->queryAll();
        $tempkondektur = array();
        for ($i=0; $i < count($datakondektur); $i++) {
          array_push($tempkondektur, $datakondektur[$i]['id_pegawai']);
        }

        //Query sopir izin
        $querysopirizin = new Query;
        $querysopirizin->select(['pegawai.id_pegawai'])
                    ->from('pegawai')
                    ->join('JOIN', 'izin', 'izin.id_pegawai=pegawai.id_pegawai')
                    ->where(['pegawai.id_jabatan' => '1']);
        $commandsopirizin = $querysopirizin->createCommand();
        $datasopirizin = $commandsopirizin->queryAll();

        $tempsopirizin = array();
          for ($i=0; $i < count($datasopirizin); $i++) {
            array_push($tempsopirizin, $datasopirizin[$i]['id_pegawai']);
          }

        //minimal ada 1 maka dia akan menampilkan
        if (count($datasopir) > 0){
           $dtsupir = Pegawai::find()->where(['id_jabatan'=>'1'])
          ->andWhere("id_pegawai NOT IN (".implode(',', $tempsopir).")")
          ->andWhere("id_pegawai NOT IN (".implode(',', $tempsopirizin).")")
          ->all();

        } else {
           $dtsupir = Pegawai::find()->where(['id_jabatan'=>'1'])
          ->where("id_pegawai NOT IN (".implode(',', $tempsopirizin).")")
          ->all();
        }


        if (count($datakondektur) > 0){
           $dtkond = Pegawai::find()->where(['id_jabatan'=>'2'])
          ->andWhere("id_pegawai NOT IN (".implode(',', $tempkondektur).")")
          ->all();

        } else {
           $dtkond = Pegawai::find()->where(['id_jabatan'=>'2'])
          // ->andWhere("id_pegawai NOT IN (".implode(',', $tempkondektur).")")
          ->all();
        }

        $supir = ArrayHelper::map($dtsupir, 'id_pegawai', 'nama');
        $kondektur = ArrayHelper::map($dtkond, 'id_pegawai', 'nama');

        $query = new Query;
        $query->select(['jadwal_bus.id_jadwal', 'jadwal_bus.id_sopir','jadwal_bus.id_kondektur','bus.jam_operasional', 'bus.no_polisi', 'sopir.nama as sopir', 'kondektur.nama as kondektur', 'jurusan.jurusan', 'bus.status'])
              ->from('jadwal_bus')
              ->where(['jadwal_bus.tanggal' => $tanggal])

              ->join('LEFT JOIN', 'pegawai sopir', 'sopir.id_pegawai = jadwal_bus.id_sopir')
              ->join('LEFT JOIN', 'pegawai kondektur', 'kondektur.id_pegawai = jadwal_bus.id_kondektur')
              ->join('LEFT JOIN', 'bus', 'bus.id_bus = jadwal_bus.id_bus')
              ->join('LEFT JOIN', 'jurusan', 'jurusan.id_jurusan = bus.id_jurusan')
              ->orderBy('bus.id_bus');

        $command = $query->createCommand();
        $data = $command->queryAll();

        return $this->render('show', [
            'jadwal' => $data,
            'supir'=>$supir,
            'kondektur'=>$kondektur,
            'tempsopir'=>implode(',', $tempsopir),
            'tempkondektur'=>implode(',', $tempkondektur),
            // 'datasopir'=>$datasopir,
            // 'datakondektur'=>$datakondektur,
            // 'model' => $this->findModel($id)
        ]);
    }

    public function actionSupir($id)
    {
      $supir = Pegawai::find()->where('id_pegawai != '.$id)->andWhere(['id_jabatan'=>'1'])->all();
      foreach ($supir as $key) {
          echo "<option value='".$key->id_pegawai."'>".$key->nama."</option>";
      }
    }

    public function actionCreate()
    {
        $this->layout = 'layout_admin';
        $totalBus = Bus::find()->count();
        $bus = Bus::find()->all();
        $request =Yii::$app->request->post();

        if ($request) {
            // mengambil semua tanggal dari periode tanggal mulai sampai tanggal berakhir
            $rangeDate = $this->getRangeDate($request['tanggal'], $request['tanggal2']);

            foreach ($rangeDate as $date) {
              $this->setShiftSopir($date); // Set Shift Sopir
              $this->setShiftKondektur($date); // Set Shift Kondektur
            }

            die();
            return $this->redirect(['view', 'id' => $model->id_jadwal]);
        }
        else {
            $model = new Jadwalbus();
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionSave($id)
    {
      $this->layout = 'layout_admin';
      $model = Jadwalbus::find()->where(['id_jadwal' => $id])->one();

      $request = Yii::$app->request->post();
      if (Yii::$app->request->post()) {
          if(!empty($request['sopir']) AND !empty($request['kondektur'])){
             $model->id_sopir = 0;
             $model->id_kondektur = 0;
          } else {
              $model->id_sopir = $request['supir'];
              $model->id_kondektur = $request['kondektur'];
          }
          $model->update();

          return $this->refresh();

      }else{
          return $this->redirect(['show', 'tanggal' => $model->tanggal]);

        // return $this->render('index', [
        //     'model' => $model,
        // ]);
      }
    }

    public function actionSalinjadwal($id){
       $this->layout = 'layout_admin';
        $totalBus = Jadwalbus::find()->where(['tanggal'=>$id])->count();
        $bus = Jadwalbus::find()->where(['tanggal'=>$id])->all();

        if (Yii::$app->request->post()) {

            $request = Yii::$app->request->post();

            foreach ($bus as $key) {
              $model = new Jadwalbus();
              $model->tanggal = $request['JadwalBus']['tanggal'];
              $model->id_bus = $key->id_bus;
              $model->id_jurusan = $key->id_jurusan;
              $model->id_sopir = $key->id_sopir;
              $model->id_kondektur = $key->id_kondektur;
              $model->save();
            }

            return $this->redirect(['index']);
        } else {
            $model = new Jadwalbus();
            return $this->render('salinjadwal', [
                'model' => $model,
                'salintanggal' => $id,
            ]);

        }
    }

    public function actionHapusjadwal($id){
      $model = Jadwalbus::find()->where(['tanggal'=>$id])->all();
      foreach ($model as $key) {
        $key->delete();
      }
        return $this->redirect(['index']);

    }

    private function getRangeDate($begin, $end){
      $begin = new DateTime($begin);
      $end = new DateTime($end);
      $end = $end->modify( '+1 day'); // menambahkan 1 hari

      $interval = new DateInterval('P1D'); // 1 Day
      $dateRange = new DatePeriod($begin, $interval, $end);

      $range = [];
      foreach ($dateRange as $date) {
           $range[] = $date->format('Y-m-d');
      }

      return $range;
    }

    private function setShiftSopir($date)
    {
        $randSopir = Pegawai::find()->where(['id_jabatan' => 1])->orderBy(new Expression('rand()'))->all(); // Random sopir
        $randSopirCount = count($randSopir); // Total sopir

        $iterasi = 1;
        foreach ($randSopir as $sopir) {
          $intval = (int)($randSopirCount/2)+1; // Sebaagi pembatas 2 shift dari total sopir
          $shift = PegawaiShift::find()->select('shift')->where(['id_pegawai' => $sopir['id_pegawai'] ])->orderBy('id DESC')->one(); // Mengambil last shift dari Pegawai
          $izin = Izin::find()->where(['id_pegawai' => $sopir['id_pegawai'] ])->one(); // Mengambil tgl_izin pegawai

          if ($izin['tgl_izin'] != $date) { // Mengecek jika ada pegawai yang izin
            if ($shift == null) {
              // Menambahkan Shift Pegawai
              if ($iterasi <= $intval) {
                $this->savePegawaiShift($sopir['id_pegawai'], $date, 'pagi');
              }
              else{
                $this->savePegawaiShift($sopir['id_pegawai'], $date, 'malam');
              }
            }
            else{
              if ($shift['shift'] == "pagi") { // Mengecek shift pegawai jika sebelumnya Pagi => Malam
                $this->savePegawaiShift($sopir['id_pegawai'], $date, 'malam');
              }
              else{ // Shift pegawai jika sebelumnya Malam => Pagi
                $this->savePegawaiShift($sopir['id_pegawai'], $date, 'pagi');
              }
            }
          }

          $iterasi++;
        }
    }

    private function setShiftKondektur($date)
    {
        $randKondektur = Pegawai::find()->where(['id_jabatan' => 2])->orderBy(new Expression('rand()'))->all(); // Random Kondektur
        $randKondekturCount = count($randKondektur); // Total Kondektur

        $iterasi = 1;
        foreach ($randKondektur as $kondektur) {
          $intval = (int)($randKondekturCount/2)+1; // Sebaagi pembatas 2 shift dari total Kondektur
          $shift = PegawaiShift::find()->select('shift')->where(['id_pegawai' => $kondektur['id_pegawai'] ])->orderBy('id DESC')->one(); // Mengambil last shift dari Pegawai
          $izin = Izin::find()->where(['id_pegawai' => $kondektur['id_pegawai'] ])->one(); // Mengambil tgl_izin pegawai

          if ($izin['tgl_izin'] != $date) { // Mengecek jika ada pegawai yang izin
            if ($shift == null) {
              // Menambahkan Shift Pegawai
              if ($iterasi <= $intval) {
                $this->savePegawaiShift($kondektur['id_pegawai'], $date, 'pagi');
              }
              else{
                $this->savePegawaiShift($kondektur['id_pegawai'], $date, 'malam');
              }
            }
            else{
              if ($shift['shift'] == "pagi") { // Mengecek shift pegawai jika sebelumnya Pagi => Malam
                $this->savePegawaiShift($kondektur['id_pegawai'], $date, 'malam');
              }
              else{ // Shift pegawai jika sebelumnya Malam => Pagi
                $this->savePegawaiShift($kondektur['id_pegawai'], $date, 'pagi');
              }
            }
          }

          $iterasi++;
        }
    }

    private function savePegawaiShift($id_pegawai, $date, $shift)
    {
        $pegawai = new PegawaiShift();
        $pegawai->id_pegawai  = $id_pegawai;
        $pegawai->tanggal = $date;
        $pegawai->shift  = $shift;
        $pegawai->save();
    }

    private function setPegawaiBus($pegawai, $shift, $date)
    {
        $bus = Bus::find()->where(['status' => 1])->all();

        foreach ($bus as $item) {
          $pegawai = PegawaiShift::findPegawaiByShift($pegawai, $shift); // Get sopir shift pagi

          foreach ($pegawai as $key) {

            if ($date == $key['tanggal']) {

              $jadwalBus = new Jadwalbus;
              $jadwalBus->tanggal = $key['tanggal'];
              $jadwalBus->id_bus = $item['id_bus'];
              $jadwalBus->id_jurusan = $item['id_jurusan'];
              $jadwalBus->id_sopir = $key['id_pegawai'];
              // $jadwalBus->id_kondektur = $key['id_pegawai'];
              $jadwalBus->save();

              VarDumper::dump($jadwalBus);
              die();
            }
          }
        }
    }
}

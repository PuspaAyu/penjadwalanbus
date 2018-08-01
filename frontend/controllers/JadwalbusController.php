<?php
namespace frontend\controllers;
use Yii;
use frontend\models\Jadwalbus;
use frontend\models\history;
use frontend\models\jurusan;
use frontend\models\JadwalbusSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use frontend\models\Bus;
use frontend\models\Izin;
use yii\helpers\ArrayHelper;
use frontend\models\Pegawai;
use frontend\models\PegawaiShift;
use yii\db\Expression;
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
    public function behaviors(){
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
    public function actionShow($tanggal){
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

        //join->dimana tanggal di tabel jadwal bus apakah ada id kondektur di tabel pegawai
        $querykondektur = new Query;
        $querykondektur->select(['pegawai.id_pegawai'])
                  ->from('pegawai')
                  ->join('JOIN', 'jadwal_bus', 'jadwal_bus.id_kondektur=pegawai.id_pegawai')
                  ->where(['pegawai.id_jabatan' => '2', 'jadwal_bus.tanggal' => $tanggal]);
        $commandkondektur = $querykondektur->createCommand();
        $datakondektur = $commandkondektur->queryAll();

        //menampung data kondektur untuk dilooping dan memasukkan ke dalah wadah
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
          
            $dtsupir = Pegawai::find()->where(['id_jabatan'=>'1']);
            if (!empty($tempsopir)) {
              $dtsupir = $dtsupir->andWhere("id_pegawai NOT IN (".implode(',', $tempsopir).")");
            }
            if (!empty($tempsopirizin)) {
              $dtsupir = $dtsupir->andWhere("id_pegawai NOT IN (".implode(',', $tempsopirizin).")");
            }
            $dtsupir = $dtsupir->all();
        
        } else {
           $dtsupir = Pegawai::find()->where(['id_jabatan'=>'1'])
          ->where("id_pegawai NOT IN (".implode(',', $tempsopirizin).")") //implode untuk memecah array id pegawai yang izin
          ->all();
        }
        
       
        if (count($datakondektur) > 0){
           $dtkond = Pegawai::find()->where(['id_jabatan'=>'2'])
          ->andWhere("id_pegawai NOT IN (".implode(',', $tempkondektur).")")//implode untuk memecah arrat id kondektur
          ->all();
        
        } else {
           $dtkond = Pegawai::find()->where(['id_jabatan'=>'2'])
          // ->andWhere("id_pegawai NOT IN (".implode(',', $tempkondektur).")")
          ->all();
        }
        
        $supir = ArrayHelper::map($dtsupir, 'id_pegawai', 'nama');
        $kondektur = ArrayHelper::map($dtkond, 'id_pegawai', 'nama');
        $query = new Query;

        $history = history::find()->all();

        //query saat lihat jadwal
        $query->select(['jadwal_bus.id_jadwal', 'jadwal_bus.tanggal', 'jadwal_bus.id_sopir','jadwal_bus.id_kondektur','bus.jam_operasional', 'bus.no_polisi', 'sopir.nama as sopir', 'kondektur.nama as kondektur', 'jurusan.jurusan', 'bus.status'])
              ->from('jadwal_bus')
              ->where(['jadwal_bus.tanggal' => $tanggal])
              ->join('LEFT JOIN', 'pegawai sopir', 'sopir.id_pegawai = jadwal_bus.id_sopir')
              ->join('LEFT JOIN', 'pegawai kondektur', 'kondektur.id_pegawai = jadwal_bus.id_kondektur')
              ->join('LEFT JOIN', 'bus', 'bus.id_bus = jadwal_bus.id_bus')
              ->join('LEFT JOIN', 'jurusan', 'jurusan.id_jurusan = bus.id_jurusan')
              // ->join('LEFT JOIN', 'history', 'history.id_bus = jadwal_bus.id_bus')  
              ->orderBy('bus.id_bus');

        $command = $query->createCommand(); 
        $data = $command->queryAll();

        $index = 0;
        foreach ($data as $key => $value) {
          if ($value['jam_operasional'] == NULL){
            $history = history::find()->where(['id' => ($key+1)])->one();//untuk menampilkan bus yang telah dihapus pada jadwal lama
            $jurusan = jurusan::find()->where(['id_jurusan' => $history['id_jurusan']])->one();
            $data[$key]['jam_operasional'] = $history['jam_operasional'];
            $data[$key]['no_polisi'] = $history['no_polisi'];
            $data[$key]['jurusan'] = $jurusan['jurusan'];
            $data[$key]['status'] = $history['status'];
          } 

          $index++;
        }

        $result = asort($data);

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
    public function actionSupir($id){
      $supir = Pegawai::find()->where('id_pegawai != '.$id)->andWhere(['id_jabatan'=>'1'])->all();
      foreach ($supir as $key) {
          echo "<option value='".$key->id_pegawai."'>".$key->nama."</option>";
      }
    }
    public function actionCreate(){
        $this->layout = 'layout_admin';
        $request = Yii::$app->request->post();
        $message = "";

        if ($request) {

          $GLOBALS['sopir'] = $this->getRandomSopir();
          $GLOBALS['kondektur'] = $this->getRandomKondektur();
          $GLOBALS['bus_pagi'] = $this->getBusByStatus(1);
          $GLOBALS['bus_malam'] = $this->getBusByStatus(2);
          $GLOBALS['izin'] = Izin::find()->orderBy('tgl_izin')->all();
          $GLOBALS['shift'] = null;
          $GLOBALS['total_sopir'] = $this->checkCountSopir();
          $GLOBALS['total_kondektur'] = null;
          $GLOBALS['log'] = array();

          // mengambil semua tanggal dari periode tanggal mulai sampai tanggal berakhir
          $rangeDate = $this->getRangeDate($request['tanggal'], $request['tanggal2']);
          $i = 0;          
          // $ran_num_s = [];
          // $ran_num_k = [];

          foreach ($rangeDate as $date) {
            //$classes = $GLOBALS['sopir'];
            //$logs = $GLOBALS['log'];

            // array_push($GLOBALS['log'], $classes);
            // while($sopir == null){
            //   for ($i=0; $i < 10; $i++) { 
            //     # code...
            //     $randomIndexsopir = rand(0, sizeof($classes) - 1);

            //     if($classes[$randomIndexsopir] != null){
            //       $sopir = $classes[$randomIndexsopir];
            //     }

            //     \yii\helpers\VarDumper::dump($classes);
            //     echo "<br>";

            //   }
            //   echo "<br>";
            
            // }

            // var_dump(in_array($classes[$randomIndexsopir], $logs));

            // for($n = 1; $n <= 5; $n++){
            //   $sopir_found = false;
            //   while (!$sopir_found){
            //     $num = rand(1, count($sopir));
            //     if(!in_array($num, $ran_num_s)){
            //       array_push($ran_num_s, $num);
            //       $sopir_found = true;
            //     }
            //   }

            //   $kondektur_found = false;
            //   while (!$kondektur_found) {
            //     $num = rand(1, count($kondektur));
            //     if(!in_array($num, $ran_num_k)){
            //       array_push($ran_num_k, $num);
            //       $kondektur_found = true;
            //     }
            //   }

            // }
            // print_r($ran_num_s);

            // $randSopir = [];
            // $randKondektur = [];
            // foreach ($ran_num_s as $random) {
            //   array_push($randSopir, $sopir[$random - 1]);
            // }

            // foreach ($ran_num_k as $random) {
            //   array_push($randKondektur, $kondektur[$random - 1]);
            // }
            
            //$this->setShiftSopir($date); // Set Shift Sopir
            // $this->setShiftKondektur($date); // Set Shift Kondektur
            // $this->setSopirBus('pagi', $date); // Set Sopir Bus Pagi
            // $this->setSopirBus('malam', $date); // Set Sopir Bus Malam
            // var_dump($GLOBALS['log']);
            // $GLOBALS['total_sopir'] = $this->checkCountKondektur();

            $before = new DateTime($date); 
            $before->modify('-1 day');
            $beforeDate = $before->format('Y-m-d');
            if ($this->checkDateJadwalBus($date) == null){

              if ($this->checkRecord() != null) {
                if ($i == 0) {
                  if($this->checkDateJadwalBus($beforeDate) == null){
                    $message  = "Maaf, generate tanggal harus sesuai urutan!";
                    echo $message;
                    die();
                  }
                }  
              } else {
            
              }
              
              if($this->checkDateJadwalBus($beforeDate) != null){

              //   $arrLibur = $this->checkLiburSopir();

              //   // $GLOBALS['sopir'] = $newSopir;

                $sopir = $this->getLastShiftPegawai('sopir', $beforeDate);
                $kondektur = $this->getLastShiftPegawai('kondektur', $beforeDate);
              //   // var_dump($sopir);
              //   // echo "<br><br>";
              //   var_dump($GLOBALS['sopir']);die();

              //   foreach ($arrLibur as $item) {
              //     foreach (array_keys(array_column($sopir, 'id_pegawai'), $item) as $key) {
              //       $obj = array_pop($GLOBALS['sopir']);
              //       $data = [
              //         'date' => $date,
              //         'id_pegawai' => $obj['id_pegawai'],
              //         'shift' => 'pagi'
              //       ];
              //       array_push($sopir, $data);
              //       unset($sopir[$key]);
              //     }
              //   }

              //   echo "<br><br>";
              //   // var_dump($sopir);die();
              //   // NEXT TO DO

                $GLOBALS['shift']['sopir'] = $sopir;
                $GLOBALS['shift']['kondektur'] = $kondektur;
                $shiftSopir = $this->setShiftSopirNext($date);
                $shiftKondektur = $this->setShiftKondekturNext($date);
                $GLOBALS['shift']['sopir'] = $shiftSopir; 
                $GLOBALS['shift']['kondektur'] = $shiftKondektur;
              } 
              else if($this->checkRecord() == null){

                if (count($GLOBALS['log']) == 0) {
                  $shiftSopir = $this->setShiftSopirAwal($date);
                  $shiftKondektur = $this->setShiftKondekturAwal($date);
                  $GLOBALS['shift']['sopir'] = $shiftSopir; 
                  $GLOBALS['shift']['kondektur'] = $shiftKondektur;
                } else {
                  $shiftSopir = $this->setShiftSopirNext($date);
                  $shiftKondektur = $this->setShiftKondekturNext($date);
                  $GLOBALS['shift']['sopir'] = $shiftSopir; 
                  $GLOBALS['shift']['kondektur'] = $shiftKondektur;
                }
              }
              else{
                $shiftSopir = $this->setShiftSopirNext($date);
                $shiftKondektur = $this->setShiftKondekturNext($date);
                $GLOBALS['shift']['sopir'] = $shiftSopir; 
                $GLOBALS['shift']['kondektur'] = $shiftKondektur;
              }      

              $tempSopirP = @$this->setSopirBusPagi($GLOBALS['shift']['sopir'], $date);
              $tempsopirM = @$this->setSopirBusMalam($GLOBALS['shift']['sopir'], $date);
              $dataPagi = @$this->setKondekturBusPagi($GLOBALS['shift']['kondektur'], $tempSopirP, $date);
              $dataMalam = @$this->setKondekturBusMalam($GLOBALS['shift']['kondektur'], $tempsopirM, $date);

              array_push($GLOBALS['log'], [
                'bus' => [
                  'pagi' => $dataPagi ,
                  'malam' => $dataMalam ,
                ],
                'tanggal' => $date
              ]);   

            }
            else{
              $message = "Maaf, tanggal sudah ada dalam jadwal !";
              echo $message;
              die();
            }

            $i++;
          }

          $this->saveToDatabase($GLOBALS['log']);

          $query = (new \yii\db\Query())
           ->select(['*'])
           ->from('jadwal_bus')
           ->groupBy('tanggal')
           ->all();

          return $this->render('index', [
            'data' => $GLOBALS['log'],
            'query' =>  $query,
            'countK' => $this->checkCountKondektur(),
            'countS' => $this->checkCountSopir()
          ]);
        }
        else {
            $model = new Jadwalbus();
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }
    public function actionSave($id){
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
    private function setShiftSopir($date){
        $randSopir = Pegawai::find()->where(['id_jabatan' => 1])->orderBy(new Expression('rand()'))->all(); // Random sopir
        $randSopirCount = count($randSopir); // Total sopi

        $array = array();
        $iterasi = 1;
        $tempShift = array();
        $tempKeys = array();
        foreach ($randSopir as $sopir) {
          $intval = (int)($randSopirCount/2)+1; // Sebaagi pembatas 2 shift dari total sopir
          $shift = PegawaiShift::find()->select('shift')->where(['id_pegawai' => $sopir['id_pegawai'] ])->orderBy('id DESC')->one(); // Mengambil last shift dari Pegawai
          $izin = Izin::find()->where(['id_pegawai' => $sopir['id_pegawai'] ])->one(); // Mengambil tgl_izin pegawai
          // $jadwal_libur = Jadwalbus::find()->where(['id_sopir' => $sopir['id_pegawai']])->count();
          if ($izin['tgl_izin'] != $date) { // Mengecek jika ada pegawai yang izin
            // if ($jadwal_libur <= 10) {
              if ($shift == null) {
                // Menambahkan Shift Pegawai
                if ($iterasi <= $intval) {
                  $this->savePegawaiShift($sopir['id_pegawai'], $date, 'pagi');
                } 
                else{
                  $this->savePegawaiShift($sopir['id_pegawai'], $date, 'malam');
                }
              }
            // }
            else{
              // if ($jadwal_libur <= 10) {
                if ($shift['shift'] == "pagi") { // Mengecek shift pegawai jika sebelumnya Pagi => Malam
                  $this->savePegawaiShift($sopir['id_pegawai'], $date, 'malam');
                }
                else{ // Shift pegawai jika sebelumnya  Malam => Pagi
                  $this->savePegawaiShift($sopir['id_pegawai'], $date, 'pagi');
                }
              // }
            }
          }
          $iterasi++;
        }
    }
    private function setShiftKondektur($date){
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
    private function savePegawaiShift($id_pegawai, $date, $shift){
        $pegawai = new PegawaiShift();
        $pegawai->id_pegawai  = $id_pegawai;
        $pegawai->tanggal = $date;
        $pegawai->shift  = $shift;
        $pegawai->save();
    }
    private function setSopirBus($shift, $date){
       $status = ($shift == 'pagi') ? 1 : 2 ;
        $bus = Bus::find()->where(['status' => $status])->all();
        $sopir = PegawaiShift::findPegawaiByShift(1, $shift, $date);
        $kondektur = PegawaiShift::findPegawaiByShift(2, $shift, $date); // Get sopir shift pagi
        
        echo $status."<br>";
        // $i = 0;
        // foreach ($bus as $item) {
        //   // $sopir = PegawaiShift::findPegawaiByShift(1, $shift, $date); // Get sopir shift pagi
        //   if ($i > count($sopir) || $i > count($kondektur)) {
        //     $jadwalBus = new Jadwalbus;
        //     $jadwalBus->tanggal = $date;    
        //     $jadwalBus->id_bus = $item['id_bus'];
        //     $jadwalBus->id_sopir = 0;
        //     $jadwalBus->id_kondektur = 0;
        //     $jadwalBus->save();
        //   }
        //   else{
        //     foreach ($sopir as $key) {
            
        //       $jadwalBus = new Jadwalbus;
        //       $jadwalBus->tanggal = $sopir[$i]['tanggal'];    
        //       $jadwalBus->id_bus = $item['id_bus'];
        //       $jadwalBus->id_sopir = $sopir[$i]['id_pegawai'];
        //       $jadwalBus->id_kondektur = $kondektur[$i]['id_pegawai'];
        //       $jadwalBus->save();
        //       $this->setKondekturBus($shift, $date, $jadwalBus->id_jadwal);
        //       PegawaiShift::find()->where(['id_pegawai' => $sopir[$i]['id_pegawai'], 'tanggal' => $date])->one()->delete();
        //       PegawaiShift::find()->where(['id_pegawai' => $kondektur[$i]['id_pegawai'], 'tanggal' => $date])->one()->delete();

        //     }
        //   }
        //   $i++;
        // }
        $status = ($shift == 'pagi') ? 1 : 2 ;
        $bus = Bus::find()->where(['status' => $status])->all();
        $count = PegawaiShift::findPegawaiByShift(1, $shift, $date);
        
        $i = 0;
        foreach ($bus as $item) {
          $sopir = PegawaiShift::findPegawaiByShift(1, $shift, $date); // Get sopir shift pagi
          if ($i > count($count)) {
            $jadwalBus = new Jadwalbus;
            $jadwalBus->tanggal = $date;    
            $jadwalBus->id_bus = $item['id_bus'];
            $jadwalBus->id_sopir = 0;
            $jadwalBus->id_kondektur = 0;
            $jadwalBus->save();
          }
          else{
            foreach ($sopir as $key) {
            
              $jadwalBus = new Jadwalbus;
              $jadwalBus->tanggal = $key['tanggal'];    
              $jadwalBus->id_bus = $item['id_bus'];
              $jadwalBus->id_sopir = $key['id_pegawai'];
              $jadwalBus->id_kondektur = 0;
              $jadwalBus->save();
              $this->setKondekturBus($shift, $date, $jadwalBus->id_jadwal);
  
              PegawaiShift::find()->where(['id_pegawai' => $key['id_pegawai'], 'tanggal' => $date])->one()->delete();
              break;
  
            }
          }
          $i++;
        }
    }
    private function setKondekturBus($shift, $date, $id){
        $kondektur = PegawaiShift::findPegawaiByShift(2, $shift, $date); // Get sopir shift pagi
        foreach ($kondektur as $key) {
        
          $jadwalBus = Jadwalbus::findOne($id);
          $jadwalBus->id_kondektur = $key['id_pegawai'];
          $jadwalBus->update();
          PegawaiShift::find()->where(['id_pegawai' => $key['id_pegawai'], 'tanggal' => $date])->one()->delete();
          break;
        }
    }

    /* START GENERATE WITH ARRAY */

    private function checkRecord(){
        $record = JadwalBus::find()->all();
        return $record;
    }

    private function checkDateJadwalBus($date){
        $tanggal = JadwalBus::find()->select('tanggal')->where(['tanggal' => $date])->one();
        if ($tanggal['tanggal'] == null) {
          return $tanggal;
        }

        return $tanggal;
    }

    private function checkLastDate(){
        $tanggal = JadwalBus::find()->orderBy(['id_jadwal'=>SORT_DESC])->one();
        if ($tanggal['tanggal'] == null) {
          return $tanggal;
        }

        return $tanggal;
    }

    private function checkCountSopir(){
        $query = new Query;
        //query jumlah sopir berdasarkan id nya
        $query->select(['count(*) as total', 'id_sopir'])  
              ->from('jadwal_bus')
              ->groupBy('id_sopir');
        $command = $query->createCommand();
        $result = $command->queryAll();
        $array = array();
        foreach ($result as $key => $value) {
          $data = [
            'total' => $value['total'] % 10,
            'id_sopir' => $value['id_sopir'],
          ];
          array_push($array, $data);
        }
        return $array;
    }

    private function checkCountKondektur(){
        $query = new Query;
        $query->select(['count(*) as total', 'id_kondektur'])  
              ->from('jadwal_bus')
              ->groupBy('id_kondektur');

        $command = $query->createCommand();
        $result = $command->queryAll();

        $array = array();
        foreach ($result as $key => $value) {
          $data = [
            'total' => $value['total'] % 10,
            'id_kondektur' => $value['id_kondektur'],
          ];
          array_push($array, $data);
        }

        return $array;
    }

    private function getLastShiftPegawai($pegawai, $date=null){
        if ($date == null) {
          $tanggal = $this->checkLastDate();
          $date = $tanggal['tanggal'];
        }

        $query = new Query;
        $query->select(['jadwal_bus.id_bus', 'jadwal_bus.id_sopir', 'jadwal_bus.id_kondektur', 'bus.status'])  
              ->from('jadwal_bus')
              ->leftJoin('bus', 'bus.id_bus = jadwal_bus.id_bus')
              ->where(['jadwal_bus.tanggal' => $date]);

        $command = $query->createCommand();
        $result = $command->queryAll();

        $array = array();                    
        foreach ($result as $key) {
          
          $id_pegawai = ( $pegawai == 'sopir' ) ? intval($key['id_sopir']) : intval($key['id_kondektur']) ;
          $status = ( $key['status'] == 1 ) ? 'pagi' : 'malam' ;
          $data = [
            'date'         => $date,
            'id_pegawai'   => $id_pegawai,
            'shift'        => $status,
          ];
          array_push($array, $data);
                 
        }
        
        return $array;
    }

    private function getRandomSopir(){
        $sopir = Pegawai::getRandomSopir();
        $array = array();
        foreach ($sopir as $key) {
          $data = [
            'id_pegawai'   => $key['id_pegawai'],
            'id_jabatan'   => $key['id_jabatan'],
          ];
          array_push($array, $data);
        }

        return $array;
    }

    private function getRandomKondektur(){
        $kondektur = Pegawai::getRandomKondektur();
        $array = array();

        foreach ($kondektur as $key) {
          $data = [
            'id_pegawai'   => $key['id_pegawai'],
            'id_jabatan'   => $key['id_jabatan'],
          ];
          array_push($array, $data);
        }

        return $array;
    }

    private function getBusBystatus($status){
        $bus = Bus::getByStatus($status);//ambil bus berdasarkan status pagi atau malam
        $array = array();//ditampung di array dulu

        foreach ($bus as $key) {
          $data = [
            'id_bus'   => $key['id_bus'],
            'status'   => $key['status'],
          ];
          array_push($array, $data);
        }

        return $array;
    }

    private function setShiftSopirAwal($date){
        $sopir = $GLOBALS['sopir'];
        $countSopir = count($sopir);
        $array = array();
        $index = 0;
        foreach ($sopir as $key) {
          $retVal = ($this->checkIzin($key['id_pegawai'], $date)) ? $countSopir-- : $countSopir ;
        }

        foreach ($sopir as $key) {
          $idSopir = $key['id_pegawai'];
          $interval = (int)ceil($countSopir/2); // untuk membagi shift dari total sopir

          // mengecek apakah pegawai memliki izin pada tanggal tsb
          if (!$this->checkIzin($idSopir, $date)) { // Sopir tidak memiliki izin
            if ($index <= $interval) { // set setengah total sopir pagi 
              $data = [
                'date' => $date,
                'id_pegawai' => $key['id_pegawai'],
                'shift' => 'pagi'
              ];
              array_push($array, $data); 
            } 
            else{ // set setengah total sopir malam
              $data = [
                'date' => $date,
                'id_pegawai' => $key['id_pegawai'],
                'shift' => 'malam'
              ];
              array_push($array, $data);
            }
          }
          
          $index++;
        }

        return $array;
    }

    private function setShiftkondekturAwal($date){
        $kondektur = $GLOBALS['kondektur'];
        $countKondektur = count($kondektur);
        $array = array();
        $index = 0;
        foreach ($kondektur as $key) {
          $retVal = ($this->checkIzin($key['id_pegawai'], $date)) ? $countKondektur-- : $countKondektur ;
        }

        foreach ($kondektur as $key) {
          $idKondektur = $key['id_pegawai'];
          $interval = (int)ceil($countKondektur/2); // untuk membagi shift dari total sopir
          
          // mengecek apakah pegawai memliki izin pada tanggal tsb
          if (!$this->checkIzin($idKondektur, $date)) { // Sopir tidak memiliki izin
            if ($index <= $interval) { // set setengah total sopir pagi 
              $data = [
                'date' => $date,
                'id_pegawai' => $key['id_pegawai'],
                'shift' => 'pagi'
              ];
              array_push($array, $data); 
            } 
            else{ // set setengah total sopir malam
              $data = [
                'date' => $date,
                'id_pegawai' => $key['id_pegawai'],
                'shift' => 'malam'
              ];
              array_push($array, $data);
            }
          }
          
          $index++;
        }

        return $array;
    }

    private function setShiftSopirNext($date){
        $sopir = $GLOBALS['sopir'];
        $shift = $GLOBALS['shift']['sopir'];
        $countShift = count($shift); 
        $countSopir = count($sopir);
        
        $array  = array();
        $index  = 1;
        $temp   = 0;
        foreach ($sopir as $key) {
          $idSopir = $key['id_pegawai'];          
          $arr  = array_column($sopir, 'id_pegawai'); // mangambil column id_pegawai pada array sopir
          $arr2 = array_column($shift, 'id_pegawai'); // mangambil column id_pegawai pada array shift
          $res  = array_diff($arr, $arr2); // mencari perbedaan dari dua column(id_pegawai)

          // var_dump($sopir);
          // die();

          $i=0;
          foreach ($shift as $key) {
            $check = in_array($idSopir, $key);
            if($check){ // Check apakah sopir sudah dalam array shift
              // mengecek apakah pegawai memliki izin pada tanggal tsb
              if( !$this->checkIzin($idSopir, $date) ){ // pegawai tidak memiliki izin              
                if ($key['shift'] == 'pagi') { // cek apakah shift pegawai pagi ?
                  $data = [
                    'date' => $date,
                    'id_pegawai' => $key['id_pegawai'],
                    'shift' => 'malam'
                  ];
                  array_push($array, $data);
                  break;
                }
                else{ // cek apakah shift pegawai malam ?
                  $data = [
                    'date' => $date,
                    'id_pegawai' => $key['id_pegawai'],
                    'shift' => 'pagi'
                  ];
                  array_push($array, $data);
                                    
                  break;
                }
              }
            }
            

            // looping dari total diff column id_pegawai
            // foreach($res as $item) {

            //   if($idSopir == $item){ // cek jika id sopir == id sopir yang ada pada array diff
            //     $idSopir;
            //     if($key['id_pegawai'] == $item){
                  
            //       if($key['shift'] == 'pagi'){ // cek last sopir shift = pagi
            //         $data = [
            //           'date' => $date,
            //           'id_pegawai' => $idSopir,
            //           'shift' => 'malam'
            //         ];
            //         if ($temp == 0) { // cek jika data belum pernah dipush
            //           array_push($array, $data);
            //           $temp = 1;
            //         }
            //         break;
            //       }
            //       elseif($key['shift'] == 'malam') { // cek last sopir shift = malam
            //         $data = [
            //           'date' => $date,
            //           'id_pegawai' => $idSopir,
            //           'shift' => 'pagi'
            //         ];
            //         if ($temp == 0) { // cek jika data belum pernah dipush
            //           array_push($array, $data);
            //           $temp = 1;
            //         }
            //         break;
            //       }
            //     }else{
            //       $data = [
            //         'date' => $date,
            //         'id_pegawai' => $idSopir,
            //         'shift' => 'pagi'
            //       ];
            //       if ($temp == 0) { // cek jika data belum pernah dipush
            //         array_push($array, $data);
            //         $temp = 1;
            //       }
            //       break;
            //     }
                
            //   }       
            // }
                   
            $i++;
          }
          $index++;
        }        

        return $array;
    }

    private function setShiftKondekturNext($date){
        $kondektur = $GLOBALS['kondektur'];
        $shift = $GLOBALS['shift']['kondektur'];
        $countShift = count($shift); 
        $countKondektur = count($kondektur);
        
        $array  = array();
        $index  = 1;
        $temp   = 0;
        foreach ($kondektur as $key) {
          $idKondektur = $key['id_pegawai'];          
          $arr  = array_column($kondektur, 'id_pegawai'); // mangambil column id_pegawai pada array kondektur
          $arr2 = array_column($shift, 'id_pegawai'); // mangambil column id_pegawai pada array shift
          $res  = array_diff($arr, $arr2); // mencari perbedaan dari dua column(id_pegawai)

          $i=1;
          foreach ($shift as $key) {
            $check = in_array($idKondektur, $key);
            if($check){ // Check apakah sopir sudah dalam array shift
              // mengecek apakah pegawai memliki izin pada tanggal tsb              
              if(!$this->checkIzin($idKondektur, $date)){ // pegawai tidak memiliki izin
                if ($key['shift'] == 'pagi') { // cek apakah shift pegawai pagi ?
                  $data = [
                    'date' => $date,
                    'id_pegawai' => $key['id_pegawai'],
                    'shift' => 'malam'
                  ];
                  array_push($array, $data);
                  break;
                }
                else{ // cek apakah shift pegawai malam ?
                  $data = [
                    'date' => $date,
                    'id_pegawai' => $key['id_pegawai'],
                    'shift' => 'pagi'
                  ];
                  array_push($array, $data);     
                  break;
                }
              }
            }
            
            // looping dari total diff column id_pegawai
            // foreach($res as $item) {
              
            //   if($idKondektur == $item){ // cek jika id sopir == id sopir yang ada pada array diff
            //     $idKondektur;
            //     if($key['id_pegawai'] == $item){
                  
            //       if($key['shift'] == 'pagi'){ // cek last sopir shift = pagi
            //         $data = [
            //           'date' => $date,
            //           'id_pegawai' => $idKondektur,
            //           'shift' => 'malam'
            //         ];
            //         if ($temp == 0) { // cek jika data belum pernah dipush
            //           array_push($array, $data);
            //           $temp = 1;
            //         }
            //         break;
            //       }
            //       elseif($key['shift'] == 'malam') { // cek last sopir shift = malam
            //         $data = [
            //           'date' => $date,
            //           'id_pegawai' => $idKondektur,
            //           'shift' => 'malam'
            //         ];
            //         if ($temp == 0) { // cek jika data belum pernah dipush
            //           array_push($array, $data);
            //           $temp = 1;
            //         }
            //         break;
            //       }
            //     }else{
            //       $data = [
            //         'date' => $date,
            //         'id_pegawai' => $idKondektur,
            //         'shift' => 'pagi'
            //       ];
            //       if ($temp == 0) { // cek jika data belum pernah dipush
            //         array_push($array, $data);
            //         $temp = 1;
            //       }
            //       break;
            //     }
                
            //   }       
            // }
                   
            $i++;
          }
          $index++;
        }        

        return $array;
    }

    private function getShiftSopirById($id, $date){
        $shift = $GLOBALS['shift'];
        $array = array();
        
        foreach ($shift as $key) {
          if($key['id_pegawai'] == $id){
            if ($key['date'] == $date) {     
              $data = [
                'date' => $date,
                'id_pegawai' => $key['id_pegawai'],
                'shift' => $key['shift'],
              ];
              array_push($array, $data);
            }
          }
        }

        return $array;
    }

    private function checkIzin($idPegawai, $date){
        $izin = $GLOBALS['izin'];

        foreach ($izin as $key) {
          if ( ($key['id_pegawai'] == $idPegawai) && ($key['tgl_izin'] == $date) ) {
            return true;
          }
        }
    }

    private function setSopirBusPagi($shifts, $date){
        $busPagi = $GLOBALS['bus_pagi'];
        $shift = $this->getShift('sopir', 'pagi', $date);
        $shiftMalam = $this->getShift('sopir', 'malam', $date);
        $countShift = count($this->getShift('sopir', 'pagi', $date)); 

        $retVal = (count($busPagi) < $countShift) ? array_pop($shift) : $shift ;
        array_push($shiftMalam, $retVal);
        $count = count($shift);

        $array = array();
        $index = 1;
        foreach ($busPagi as $bus) {
          if ($index > $count ) {
            $data = [
              'tanggal' => $date,
              'id_bus' => $bus['id_bus'],
              'id_sopir' => 0,
            ];
            array_push($array, $data);
          }
          else {
            foreach ($shift as $key) {
              $data = [
                'tanggal' => $date,
                'id_bus' => $bus['id_bus'],
                'id_sopir' => $key['id_pegawai'],
              ];
              array_push($array, $data);
              $arr = array_shift($shift);
              break;
              
            }
          }
          
          $index++;
        }

        return $array;
    }

    private function setSopirBusMalam($shifts, $date){
        $busMalam = $GLOBALS['bus_malam'];
        $shift = $this->getShift('sopir', 'malam', $date);
        $shiftPagi = $this->getShift('sopir', 'pagi', $date);
        $countShift = count($this->getShift('sopir', 'malam', $date)); 

        $retVal = (count($busMalam) > $countShift) ? array_pop($shiftPagi) : $shift ;
        array_push($shift, $retVal);
        $count = count($shift);

        $array = array();
        $index = 0;
        foreach ($busMalam as $bus) {
          if ($index > $count ) {
            $data = [
              'tanggal' => $date,
              'id_bus' => $bus['id_bus'],
              'id_sopir' => 0,
            ];
            array_push($array, $data);
          }
          else {
            foreach ($shift as $key) {
              $data = [
                'tanggal' => $date,
                'id_bus' => $bus['id_bus'],
                'id_sopir' => $key['id_pegawai'],
              ];
              array_push($array, $data);
              $arr = array_shift($shift);
              break;
              
            }
          }
          
          $index++;
        }

        return $array;
    }

    private function setKondekturBusPagi($shifts, $dataSopirBus, $date){
        $busPagi = $GLOBALS['bus_pagi'];
        $shift = $this->getShift('kondektur', 'pagi', $date);
        $shiftMalam = $this->getShift('kondektur', 'malam', $date);
        $countShift = count($this->getShift('kondektur', 'pagi', $date)); 
        $retVal = (count($busPagi) < $countShift) ? array_pop($shift) : $shift ;
        array_push($shiftMalam, $retVal);
        $count = count($shift);

        $array = array();
        $index = 0;
        foreach ($busPagi as $bus) {
          if ($index > $count) {
            
            $dataSopirBus[$index]['id_kondektur'] = 0;
            // $data = [
            //   'tanggal' => $date,
            //   'id_bus' => $bus['id_bus'],
            //   'id_kondektur' => 0,
            // ];
            // array_push($array, $data);
          }
          else {
            foreach ($shift as $key) {
              // $data = [
              //   'tanggal' => $date,
              //   'id_bus' => $bus['id_bus'],
              //   'id_kondektur' => $key['id_pegawai'],
              // ];
              // array_push($array, $data);
              $dataSopirBus[$index]['id_kondektur'] = $key['id_pegawai'];
              $arr = array_shift($shift);
              break;
              
            }
          }
          
          $index++;
        }

        return $dataSopirBus;
    }

    private function setKondekturBusMalam($shifts, $dataSopirBus, $date){
        $busMalam = $GLOBALS['bus_malam'];
        $shift = $this->getShift('kondektur', 'malam', $date);
        $shiftPagi = $this->getShift('kondektur', 'pagi', $date);
        $countShift = count($this->getShift('kondektur', 'malam', $date)); 

        $retVal = (count($busMalam) > $countShift) ? array_pop($shiftPagi) : $shift ;
        array_push($shift, $retVal);
        $count = count($shift);

        $array = array();
        $index = 0;
        foreach ($busMalam as $bus) {
          if ($index > $count) {
            
            // $data = [
            //   'tanggal' => $date,
            //   'id_bus' => $bus['id_bus'],
            //   'id_kondektur' => 0,
            // ];
            // array_push($array, $data);
            $dataSopirBus[$index]['id_kondektur'] = $key['id_pegawai'];
          }
          else {
            foreach ($shift as $key) {
              // $data = [
              //   'tanggal' => $date,
              //   'id_bus' => $bus['id_bus'],
              //   'id_kondektur' => $key['id_pegawai'],
              // ];
              // array_push($array, $data);
              $dataSopirBus[$index]['id_kondektur'] = $key['id_pegawai'];
              $arr = array_shift($shift);
              break;
              
            }
          }
          
          $index++;
        }

        return $dataSopirBus;
    }

    private function getShift($pegawai,$shift,$date){
        // if ($shift == null) {
          $shifts = $GLOBALS['shift'][$pegawai];
        // }
        // else{
        //   $shifts = $GLOBALS['shift'][$pegawai][$shift];
        // }

        $arrShift = array();
        foreach ($shifts as $key) {

          if($key['date'] == $date){
            if($key['shift'] == $shift){
              $data = [
                'date' => $date,
                'id_pegawai' => $key['id_pegawai'],
                'shift' => $shift,
              ];
              array_push($arrShift, $data);
            }
          }

        }

        return $arrShift;
    }

    private function saveToDatabase($array){

      foreach ($array as $item) {
        foreach ($item['bus'] as $key => $value) {
          if ($key == 'pagi') {
            foreach ($value as $data) {
              $jadwalBus = new Jadwalbus();
              $jadwalBus->tanggal = $data['tanggal'];    
              $jadwalBus->id_bus = $data['id_bus'];
              $jadwalBus->id_sopir = $data['id_sopir'];
              $jadwalBus->id_kondektur = $data['id_kondektur'];
              $jadwalBus->save();
            }
          }
          else{
            foreach ($value as $data) {
              $jadwalBus = new Jadwalbus();
              $jadwalBus->tanggal = $data['tanggal'];    
              $jadwalBus->id_bus = $data['id_bus'];
              $jadwalBus->id_sopir = $data['id_sopir'];
              $jadwalBus->id_kondektur = $data['id_kondektur'];
              $jadwalBus->save();
            }
          }
        }
      }
    }
  
    private function checkLiburSopir()
    {
      $sopir = $GLOBALS['sopir'];
      $countSopir = $GLOBALS['total_sopir'];
      $array = array();

      $arr  = array_column($sopir, 'id_pegawai'); // mangambil column id_pegawai pada array sopir
      $arr2 = array_column($countSopir, 'id_sopir'); // mangambil column id_pegawai pada array shift
      $res  = array_diff($arr, $arr2);
      
      $arrLibur = array();
      foreach ($sopir as $key => $value) {
        foreach ($countSopir as $key2 => $value2) {
          if ($value['id_pegawai'] == $value2['id_sopir']) {
            if ($value2['total'] == 0) {
              // array_pop($countSopir);
              array_push($arrLibur, $value2['id_sopir']);
              break;
            }
            else{
              break;
            }
          }
        }
      }

      $sisa  = array_diff($arr2, $arrLibur);

      for ($i=0; $i < count($arrLibur); $i++) { 
        foreach ($res as $key => $value) {
          $temp[] = array_shift($res);
          break;
        }
        $result = array_push($sisa, $temp[$i]);
      }

      foreach ($sisa as $item) {
        foreach ($sopir as $key => $value) {
          if ( $value['id_pegawai'] == $item ) {
            $data = [
              'id_pegawai' => $item
            ];
            array_push($array, $data);
            break;
          }
        }
      }

      // $arr3 = array_column($array, 'id_pegawai');
      // $diff  = array_diff($arr3, $sisa);
      // echo "<br>";
      
      $index = 0;
      foreach ($countSopir as $key => $value) {
        if (in_array($value['id_sopir'], $arrLibur)) {
          foreach ($temp as $val) {
            $countSopir[$index]['id_sopir'] = $val;
            array_shift($temp);
            break;
          }
        }
        $index++;
      }

      foreach ($res as $key => $value) {
        $data = [
          'id_pegawai' => $value
        ];
        array_push($array, $data);
      }

      $GLOBALS['total_sopir'] = $countSopir;
      $GLOBALS['sopir'] = $array; 

      return $arrLibur;
    }

    /* END GENERATE WITH ARRAY */
    
}
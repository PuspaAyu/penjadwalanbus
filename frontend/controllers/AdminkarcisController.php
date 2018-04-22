<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Guru;
use frontend\models\Jenjang;
use frontend\models\Kelas;
use frontend\models\Hari;
use frontend\models\Jadwal;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
/**
 * GuruController implements the CRUD actions for Guru model.
 */
class AdminkarcisController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    // 'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Guru models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'layout_admin3';

        return $this->render('index');
    }

    public function actionGenerate() //generate jadwal
    {
        $this->layout = "layout_admin3";

        if (Yii::$app->request->post()) {
            $tahunAjar = Yii::$app->request->post()['tahunAjar'];
            $jum = Yii::$app->db->createCommand('SELECT COUNT(id) FROM jadwal WHERE tahun_ajar=\''.$tahunAjar.'\'')->queryScalar();
            // echo $jum; 
            if($jum ==0){
                $gurus = getGuru();
                $jenjangs = getJenjangs();
                $mapels = getMapels();

                $GLOBALS['log'] = false;
                $GLOBALS['gurus'] = $gurus; //ambil data guru sama durasi ajar dikelas 789
                $GLOBALS['jenjangs'] = $jenjangs; //ambil data perjenjang, tiap jenjang diambil per kelasnya 7A-H, 8A-H, 9A-H. 7A ambil senin - sabtu. senin jam ke1-ke8
                $GLOBALS['mapels'] = $mapels; //ambil mapel
                $GLOBALS['indexes'] = getRandomIndexKelas($GLOBALS['jenjangs'][0]['kelas']);
                $GLOBALS['tahun_ajar']=$tahunAjar;
                // print_r($mapels);
                initPenjas(); //inisialisasi penjas
                initMapel(); //nybar mapel yg lain
                saveToDB();
                return $this->redirect(['show-jadwal','tahunAjar'=>$tahunAjar]);
                // echo "$tahunAjar";

            }else{
                // echo Alert::widget([
                //     'options' => [
                //         'class' => 'alert-info',
                //     ],
                //     'body' => 'Say hello...',
                // ]);
                echo "string";
                // echo Yii::$app->session->setFlash('success', "Your message to display");
                return $this->redirect('generate');
            }
        }else
        return $this->render('generate');
    }

    public function actionShowJadwal($tahunAjar)
    {
        // echo $tahunAjar;
        $this->layout = "layout_admin";
        $dataProviderJenjang = new ActiveDataProvider([
            'query' => Jenjang::find(),
        ]);

        $dataKelas = new ActiveDataProvider([
            'query' => Kelas::find(),
        ]);

        $dataHari = new ActiveDataProvider([
            'query' => Hari::find(),
        ]);

        $tahun_ajar = Yii::$app->db->createCommand('SELECT DISTINCT tahun_ajar FROM jadwal')->queryAll();
        if (Yii::$app->request->post()) {
            $tahunAjar = Yii::$app->request->post()['filterTahun'];
            return $this->render('list_jadwal',[
                'dataProviderJenjang'=>$dataProviderJenjang,
                'dataKelas'=>$dataKelas,
                'dataHari'=>$dataHari,
                'tahun_ajar'=>$tahun_ajar,
                'tahunAjar'=>$tahunAjar
            ]);
            // echo "string";
        }else{
            // print_r($tahun_ajar);
            return $this->render('list_jadwal',[
                'dataProviderJenjang'=>$dataProviderJenjang,
                'dataKelas'=>$dataKelas,
                'dataHari'=>$dataHari,
                'tahun_ajar'=>$tahun_ajar,
                'tahunAjar'=>$tahunAjar
            ]);
        }
    }

    public function actionViewJadwal()
    {
        $this->layout = "layout_admin";

        if (isset(Yii::$app->request->post()['kelas'])) {
            $kelas = Yii::$app->request->post()['kelas'];
            $dataProviderJenjang = new ActiveDataProvider([
            'query' => Jenjang::find()->where(['idjenjang'=>$kelas]),
            ]);

            $dataKelas = new ActiveDataProvider([
                'query' => Kelas::find(),
            ]);

            $dataHari = new ActiveDataProvider([
                'query' => Hari::find(),
            ]);

            $tahunAjar='2017-2018';
            $tahun_ajar = Yii::$app->db->createCommand('SELECT DISTINCT tahun_ajar FROM jadwal')->queryAll();
            return $this->render('list_jadwal_kelas',[
                'dataProviderJenjang'=>$dataProviderJenjang,
                'dataKelas'=>$dataKelas,
                'dataHari'=>$dataHari,
                'tahun_ajar'=>$tahun_ajar,
                'tahunAjar'=>$tahunAjar
            ]);
            // echo "string";
        }
    }

    public function actionFilterJadwalKelas()
    {
        $this->layout = "layout_admin";

        if (isset(Yii::$app->request->post()['filterTahun'])) {
            $kelas = Yii::$app->request->post()['kelas'];
            $dataProviderJenjang = new ActiveDataProvider([
            'query' => Jenjang::find()->where(['idjenjang'=>$kelas]),
            ]);

            $dataKelas = new ActiveDataProvider([
                'query' => Kelas::find(),
            ]);

            $dataHari = new ActiveDataProvider([
                'query' => Hari::find(),
            ]);

            $tahunAjar=Yii::$app->request->post()['filterTahun'];
            // echo $tahunAjar;
            $tahun_ajar = Yii::$app->db->createCommand('SELECT DISTINCT tahun_ajar FROM jadwal')->queryAll();
            return $this->render('list_jadwal_kelas',[
                'dataProviderJenjang'=>$dataProviderJenjang,
                'dataKelas'=>$dataKelas,
                'dataHari'=>$dataHari,
                'tahun_ajar'=>$tahun_ajar,
                'tahunAjar'=>$tahunAjar
            ]);
        }
    }

    public function actionReport() {
        $data = Yii::$app->request->get();
    // get your HTML raw content without any layouts or scripts
    // $content = $this->renderPartial('_reportView');
        $data['jenjang'] = new ActiveDataProvider([
            'query' => Jenjang::find(),
        ]);

        $data['Kelas'] = new ActiveDataProvider([
            'query' => Kelas::find(),
        ]);

        $data['Hari'] = new ActiveDataProvider([
            'query' => Hari::find(),
        ]);
        // print_r($data);
    // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // your html content input
            'content' => $this->renderPartial('_reportView',array('data'=>$data)),  
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            // 'cssInline' => '.kv-heading-1{font-size:18px}',
            'destination' => Pdf::DEST_BROWSER, 
            'format' => Pdf::FORMAT_A4,  
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => 'Jadwal '.$data['tahunAjar']],
            // set mPDF properties on the fly
            // call mPDF methods on the fly
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            'methods' => [ 
                'SetHeader'=>['Jadwal '.$data['tahunAjar']],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        // // return the pdf output as per the destination setting
        return $pdf->render(); 
    }
}

// ========================== Inisialisasi ============================
function getGuru(){
    $gurus = Array();
    $query = "SELECT * FROM `guru` WHERE 1";
    $guruss = Yii::$app->db->createCommand($query)->queryAll();
    foreach ($guruss as $key) {
        $guru['id'] = intval($key['idguru']);
        $guru['nama'] = $key['nama_guru'];
        $guru['durasi_ajar'] = getDurasiAjar($key['idguru']);
        array_push($gurus, $guru);
    }

    return $gurus;
}

function getDurasiAjar($idGuru){
    $durasiAjar = Array();
    $query = "SELECT * FROM `durasiajar` WHERE `id_guru`=".$idGuru;
    $result =Yii::$app->db->createCommand($query)->queryAll();

    foreach ($result as $key) {
        $perJenjang['id_jenjang'] = intval($key['id_jenjang']);
        $perJenjang['durasi'] = intval($key['durasi']);
        array_push($durasiAjar, $perJenjang);
    }
    return $durasiAjar;
}

function getJenjangs(){
    $jenjangs = Array();
    $query = "SELECT * FROM `jenjang` WHERE 1";
    $result = Yii::$app->db->createCommand($query)->queryAll();

    foreach ($result as $key) {
        $jenjang = Array();
        $jenjang['id'] = intval($key['idjenjang']);
        $jenjang['nama'] = $key['nama_jenjang'];
        $jenjang['kelas'] = getKelas();

        array_push($jenjangs, $jenjang);
    }
    // while($row = mysqli_fetch_array($result)){
    //    
    // }

    return $jenjangs;
}

function getKelas(){
    $classes = Array();
    $query = "SELECT * FROM `kelas` WHERE 1";
    $result = Yii::$app->db->createCommand($query)->queryAll();

    foreach ($result as $key) {
        $class = Array();
        $class['id'] = intval($key['idkelas']);
        $class['nama'] = $key['nama_kelas'];
        $class['hari'] = getJadwal();

        array_push($classes, $class);
    }
    // while($row = mysqli_fetch_array($result)){
    //    
    // }

    return $classes;
}

function getJadwal(){
    $jadwals = Array();
    $query = "SELECT * FROM `hari` WHERE 1";
    $result = Yii::$app->db->createCommand($query)->queryAll();

    foreach ($result as $key) {
        $jadwal = Array();
        $jadwal['nama'] = $key['nama_hari'];
        $jadwal['max_durasi'] = intval($key['durasi_hari']);
        $jadwal['mapel'] = setSlot($jadwal['max_durasi']);

        if($key['nama_hari'] == "Minggu") break;
        array_push($jadwals, $jadwal); 
    }

    return $jadwals;
}

function setSlot($durasi){
    $slots = Array();

    for ($i=0; $i < $durasi; $i++) { 
        $slot['id_mapel'] = null;
        $slot['id_guru'] = null;

        array_push($slots, $slot);
    }

    return $slots;
}

function getMapels(){
    $mapels = Array();
    $query = "SELECT * FROM `mapelsatuan` ORDER BY RAND()";
    $result = Yii::$app->db->createCommand($query)->queryAll();

    foreach ($result as $key) {
        $mapel = Array();
        $mapel['id'] = intval($key['idsat']);
        $mapel['nama'] = $key['nama_satuan'];
        $mapel['durasi'] = intval($key['durasi_satuan']);

        array_push($mapels, $mapel);
    }
    // while($row = mysqli_fetch_array($result)){
    //     
    // }

    return $mapels;
}

// ===============================END================================
// ===============================Penjas================================

function initPenjas(){
    $query = "SELECT * FROM `mapelguru` WHERE `id_msat`=14"; //ambil index mapel penjas praktek, dg id 14. nemu 2 index guru
    $result = Yii::$app->db->createCommand($query)->queryAll();

    // print_r($result);
    foreach ($result as $key) {
        $indexMapel = getIndexMapel(intval($key['id_msat']));
        $indexJenjang = getIndexJenjang(intval($key['id_jenjang']));
        $indexGuru = getIndexGuru(intval($key['id_guru']));

        //lempar data ke set penjas
        setPenjas($indexMapel, $indexGuru, $indexJenjang);   
    }
    //looping 2x, brdsarkan index guru yg ketemu tadi
    // while($row = mysqli_fetch_array($result)){
    //     //ambil id mapel satuan, jenjang, sama guru
    //     $indexMapel = getIndexMapel(intval($row['id_msat']));
    //     $indexJenjang = getIndexJenjang(intval($row['id_jenjang']));
    //     $indexGuru = getIndexGuru(intval($row['id_guru']));

    //     //lempar data ke set penjas
    //     setPenjas($indexMapel, $indexGuru, $indexJenjang);   
    // }
}

function setPenjas($indexMapel, $indexGuru, $indexJenjang){
    $classes = $GLOBALS['jenjangs'][$indexJenjang]['kelas'];
    $classesSize = sizeof($classes);
    $randomIndex = $GLOBALS['indexes'];

    for ($i=0; $i < $classesSize; $i++) { //looping sejumlah banyak kelas. A-H
        $isSet = false;
        $indexHari = 0;
        $kelas = null;
        $randomIndexKelas = rand(0, sizeof($classes) - 1);

        //ambil kelas scr random. 
        while($kelas == null){
            $randomIndexKelas = rand(0, sizeof($classes) - 1);

            if($classes[$randomIndexKelas] != null){
                $kelas = $classes[$randomIndexKelas];
            }
        }

        //looping hari senin - sabtu
        foreach ($kelas['hari'] as $hari) {
            $isAvailable = false;
            $mapels = $hari['mapel'];

            if($isSet) continue;
            
            //looping jam
            for ($j=0; $j < 4; $j= $j+2) {
                //apakah mapel penjas ada di kelas tsb di hari dan jam itu
                if($mapels[$j]['id_mapel'] == null){
                    if(!cekJadwalKelas($kelas, $indexMapel)) continue;
                    
                    //guru itu ngajar di hari dan jam itu?
                    $isAvailable = cekJadwalGuru($indexGuru, $indexHari, $j);
                }

                if($isAvailable){ //masukkan data ke getindexkelas
                    $isSet = true;
                    $idGuru = $GLOBALS['gurus'][$indexGuru]['id'];
                    $idMapel = $GLOBALS['mapels'][$indexMapel]['id'];

                    $GLOBALS['gurus'][$indexGuru]['durasi_ajar'][$indexJenjang]['durasi'] = $GLOBALS['gurus'][$indexGuru]['durasi_ajar'][$indexJenjang]['durasi'] - 2;
                    $GLOBALS['jenjangs'][$indexJenjang]['kelas'][getIndexKelas($kelas['id'])]['hari'][$indexHari]['mapel'][$j]['id_mapel'] = $idMapel;
                    $GLOBALS['jenjangs'][$indexJenjang]['kelas'][getIndexKelas($kelas['id'])]['hari'][$indexHari]['mapel'][$j+1]['id_mapel'] = $idMapel;
                    $GLOBALS['jenjangs'][$indexJenjang]['kelas'][getIndexKelas($kelas['id'])]['hari'][$indexHari]['mapel'][$j]['id_guru'] = $idGuru;
                    $GLOBALS['jenjangs'][$indexJenjang]['kelas'][getIndexKelas($kelas['id'])]['hari'][$indexHari]['mapel'][$j+1]['id_guru'] = $idGuru;
                    $j = 4;
                }   
            }

            $indexHari++;
        }

        $classes[$randomIndexKelas] = null;
        $classes = swapIndex($classes);
    }
}

// ====================================================================================================
// ========================================= MAPEL LAIN ===============================================
// ====================================================================================================
function initMapel(){
    $count = 0;
    foreach ($GLOBALS['mapels'] as $mapel) { //ambil dr getmapel pake random
        if($mapel['id'] == 14) continue;
        // if($count > 13) break;
        
        //ambil guru yng ngajar mapel siapa aja
        $query = "SELECT * FROM `mapelguru` WHERE `id_msat`=".$mapel['id'];
        $result = Yii::$app->db->createCommand($query)->queryAll();

        foreach ($result as $key) {
            $indexMapel = getIndexMapel(intval($key['id_msat']));
            $indexJenjang = getIndexJenjang(intval($key['id_jenjang']));
            $indexGuru = getIndexGuru(intval($key['id_guru']));

            if($GLOBALS['log']) {
                echo "<hr/>";
                echo "Fetching data untuk guru ".$GLOBALS['gurus'][$indexGuru]['nama']
                    ." pada jenjang ".$GLOBALS['jenjangs'][$indexJenjang]['nama']
                    ." untuk mapel ".$GLOBALS['mapels'][$indexMapel]['nama']
                    ." dengan durasi ".$GLOBALS['mapels'][$indexMapel]['durasi']." jam mata pelajaran<br/>";
            }
            
            setMapel($indexMapel, $indexGuru, $indexJenjang); 
        }
        $count++;
    }
}

function setMapel($indexMapel, $indexGuru, $indexJenjang){
    $durasiMapel = $GLOBALS['mapels'][$indexMapel]['durasi']-1;
    $classes = $GLOBALS['jenjangs'][$indexJenjang]['kelas'];
    $classesSize = sizeof($classes);
    $randomIndex = $GLOBALS['indexes'];

    for ($i=0; $i < $classesSize; $i++) { 
        $randomIndexKelas = $randomIndex[$i];
        $kelas = null;
        $isSet = false;

        while($kelas == null){ //dapetin indeks kelas dg random
            $randomIndexKelas = rand(0, sizeof($classes) - 1);
            if($classes[$randomIndexKelas] != null) $kelas = $classes[$randomIndexKelas];
        }

        //looping sabtu - senin
        for ($indexHari=0; $indexHari < sizeof($kelas['hari']); $indexHari++) { 
            $hari = $kelas['hari'][$indexHari];
            $mapels = $hari['mapel'];
            $isAvailable = false;

            if($GLOBALS['gurus'][$indexGuru]['durasi_ajar'][$indexJenjang]['durasi'] <= 0) continue;

            if($isSet) continue;

            //looping per jam
            for ($indexJam=0; $indexJam <= $hari['max_durasi']-($durasiMapel); $indexJam++) {
                //cek overtime
                if(sizeof($mapels) <= ($indexJam+$durasiMapel)) continue;
                
                //cek keberadaan mapel pada tiap jam perhari
                if($mapels[$indexJam]['id_mapel'] != null) continue;

                //cek jam kosong sebelum mapel penjas
                if(!cekBeberapaJamKedepan($mapels, $indexJam, $durasiMapel)) continue;

                //mapel nya uda ada di kelas itu apa engga
                if(!cekJadwalKelas($kelas, $indexMapel)) continue;

                //cek overtime
                if(($indexJam+$durasiMapel) >= $hari['max_durasi']) continue;

                //cek guru
                $isAvailable = cekJadwalGuru($indexGuru, $indexHari, $indexJam);

                if($isAvailable){
                    $isSet = true;
                    $idGuru = $GLOBALS['gurus'][$indexGuru]['id'];
                    $idMapel = $GLOBALS['mapels'][$indexMapel]['id'];
                    $GLOBALS['gurus'][$indexGuru]['durasi_ajar'][$indexJenjang]['durasi'] = $GLOBALS['gurus'][$indexGuru]['durasi_ajar'][$indexJenjang]['durasi'] - ($durasiMapel+1);

                    for ($k=0; $k <= $durasiMapel; $k++) {
                        $GLOBALS['jenjangs'][$indexJenjang]['kelas'][getIndexKelas($kelas['id'])]['hari'][$indexHari]['mapel'][$indexJam+$k]['id_mapel'] = $idMapel;
                        $GLOBALS['jenjangs'][$indexJenjang]['kelas'][getIndexKelas($kelas['id'])]['hari'][$indexHari]['mapel'][$indexJam+$k]['id_guru'] = $idGuru;
                    }
                    $indexJam = $hari['max_durasi'];
                }
            }
            
            if($isAvailable) $indexHari = -1;
        }

        $classes[$randomIndexKelas] = null;
        $classes = swapIndex($classes);
    }
}
// ====================================================================================================
// ====================================================================================================
// ====================================================================================================
// ====================================================================================================
// ======================================== GLOBAL USAGE ==============================================
// ====================================================================================================
function getIndexJenjang($id){
    $index = 0;

    foreach ($GLOBALS['jenjangs'] as $jenjang) {
        if($jenjang["id"] == $id) return $index;

        $index++; 
    }

    return 0;
}

function getIndexGuru($id){
    $index = 0;

    foreach ($GLOBALS['gurus'] as $guru) {
        if($guru["id"] == $id) return $index;

        $index++; 
    }

    return 0;
}

function getIndexMapel($id){
    $index = 0;

    foreach ($GLOBALS['mapels'] as $mapel) {
        if($mapel["id"] == $id) return $index;

        $index++; 
    }

    return 0;
}

function getIndexKelas($id){
    $index = 0;

    foreach ($GLOBALS['jenjangs'][0]['kelas'] as $kelas) {
        if($kelas["id"] == $id) return $index;

        $index++; 
    }

    return 0;
}

function cekJadwalKelas($kelas, $indexMapel){
    $idMapel = $GLOBALS['mapels'][$indexMapel]['id'];
    
    foreach ($kelas['hari'] as $hari) {
        foreach ($hari['mapel'] as $mapel) {
            if($mapel['id_mapel'] != null && $mapel['id_mapel'] == $idMapel) {
                if($GLOBALS['log'])
                echo "Mapel ".$GLOBALS['mapels'][getIndexMapel($mapel['id_mapel'])]['nama']." sudah ada di hari ".$hari['nama'];

                return false;
            }
        }
    }

    return true;
}

function cekJadwalGuru($indexGuru, $indexHari, $indexJam){
    foreach ($GLOBALS['jenjangs'] as $jenjang) {
        foreach ($jenjang['kelas'] as $kelas) {
            $idGuru = $kelas['hari'][$indexHari]['mapel'][$indexJam]['id_guru']; 

            if($idGuru != null && $idGuru == $GLOBALS['gurus'][$indexGuru]['id']) {
                if($GLOBALS['log'])
                echo "Guru ".$GLOBALS['gurus'][getIndexGuru($idGuru)]['nama']." sudah ada jadwal di kelas "
                    .$jenjang['nama']."".$kelas['nama'];

                return false;
            }
        }
    }

    return true;
}

function cekBeberapaJamKedepan($mapels, $startTime, $durasi){
    if(sizeof($mapels) <= ($startTime + $durasi)) return false;

    for ($i=0; $i <= $durasi; $i++) { 
        if($mapels[$startTime + $i]['id_mapel'] != null) return false;
    }
    
    return true;
}

function swapIndex($arr){
    $temp = Array();
    $tempIndex = 0;
    for ($i=0; $i < sizeof($arr); $i++) { 
        if($arr[$i] != null){
            array_push($temp, $arr[$i]);
        }
    }

    return $temp;
}

function getRandomIndexKelas($arrKelas){
    $indexes = Array();
    $size = sizeof($arrKelas);

    for ($i=0; $i < $size; $i++) {
        $same = true;
        $randomNumber = rand(0, $size - 1);
        
        while($same){
            $same = false;
            $randomNumber = rand(0, $size - 1);

            for ($j=0; $j < sizeof($indexes); $j++) { 
                if($indexes[$j] == $randomNumber) $same = true;
            }
        }

        array_push($indexes, $randomNumber);
    }

    return $indexes;
}
// ====================== END ============================
// ================================================SHOW===========================================

function showData(){
    $jenjangs = $GLOBALS['jenjangs'];
    // $con = $GLOBALS['con'];
    $indexes = $GLOBALS['indexes'];

    // Variable i merepresentasi jenjang (Kelas 1 - 3)
    for ($i=0; $i < sizeof($jenjangs); $i++) {
        echo "Jenjang ".$jenjangs[$i]['nama']."<br/>";
        $classes = $jenjangs[$i]['kelas'];
        
        // Variable j merepresentasi nama kelas (A - H)
        for($j=0; $j < sizeof($classes); $j++){
            echo "<br/>Kelas : ".$classes[$j]['nama']."<br/><table><tr>";
            $days = $classes[$j]['hari'];

            // Variable k merepresentasi hari (Senin - Sabtu)
            for ($k=0; $k < sizeof($days); $k++) { 
                echo "<tr><td>".$days[$k]['nama']."</td>";
                $mapels = $days[$k]['mapel'];

                // Variable l merepresentasikan mata pelajaran pada hari tersebut (1-n)    
                for ($l=0; $l < sizeof($mapels); $l++) { 
                    $mapel = $mapels[$l];
                    $namaGuru = $GLOBALS['gurus'][getIndexGuru($mapel['id_guru'])]['nama'];
                    $namaMapel = $GLOBALS['mapels'][getIndexMapel($mapel['id_mapel'])]['nama'];

                    if($mapel['id_guru'] == null){
                        $namaGuru = "-";
                    }

                    if($mapel['id_mapel'] == null){
                        $namaMapel = "-";
                    }
                    
                    echo "<td width='150px'><center>".($l+1)."<br/>";
                    echo $namaMapel."<br/>".$namaGuru;
                    echo "</center></td>";

                }         

                echo "</tr>";
            }

            echo "</table>";
        }

        echo "<br/>";
    }
}

function saveToDB(){
    $index = Yii::$app->db->createCommand('SELECT id FROM jadwal ORDER BY id desc LIMIT 1')->queryScalar();;
    // $index = $index+1;
    // $query = "DELETE FROM `jadwal` WHERE 1";
    // $result = Yii::$app->db->createCommand($query)->execute();
    // echo $result;
    $count = 1;
    foreach ($GLOBALS['jenjangs'] as $jenjang) {
        $idJenjang = $jenjang['id'];
        foreach ($jenjang['kelas'] as $kelas) {
            $idKelas = $kelas['id'];
            foreach ($kelas['hari'] as $hari) {
                $namaHari = $hari['nama'];
                for($i=0; $i < sizeof($hari['mapel']); $i++){
                    $mapel = $hari['mapel'][$i];
                    $idMapel = $mapel['id_mapel'];
                    $idGuru = $mapel['id_guru'];

                    $query = "INSERT INTO `jadwal`( `idjenjang`, `idkelas`, `nama_hari`, `jam`, `idmapel`, `idguru`, `tahun_ajar`) VALUES (
                        '".$idJenjang."',
                        '".$idKelas."',
                        '".$namaHari."',
                        '".$i."',
                        '".$idMapel."',
                        '".$idGuru."',
                        '".$GLOBALS['tahun_ajar']."'
                    )";

                    $results = Yii::$app->db->createCommand($query)->execute();
                    $index++;
                    // echo "$results";
                    if ($results==1) {
                        $count++;
                    }
                }
            }
        }
    }
    echo $count;
}
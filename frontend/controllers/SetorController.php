<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Setor;
use frontend\models\SetorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Jadwalbus;
use frontend\models\Bus;
use frontend\models\Karcis;
use yii\helpers\ArrayHelper;
use frontend\models\KarcisSetor;

/**
 * SetorController implements the CRUD actions for Setor model.
 */
class SetorController extends Controller
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
     * Lists all Setor models.
     * @return mixed
     */

    public function actionIndex()
    {
        $this->layout = 'layout_admin2';
        $model = Setor::find()->all();
        $query = (new yii\db\Query())
                ->select(['setor.id_setor',
                        'setor.id_jadwal',
                        'setor.id_karcis',
                        'setor.pendapatan_kotor',
                        'setor.bersih_perjalanan',
                        'setor.total_bersih',
                        'setor.premi_sopir',
                        'setor.premi_kondektur',
                        'karcis_setor.pergi_awal',
                        'karcis_setor.pergi_akhir',
                        'karcis_setor.pulang_awal',
                        'karcis_setor.pulang_akhir'
                       ])
                ->from('setor')
                ->join('LEFT JOIN', 'jadwal_bus', 'jadwal_bus.id_jadwal = setor.id_jadwal')
                ->join('LEFT JOIN', 'karcis_setor', 'karcis_setor.id_karcis = setor.id_karcis')
                ->all();

            return $this->render('index',[
            'query'=>$query,
            'model'=>$model,
        ]);
    }

    /**
     * Displays a single Setor model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = 'layout_admin2';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Setor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'layout_admin2';
        $model = new Setor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_setor]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCreatesetor($tanggal){
        $yesterday = date('Y-m-d', strtotime($tanggal .' -1 day'));
        $this->layout = 'layout_admin2';
        $jadwal = Jadwalbus::find()->where(['tanggal'=>$tanggal])->all();

        // $seri = Karcis::find()->all();
        // $tpkarcis = ArrayHelper::map($seri, 'id_stok', 'seri');
        
        // echo $tipe_karcis[0]->tipe_karcis;
        // die();

        if ($tanggal) {
            // Ketika submit save button
            if (Yii::$app->request->post()) {
                $request = Yii::$app->request->post();
                $model = Setor::find()->where(['id_setor' => $request['id_setor']])->one();

                // $model->id_stok = $request['seri'];
                $model->tpr_sby = $request['Setor']['tpr_sby'];
                $model->tpr_ngawi = $request['Setor']['tpr_ngawi'];
                $model->tpr_caruban = $request['Setor']['tpr_caruban'];
                $model->tpr_solo = $request['Setor']['tpr_solo'];
                $model->tpr_semarang = $request['Setor']['tpr_semarang'];
                $model->tpr_kartosuro = $request['Setor']['tpr_kartosuro'];
                $model->tpr_salatiga = $request['Setor']['tpr_salatiga'];
                $model->mandor_sby = $request['Setor']['mandor_sby'];
                $model->mandor_ngawi = $request['Setor']['mandor_ngawi'];
                $model->mandor_caruban = $request['Setor']['mandor_caruban'];
                $model->mandor_solo = $request['Setor']['mandor_solo'];
                $model->mandor_semarang = $request['Setor']['mandor_semarang'];
                $model->mandor_kartosuro = $request['Setor']['mandor_kartosuro'];
                $model->mandor_salatiga = $request['Setor']['mandor_salatiga'];
                $model->rit_1 = $request['Setor']['rit_1'];
                $model->rit_2 = $request['Setor']['rit_2'];
                $model->bon_sopir = $request['Setor']['bon_sopir'];
                $model->bon_kondektur = $request['Setor']['bon_kondektur'];
                $model->solar_pergi = $request['Setor']['solar_pergi'];
                $model->nom_solar_pergi = $request['Setor']['nom_solar_pergi'];
                $model->solar_plg = $request['Setor']['solar_plg'];
                $model->nom_solar_plg = $request['Setor']['nom_solar_plg'];
                $model->um_sopir = $request['Setor']['um_sopir'];
                $model->um_kond = $request['Setor']['um_kond'];
                $model->cuci_bis = $request['Setor']['cuci_bis'];
                $model->tpr2 = $request['Setor']['tpr2'];
                $model->tol = $request['Setor']['tol'];
                $model->siaran = $request['Setor']['siaran'];
                $model->parkir = $request['Setor']['parkir'];
                $model->lain_lain = $request['Setor']['lain_lain'];
                $model->potong_minum = $request['Setor']['potong_minum'];
                $model->pendapatan_kotor = $request['Setor']['pendapatan_kotor'];
                $model->bersih_perjalanan = $request['Setor']['bersih_perjalanan'];
                $model->total_bersih = $request['Setor']['total_bersih'];
                $model->dipotong_premi = $request['Setor']['dipotong_premi'];
                $model->premi_sopir = $request['Setor']['premi_sopir'];
                $model->premi_kondektur = $request['Setor']['premi_kondektur'];

                $model->update();
            }


            $tempviewjadwal = array();
            foreach ($jadwal as $key) {

                $karcis_setor = KarcisSetor::find()->where(['id_jadwal'=> $key['id_jadwal']])->one();

                //insert to database
                $model = new Setor();
                $model->id_jadwal = $key['id_jadwal'];
                $model->id_karcis = $karcis_setor['id_karcis'];
                // $model->id_stok = 0;
                $model->tpr_sby = 0;
                $model->tpr_ngawi = 0;
                $model->tpr_caruban = 0;
                $model->tpr_solo = 0;
                $model->tpr_semarang = 0;
                $model->tpr_kartosuro = 0;
                $model->tpr_salatiga = 0;
                $model->mandor_sby = 0;
                $model->mandor_ngawi = 0;
                $model->mandor_caruban = 0;
                $model->mandor_solo = 0;
                $model->mandor_semarang = 0;
                $model->mandor_kartosuro = 0;
                $model->mandor_salatiga = 0;
                $model->rit_1 = 0;
                $model->rit_2 = 0;
                $model->bon_sopir = 0;
                $model->bon_kondektur = 0;
                $model->solar_pergi = 0;
                $model->nom_solar_pergi = 0;
                $model->solar_plg = 0;
                $model->nom_solar_plg = 0;
                $model->um_sopir = 0;
                $model->um_kond = 0;
                $model->cuci_bis = 0;
                $model->tpr2 = 0;
                $model->tol = 0;
                $model->siaran = 0;
                $model->parkir = 0;
                $model->lain_lain = 0;
                $model->potong_minum = 0;
                $model->pendapatan_kotor = 0;
                $model->bersih_perjalanan = 0;
                $model->total_bersih = 0;
                $model->dipotong_premi = 0;
                $model->premi_sopir = 0;
                $model->premi_kondektur = 0;
                


                $id_jadwal = Setor::find()->where(['id_jadwal' => $key['id_jadwal']])->one();
                // $id_karcis = Setor::find()->where(['id_karcis' => $key['id_karcis']])->one();

                if ($id_jadwal == null) {
                    $model->save();
                }
                

                $setor = Setor::find()->where(['id_jadwal'=>$key->id_jadwal])->one();
                $bus = Bus::find()->where(['id_bus'=>$key->id_bus])->one();
                $karcis = KarcisSetor::find()->where(['id_jadwal'=>$key->id_jadwal])->one();

                $query = (new \yii\db\Query())
                     ->select(['karcis_setor.pergi_akhir'])
                     ->from('karcis_setor')
                     ->join('LEFT JOIN', 'jadwal_bus', 'jadwal_bus.id_jadwal=karcis_setor.id_jadwal')
                     ->where(['jadwal_bus.tanggal'=>$yesterday, 'jadwal_bus.id_bus'=>$key->id_bus])
                     ->one();

                    array_push($tempviewjadwal, [
                        // 'jam'=>$bus->jam_operasional,
                        'tanggal'=>$tanggal,
                        'id_bus'=>$key->id_bus,
                        'no_polisi'=>$bus->no_polisi,
                        'id_karcis' => $bus->id_karcis, 
                        // 'id_jurusan'=>$bus->id_jurusan,
                        'id_sopir'=>$key->id_sopir, 
                        'id_kondektur'=>$key->id_kondektur,
                        'pergi_awal'=>$karcis->pergi_awal,
                        'pergi_akhir'=>$karcis->pergi_akhir,
                        'pulang_awal'=>$karcis->pulang_awal,
                        'pulang_akhir'=>$karcis->pulang_akhir,
                        // 'id_karcis'=> $karcis->id_karcis,
                        'id_setor'=>$setor->id_setor,
                        'tpr_sby' => $setor->tpr_sby,
                        'mandor_sby' => $setor->mandor_sby,
                        'tpr_caruban' => $setor->tpr_caruban,
                        'mandor_caruban' => $setor->mandor_caruban,
                        'tpr_ngawi' => $setor->tpr_ngawi,
                        'mandor_ngawi' => $setor->mandor_ngawi,
                        'tpr_solo' => $setor->tpr_solo,
                        'mandor_solo' => $setor->mandor_solo,
                        'tpr_kartosuro' => $setor->tpr_kartosuro,
                        'mandor_kartosuro' => $setor->mandor_kartosuro,
                        'tpr_salatiga' => $setor->tpr_salatiga,
                        'mandor_salatiga' => $setor->mandor_salatiga,
                        'tpr_semarang' => $setor->tpr_semarang,
                        'mandor_semarang' => $setor->mandor_semarang,
                        'rit_1' => $setor->rit_1,
                        'rit_2' => $setor->rit_2,
                        'bon_sopir' => $setor->bon_sopir,
                        'bon_kondektur' => $setor->bon_kondektur,
                        'solar_pergi' => $setor->solar_pergi,
                        'nom_solar_pergi' => $setor->nom_solar_pergi,
                        'solar_plg' => $setor->solar_plg,
                        'nom_solar_plg' => $setor->nom_solar_plg,
                        'um_sopir' => $setor->um_sopir,
                        'um_kond' => $setor->um_kond,
                        'cuci_bis' => $setor->cuci_bis,
                        'tpr2' => $setor->tpr2,
                        'tol' => $setor->tol,
                        'siaran' => $setor->siaran,
                        'parkir' => $setor->parkir,
                        'lain_lain' => $setor->lain_lain,
                        'potong_minum' => $setor->potong_minum,
                        'pendapatan_kotor' => $setor->pendapatan_kotor,
                        'bersih_perjalanan' => $setor->bersih_perjalanan,
                        'total_bersih' => $setor->total_bersih,
                        'dipotong_premi' => $setor->dipotong_premi,
                        'premi_sopir' => $setor->premi_sopir,
                        'premi_kondektur' =>$setor->premi_kondektur

                        // 'id_stok' => $karcis->id_stok,
                    ]);
            //     var_dump($tempviewjadwal);
            // die();
                    
            }


            return $this->render('createsetor', [
                'tempviewjadwal'=> $tempviewjadwal,
                // 'seri' => $tpkarcis,
                'model' => new Setor(),
            ]);
        } else {
            $model = new Setor();
            return $this->render('createsetor', [
                'model' => $model,
                'tanggal' => $tanggal,
            ]);
        }
    }


    /**
     * Updates an existing Setor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $tanggal, $bus)
    {
        $yesterday = date('Y-m-d', strtotime($tanggal .' -1 day'));
        // var_dump($tanggal);
        // die();
        $this->layout = 'layout_admin2';
        $model = $this->findModel($id);
        $data = (new \yii\db\Query())
                     ->select(['karcis_setor.pergi_akhir', 'karcis_setor.pulang_akhir'])
                     ->from('karcis_setor')
                     ->join('LEFT JOIN', 'setor', 'setor.id_karcis=karcis_setor.id_karcis')
                     ->join('LEFT JOIN', 'jadwal_bus', 'jadwal_bus.id_jadwal=karcis_setor.id_jadwal')
                     ->where(['jadwal_bus.tanggal'=>$yesterday, 'jadwal_bus.id_bus'=>$bus])
                     ->one();

                     $new_pergi_awal = $data['pergi_akhir'] + 1;
                     $new_pulang_awal = $data['pulang_akhir'] + 1;

                $datas = [
                    'pergi_awal'=>$new_pergi_awal,
                    'pulang_awal'=>$new_pulang_awal
                ];

            $tpr_sby = $model['tpr_sby'];
            $tpr_caruban = $model['tpr_caruban'];
            $tpr_ngawi = $model['tpr_ngawi'];
            $tpr_solo = $model['tpr_solo'];
            $tpr_kartosuro = $model['tpr_kartosuro'];
            $tpr_salatiga = $model['tpr_salatiga'];
            $tpr_semarang = $model['tpr_semarang'];
            $mandor_sby = $model['mandor_sby'];
            $mandor_caruban = $model['mandor_caruban'];
            $mandor_ngawi = $model['mandor_ngawi'];
            $mandor_solo = $model['mandor_solo'];
            $mandor_kartosuro = $model['mandor_kartosuro'];
            $mandor_salatiga = $model['mandor_salatiga'];
            $mandor_semarang = $model['mandor_semarang'];
            $rit_1 = $model['rit_1'];
            $rit_2 = $model['rit_2'];
            $bon_sopir = $model['bon_sopir'];
            $bon_kondektur = $model['bon_kondektur'];
            $solar_pergi = $model['solar_pergi'];
            $nom_solar_pergi = $model['nom_solar_pergi'];
            $solar_plg = $model['solar_plg'];
            $nom_solar_plg = $model['nom_solar_plg'];
            $um_sopir = $model['um_sopir'];
            $um_kond = $model['um_kond'];
            $cuci_bis = $model['cuci_bis'];
            $tpr = $model['tpr2'];
            $tol = $model['tol'];
            $siaran = $model['siaran'];
            $parkir = $model['parkir'];
            $lain_lain = $model['lain_lain'];
            $potong_minum = $model['potong_minum'];

            $total1 = $mandor_sby+$mandor_caruban+$mandor_ngawi+$mandor_solo+$mandor_kartosuro
                    +$mandor_semarang+$mandor_salatiga;


            $total2 = $nom_solar_pergi+$nom_solar_plg+$um_sopir+$um_kond+$cuci_bis+$tpr+$tol+$siaran
                        +$parkir+$lain_lain;

            $uang_tiket = $rit_1+$rit_2;

            $pendapatan_kotor = $uang_tiket - $potong_minum;

            $dipotong = $total1 + $total2;

            $bersih_perjalanan = $pendapatan_kotor - $dipotong;

            $premi_sopir = (12/100) * $pendapatan_kotor;
            $premi_sopir = (int)$premi_sopir;
            
            $premi_kondektur = (7/100) * $pendapatan_kotor;
            $premi_kondektur = (int)$premi_kondektur;

            $total_premi = $premi_sopir + $premi_kondektur;

            $total_premi = (int)$total_premi;

            $total_bon = $bon_sopir + $bon_kondektur;

            $cuci_garasi = 37500;
            
            if($bersih_perjalanan == 0){
                $total_bersih = 0;
            }else{
                $total_bersih = $bersih_perjalanan - $total_bon + $cuci_garasi;
            }



        if ($model->load(Yii::$app->request->post())) {
            $modelKarcis = Yii::$app->request->post()['KarcisSetor'];

            $setorKarcis = KarcisSetor::find()->where(['id_karcis' => $model->id_karcis])->one();
            $setorKarcis['pergi_awal'] = $modelKarcis['pergi_awal'];            
            $setorKarcis['pergi_akhir'] = $modelKarcis['pergi_akhir'];            
            $setorKarcis['pulang_awal'] = $modelKarcis['pulang_awal'];            
            $setorKarcis['pulang_akhir'] = $modelKarcis['pulang_akhir'];
            $setorKarcis->save();

            $model['pendapatan_kotor']  = $pendapatan_kotor;
            $model['bersih_perjalanan'] = $bersih_perjalanan;
            $model['dipotong_premi']    = $total_premi;
            $model['total_bersih']      = $total_bersih;
            $model['premi_sopir']       = $premi_sopir;
            $model['premi_kondektur']   = $premi_kondektur;

            $model->save();
            return $this->redirect(['view', 'id' => $model->id_setor]);
        }

        return $this->render('update', [
            'model' => $model,
            'data' => $datas,
            // 'modelKarcis' => $modelKarcis,
        ]);
    }



    /**
     * Deletes an existing Setor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Setor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Setor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Setor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

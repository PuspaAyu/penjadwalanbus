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
use frontend\models\Stok;
use yii\helpers\ArrayHelper;
use frontend\models\Karcis;

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

    public function setor(){
      $query = (new yii\db\Query())
                ->select(['setor.solar_pergi',
                        'setor.nom_solar_pergi',
                        'setor.solar_plg',
                        'setor.nom_solar_plg',
                        'setor.um_sopir',
                        'setor.um_kond',
                        'setor.cuci_bis',
                        'setor.tpr',
                        'setor.tol',
                        'setor.siaran',
                        'setor.lain_lain',
                        'setor.potong_minum'])
                ->from('setor')
                ->all();
                
            return $query;
    }

    public function actionIndex()
    {

        $this->layout = 'layout_admin2';
        $model = Setor::find()->all();
        $query = (new yii\db\Query())
                ->select(['setor.id_setor',
                        'setor.id_jadwal',
                        'setor.solar_pergi',
                        'setor.nom_solar_pergi',
                        'setor.solar_plg',
                        'setor.nom_solar_plg',
                        'setor.um_sopir',
                        'setor.um_kond',
                        'setor.cuci_bis',
                        'setor.tpr',
                        'setor.tol',
                        'setor.siaran',
                        'setor.lain_lain',
                        'setor.potong_minum',
                        'setor.pendapatan_kotor',
                        'setor.bersih_perjalanan',
                        'setor.total_bersih'])
                ->from('setor')
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

    public function actionPenjumlahan()
    {
        $data['nilai_setor'] = $this->setor();
        $setor = $data['nilai_setor'];
        $i=0;

        // for ($i=0; $i < count($solar); $i++) { 
            if($setor[$i]['solar_pergi'])
                $hasil_solar = $setor[$i]['solar_pergi']+$setor[$i]['solar_plg'];
                $hasil_nom_solar = $setor[$i]['nom_solar_pergi']+$setor[$i]['nom_solar_plg'];
                $hasil_lain = $setor[$i]['um_sopir']+$setor[$i]['um_kond']+$setor[$i]['cuci_bis']+$setor[$i]['tpr']
                                +$setor[$i]['tol']+$setor[$i]['siaran']+$setor[$i]['lain_lain'];
                $total = $hasil_nom_solar+$hasil_lain;
            var_dump($total);
            die();
        
    }

    // public function actionCreatesetor($tanggal){
    //     $this->layout = 'layout_admin2';
    //     $jadwal = Jadwalbus::find()->where(['tanggal'=>$tanggal])->all();

    //     $tipe_karcis = Stok::find()->all();
    //     $tpkarcis = ArrayHelper::map($tipe_karcis, 'id_stok', 'tipe_karcis');

    //     // echo $tipe_karcis[0]->tipe_karcis;
    //     // die();

    //     // if ($tanggal) {

    //     //     // Ketika submit save button
    //     //     if (Yii::$app->request->post()) {
    //     //         $request = Yii::$app->request->post();
    //     //         $model = Karcis::find()->where(['id_karcis' => $request['id_karcis']])->one();

    //     //         $model->id_stok = $request['tipe_karcis'];
    //     //         $model->pergi_awal = $request['Karcis']['pergi_awal'];
    //     //         $model->pergi_akhir = $request['Karcis']['pergi_akhir'];
    //     //         $model->pulang_awal = $request['Karcis']['pulang_awal'];
    //     //         $model->pulang_akhir = $request['Karcis']['pulang_akhir'];
    //     //         $model->update();
    //     //     }


    //         $tempviewjadwal = array();
    //         foreach ($jadwal as $key) {

    //             //insert to database
    //             $model = new Setor();

    //             $model->id_jadwal = $key['id_jadwal'];
    //             $model->solar_pergi = 0;
    //             $model->nom_solar_pergi = 0;
    //             $model->solar_plg = 0;
    //             $model->nom_solar_plg = 0;
    //             $model->um_sopir = 0;
    //             $model->um_kond = 0;
    //             $model->cuci_bis = 0;
    //             $model->tpr = 0;
    //             $model->tol = 0;
    //             $model->siaran = 0;
    //             $model->lain_lain = 0;
    //             $model->potong_minum = 0;
    //             $model->pendapatan_kotor = 0;
    //             $model->bersih_perjalanan = 0;
    //             $model->total_bersih = 0;


    //             $id_jadwal = Setor::find()->where(['id_jadwal' => $key['id_jadwal']])->one();

    //             if ($id_jadwal == null) {
    //                 $model->save();
    //             }

    //             $setor = Setor::find()->where(['id_jadwal'=>$key->id_jadwal])->one();

    //             $karcis = Karcis::find()->where(['id_jadwal'=>$key->id_jadwal])->one();
    //             $bus = Bus::find()->where(['id_bus'=>$key->id_bus])->one();
                
    //             array_push($tempviewjadwal, [
    //                 'jam'=>$bus->jam_operasional,
    //                 'id_bus'=>$bus->no_polisi, 
    //                 'id_jurusan'=>$key->id_jurusan,
    //                 'id_sopir'=>$key->id_sopir, 
    //                 'id_kondektur'=>$key->id_kondektur,
    //                 'id_karcis'=> $karcis->id_karcis,
    //                 'pulang_awal'=> $karcis->pulang_awal,
    //                 'pergi_awal'=> $karcis->pergi_awal,
    //                 'pergi_akhir'=> $karcis->pergi_akhir,
    //                 'pulang_akhir'=> $karcis->pulang_akhir,
    //                 'id_stok' => $karcis->id_stok,
    //                 'id_setor'=> $setor->id_setor,
    //             ]);
    //         }

    //         return $this->render('createsetor', [
    //             'tempviewjadwal'=> $tempviewjadwal,
    //             'tipe_karcis' => $tpkarcis,
    //             'model' => new Karcis(),
    //         ]);
    //     // } else {
    //     //     $model = new Karcis();
    //     //     return $this->render('createsetor', [
    //     //         'model' => $model,
    //     //         'tanggal' => $tanggal,
    //     //     ]);
    //     // }
    // }

    /**
     * Updates an existing Setor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = 'layout_admin2';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_setor]);
        }

        return $this->render('update', [
            'model' => $model,
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

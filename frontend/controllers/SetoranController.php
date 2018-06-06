<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Setor;
use frontend\models\Setoran;
use frontend\models\SetoranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Jadwalbus;
use frontend\models\Bus;
use frontend\models\Stok;
use yii\helpers\ArrayHelper;
use frontend\models\Karcis;

/**
 * SetoranController implements the CRUD actions for Setoran model.
 */
class SetoranController extends Controller
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
     * Lists all Setoran models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'layout_admin2';
        $searchModel = new SetoranSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Setoran model.
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
     * Creates a new Setoran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'layout_admin2';
        $model = new Setoran();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_setoran]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCreatesetoran($tanggal){
        $this->layout = 'layout_admin2';
        $jadwal = Jadwalbus::find()->where(['tanggal'=>$tanggal])->all();

        $tipe_karcis = Stok::find()->all();
        $tpkarcis = ArrayHelper::map($tipe_karcis, 'id_stok', 'tipe_karcis');
        
        $tempviewjadwal = array();
        foreach ($jadwal as $key) {

            // insert to database
            $model = new Setor();

            $model->id_jadwal =  $key->id_jadwal;
            $model->solar_pergi = 0;
            $model->nom_solar_pergi = 0;
            $model->solar_plg = 0;
            $model->nom_solar_plg = 0;
            $model->um_sopir = 0;
            $model->um_kond = 0;
            $model->cuci_bis = 0;
            $model->tpr = 0;
            $model->tol = 0;
            $model->siaran = 0;
            $model->lain_lain = 0;
            $model->potong_minum = 0;
            $model->pendapatan_kotor = 0;
            $model->bersih_perjalanan = 0;
            $model->total_bersih = 0;

            if ($model->id_jadwal == null) {
                $model->save();
            }

            $setoran = Setor::find()->where(['id_jadwal'=>$key->id_jadwal])->one();

            $bus = Bus::find()->where(['id_bus'=>$key->id_bus])->one();

            $karcis = Karcis::find()->where(['id_jadwal'=>$key->id_jadwal])->one();
            
            array_push($tempviewjadwal, [
                'jam'=>$bus->jam_operasional,
                'id_bus'=>$bus->no_polisi, 
                'id_jurusan'=>$key->id_jurusan,
                'id_sopir'=>$key->id_sopir, 
                'id_kondektur'=>$key->id_kondektur,
                'id_karcis'=> $karcis->id_karcis,
                'pulang_awal'=> $karcis->pulang_awal,
                'pergi_awal'=> $karcis->pergi_awal,
                'pergi_akhir'=> $karcis->pergi_akhir,
                'pulang_akhir'=> $karcis->pulang_akhir,
                'id_stok' => $karcis->id_stok,
                'id_setoran' => $setoran->id_setor,
                // 'id_setoran'=> $setoran->id_setoran,
                // 'id_bon'=> $setoran->id_bon,
                // 'id_tpr'=> $setoran->id_tpr,
                // 'id_pengeluaran'=> $setoran->id_pengeluaran,
                // 'pendapatan_kotor'=> $setoran->pendapatan_kotor,
                // 'bersih_perjalanan'=> $setoran->bersih_perjalanan,
            ]);
        }

            return $this->render('createsetoran', [
                'tempviewjadwal'=> $tempviewjadwal,
                'tipe_karcis' => $tpkarcis,
                'model' => new Karcis(),
            ]);
        // } else {
        //     $model = new Karcis();
        //     return $this->render('createtpr', [
        //         'model' => $model,
        //         'tanggal' => $tanggal,
        //     ]);
        // }
    }

    /**
     * Updates an existing Setoran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $idkarcis)
    {
        $karcis = Karcis::find()->where(['id_karcis'=>$idkarcis])->one();
        $idjadwal = $karcis->id_jadwal;

        $this->layout = 'layout_admin2';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id_setoran]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Setoran model.
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
     * Finds the Setoran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Setoran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Setoran::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

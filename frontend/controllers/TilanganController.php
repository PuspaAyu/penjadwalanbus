<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Tilangan;
use frontend\models\TilanganSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\frontend\models\JadwalBus;
use yii\frontend\models\Bus;

/**
 * TilanganController implements the CRUD actions for Tilangan model.
 */
class TilanganController extends Controller
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
     * Lists all Tilangan models.
     * @return mixed
     */
    public function actionIndex()
    {
        //$this->layout = 'layout_admin3';
        // $searchModel = new TilanganSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // return $this->render('index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);
        $this->layout = 'layout_admin3';
          $model = Tilangan::find()->all();
          
          $queryalert = (new \yii\db\Query())
                    ->select(['tilangan.id_tilangan',
                        'tilangan.id_jadwal', 
                        'bus.no_polisi',
                        'tilangan.tanggal_batas_tilang',
                        'tilangan.denda', 
                        'tilangan.jenis_pelanggaran',
                        'tilangan.tempat_kejadian', 
                        'tilangan.status',
                        new \yii\db\Expression('CURDATE()as tgl_sekarang'), 
                        new \yii\db\Expression('DATEDIFF(CURDATE(), tanggal_batas_tilang) as selisih') ])
                    ->from('tilangan')
                    ->join('LEFT JOIN', 'bus', 'bus.id_bus=tilangan.id_jadwal')
                   
                    // ->groupBy('tanggal')
                    ->all();

          return $this->render('index',[
            //'query'=>$query,
            'model'=>$model,
            'alert' => $queryalert
          ]);

          
    }

    /**
     * Displays a single Tilangan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = 'layout_admin3';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tilangan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'layout_admin3';
        $model = new Tilangan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tilangan]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing Tilangan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = 'layout_admin3';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tilangan]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tilangan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tilangan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tilangan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tilangan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

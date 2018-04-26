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

        return $this->render('index', [
            'jadwal' => $data,
        ]);
    }


    /**
     * Displays a single Jadwalbus model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = 'layout_admin';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Jadwalbus model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'layout_admin';
        $model = new Jadwalbus();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_jadwal]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Jadwalbus model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = 'layout_admin';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_jadwal]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Jadwalbus model.
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
     * Finds the Jadwalbus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Jadwalbus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Jadwalbus::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

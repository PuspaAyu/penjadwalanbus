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
        // $idmg=Yii::$app->db->createCommand('SELECT b.no_polisi, b.jam_operasional, p.nama as sopir, (select nama from pegawai pp where jb.id_kondektur=pp.id_pegawai) kondektur FROM bus b, pegawai p, jadwal_bus jb WHERE jb.id_bus = b.id_bus AND jb.id_sopir = p.id_pegawai ORDER BY b.no_polisi')->queryScalar();

        $query = new Query;
        $subQuery = new Query;
        $subQuery->select(['nama'])
                ->from('pegawai')
                ->where('jadwal_bus.id_kondektur=pegawai.id_pegawai');
        $query->select(['bus.no_polisi', 'bus.jam_operasional', 'pegawai.nama' => 'sopir', '.$subQuery.', 'kondektur'])
              ->from('bus', 'pegawai', 'jadwal_bus')
              ->where('jadwal_bus.id_bus = bus.id_bus')
              ->where('jadwal_bus.id_sopir = pegawai.id_pegawai');

        $command = $query->createCommand();
        $data = $command->queryAll();

 
         $dataProvider = new ActiveDataProvider([
            'query' => Jadwalbus::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
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

<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Bus;
use frontend\models\history;
use frontend\models\BusSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BusController implements the CRUD actions for Bus model.
 */
class BusController extends Controller
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
     * Lists all Bus models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $this->layout = 'layout_admin';
        // $searchModel = new BusSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // return $this->render('index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);
        $this->layout = 'layout_admin';
          $model = Bus::find()->all();

          $query = (new \yii\db\Query())
             ->select(['bus.id_bus', 'bus.jam_operasional', 'bus.no_polisi','bus.status', 'jurusan.jurusan', 'karcis.seri'])
             ->from('bus')
             ->join('LEFT JOIN', 'jurusan', 'jurusan.id_jurusan=bus.id_jurusan')
             ->join('LEFT JOIN', 'karcis', 'karcis.id_stok=bus.id_karcis')
             ->groupBy('id_bus')
             ->all();

          return $this->render('index',[
            'query'=>$query,
            'model'=>$model,
          ]);
    }

    /**
     * Displays a single Bus model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = 'layout_admin';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bus model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'layout_admin';
        $model = new Bus();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_bus]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Bus model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = 'layout_admin';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id_bus]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Bus model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $data = $this->findModel($id);
        $history = new history;
        $history->id_bus = $id;
        $history->no_polisi = $data['no_polisi'];
        $history->jam_operasional = $data['jam_operasional'];
        $history->id_jurusan = $data['id_jurusan'];
        $history->status = $data['status'];
        $history->id_karcis = $data['id_karcis'];
        $history->save();

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bus::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    
}

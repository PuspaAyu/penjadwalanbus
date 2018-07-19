<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Izin;
use frontend\models\IzinSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use DateTime;
use DateInterval;
use DatePeriod;
use frontend\models\Pegawai;


/**
 * IzinController implements the CRUD actions for Izin model.
 */
class IzinController extends Controller
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
     * Lists all Izin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'layout_admin';
        $model = Izin::find()->all();
        $pegawai = Pegawai::find()->all();

          $query = (new \yii\db\Query())
             ->select(['izin.id_izin','izin.tgl_izin', 'izin.jenis_izin', 'pegawai.nama'])
             ->from('izin')
             ->join('LEFT JOIN', 'pegawai', 'pegawai.id_pegawai=izin.id_pegawai')
             ->groupBy('tgl_izin')
             ->all();

          return $this->render('index',[
            'query'=>$query,
            'model'=>$model,
            'pegawai'=>$pegawai
          ]);


    }

    /**
     * Displays a single Izin model.
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
     * Creates a new Izin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'layout_admin';
        
        $request =Yii::$app->request->post();
        if ($request){
            $rangeDate = $this->getRangeDate($request['tgl_izin'], $request['tgl_izin2']);
            foreach ($rangeDate as $date) {
                $model = new Izin();
                $model->tgl_izin=$date;
                $model->jenis_izin=$request['jenis_izin'];
                $model->id_pegawai=$request['id_pegawai'];
                $model->save();
            
            }
        }else {
            $model = new Izin();
            
            $model->save();
            return $this->render('index', [
                'model' => $model,
                
            ]);
        }
        return $this->redirect(['index'
            ]);

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['index']);
        // } else {
        //     return $this->render('create', [
        //         'model' => $model,
        //     ]);
        // }
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

    /**
     * Updates an existing Izin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = 'layout_admin';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_izin]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Izin model.
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
     * Finds the Izin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Izin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Izin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

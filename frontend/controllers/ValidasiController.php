<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use frontend\models\Bus;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use frontend\models\Jadwalbus;
use frontend\models\Pegawai;
use yii\helpers\Url;

/**
 * BusController implements the CRUD actions for Bus model.
 */
class ValidasiController extends Controller
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
        $this->layout = 'layout_admin';
            $model = Jadwalbus::find()->all();

            // $query = (new \yii\db\Query())
            //     ->select(['*'])
            //     ->from('pegawai')
            //     ->all();

            $countsopir = (new \yii\db\Query())
                ->select(['jadwal_bus.id_sopir',
                        'pegawai.nama', 
                         
                        new \yii\db\Expression("count('id_sopir') as jml_sopir")
    
                       
                    ])
                ->from('jadwal_bus')
                ->join('LEFT JOIN','pegawai', 'pegawai.id_pegawai = jadwal_bus.id_sopir')
                ->groupBy('id_sopir')
                ->all();
            

          return $this->render('index',[
            'countsopir'=>$countsopir,
            // 'query'=>$query,
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

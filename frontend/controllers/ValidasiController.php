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
            $countsopir = (new \yii\db\Query())
                ->select(['jadwal_bus.id_sopir',
                        'pegawai.nama',       
                        'jadwal_bus.tanggal',       
                        'jadwal_bus.id_bus',       
                        // new \yii\db\Expression("count('id_sopir') as jml_sopir")
                    ])
                ->from('jadwal_bus')
                ->join('LEFT JOIN','pegawai', 'pegawai.id_pegawai = jadwal_bus.id_sopir')
                // ->groupBy('id_sopir')
                ->all();

          return $this->render('index',[
            'countsopir'=>$countsopir,
            // 'query'=>$query,
            'model'=>$model,
          ]);
    }

    public function actionIndex2()
    {
        $this->layout = 'layout_admin';
            $model = Jadwalbus::find()->all();
            $countkondektur = (new \yii\db\Query())
                ->select(['jadwal_bus.id_kondektur',
                        'pegawai.nama',       
                        'jadwal_bus.tanggal',       
                        'jadwal_bus.id_bus',
                    ])
                ->from('jadwal_bus')
                ->join('LEFT JOIN','pegawai', 'pegawai.id_pegawai = jadwal_bus.id_kondektur')
                ->all();

          return $this->render('index2',[
            'countkondektur'=>$countkondektur,
            // 'query'=>$query,
            'model'=>$model,
          ]);
    }

    public function actionIndex3()
    {
        $this->layout = 'layout_admin';
            $model = Pegawai::find()->all();
            $sopirkosong = (new \yii\db\Query())
                ->select(['pegawai.id_pegawai',
                    'pegawai.nama',
                    ])
                ->from('pegawai')
                ->where(['id_jabatan' => 1])
                ->andWhere([
                    'not in',
                    'id_pegawai',
                    (new \yii\db\Query())
                        ->select('id_sopir')
                        ->from('jadwal_bus')
                        ->join('LEFT JOIN', 'pegawai', 'pegawai.id_pegawai=jadwal_bus.id_sopir')
                ])
                ->all();

               
          return $this->render('index3',[
            'sopirkosong'=>$sopirkosong,
            // 'query'=>$query,
            'model'=>$model,
          ]);
    }

    public function actionIndex4()
    {
        $this->layout = 'layout_admin';
            $model = Pegawai::find()->all();
            $konkosong = (new \yii\db\Query())
                ->select(['pegawai.id_pegawai',
                    'pegawai.nama',
                    // 'jadwal_bus.tanggal'
                    ])
                ->from('pegawai')
                ->where(['id_jabatan' => 2])
                ->andWhere([
                    'not in',
                    'id_pegawai',
                    (new \yii\db\Query())
                        ->select('id_kondektur')
                        ->from('jadwal_bus')
                        ->join('LEFT JOIN', 'pegawai', 'pegawai.id_pegawai=jadwal_bus.id_kondektur')
                ])
                // ->where("pegawai.id_pegawai NOT IN (SELECT id_kondektur as id_pegawai FROM jadwal_bus JOIN pegawai.id_pegawai=jadwal_bus.id_sopir)")
                // ->join('LEFT JOIN', 'jadwal_bus', 'pegawai.id_pegawai=jadwal_bus.id_kondektur')
                ->all();
               
          return $this->render('index4',[
            'konkosong'=>$konkosong,
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

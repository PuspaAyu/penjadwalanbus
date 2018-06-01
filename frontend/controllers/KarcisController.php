<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Karcis;
use frontend\models\KarcisSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Jadwalbus;
use frontend\models\Bus;
use frontend\models\Stok;
use yii\helpers\ArrayHelper;

/**
 * KarcisController implements the CRUD actions for Karcis model.
 */
class KarcisController extends Controller
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
     * Lists all Karcis models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $this->layout = 'layout_admin3';
        // $searchModel = new KarcisSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // return $this->render('index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);
        $this->layout = 'layout_admin3';
        $model = Karcis::find()->all();

        

          $query = (new \yii\db\Query())
             ->select(['stok.tipe_karcis', 'karcis.id_karcis', 'karcis.id_jadwal', 'karcis.id_stok', 'karcis.pergi_awal', 'karcis.pergi_akhir', 'karcis.pulang_awal','karcis.pulang_akhir'])
             ->from('karcis')
             ->join('LEFT JOIN', 'stok', 'stok.id_stok=karcis.id_stok')
             ->groupBy('id_karcis')
             ->all();
          return $this->render('index',[
            'query'=>$query,
            'model'=>$model,
          ]);
    }

    /**
     * Displays a single Karcis model.
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
     * Creates a new Karcis model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'layout_admin3';
        $model = new Karcis();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id_karcis]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Karcis model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = 'layout_admin3';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_karcis]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Karcis model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionCreatekarcis($tanggal){
        $this->layout = 'layout_admin3';
        $jadwal = Jadwalbus::find()->where(['tanggal'=>$tanggal])->all();

        $tipe_karcis = Stok::find()->all();
        $tpkarcis = ArrayHelper::map($tipe_karcis, 'id_stok', 'tipe_karcis');

        // echo $tipe_karcis[0]->tipe_karcis;
        // die();

        if ($tanggal) {

            // Ketika submit save button
            if (Yii::$app->request->post()) {
                $request = Yii::$app->request->post();
                $model = Karcis::find()->where(['id_karcis' => $request['id_karcis']])->one();

                $model->id_stok = $request['tipe_karcis'];
                $model->pergi_awal = $request['Karcis']['pergi_awal'];
                $model->pergi_akhir = $request['Karcis']['pergi_akhir'];
                $model->pulang_awal = $request['Karcis']['pulang_awal'];
                $model->pulang_akhir = $request['Karcis']['pulang_akhir'];
                $model->update();
            }


            $tempviewjadwal = array();
            foreach ($jadwal as $key) {

                //insert to database
                $model = new Karcis();

                $model->id_jadwal = $key['id_jadwal'];
                $model->id_stok = 0;
                $model->pergi_awal = 0;
                $model->pergi_akhir = 0;
                $model->pulang_awal = 0;
                $model->pulang_akhir = 0;

                $id_jadwal = Karcis::find()->where(['id_jadwal' => $key['id_jadwal']])->one();

                if ($id_jadwal == null) {
                    $model->save();
                }

                $karcis = Karcis::find()->where(['id_jadwal'=>$key->id_jadwal])->one();
                $bus = Bus::find()->where(['id_bus'=>$key->id_bus])->one();
                
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
                ]);
            }

            return $this->render('createkarcis', [
                'tempviewjadwal'=> $tempviewjadwal,
                'tipe_karcis' => $tpkarcis,
                'model' => new Karcis(),
            ]);
        } else {
            $model = new Karcis();
            return $this->render('createkarcis', [
                'model' => $model,
                'tanggal' => $tanggal,
            ]);
        }
    }

    public function actionSave($id)
    {
      $this->layout = 'layout_admin3';
      $model = Karcis::find()->where(['id_karcis' => $id])->one();
      $query = (new \yii\db\Query())
             ->select(['jadwal_bus.tanggal'])
             ->from('jadwal_bus')
             ->where(['karcis.id_karcis'=>$id])
             ->join('LEFT JOIN', 'karcis', 'jadwal_bus.id_jadwal=karcis.id_jadwal')
             ->all();

            $command = $query->createCommand();
            $data = $command->queryAll();
       
      $request = Yii::$app->request->post();
      if (Yii::$app->request->post()) {
          if(!empty($request['tipe_karcis'])
                AND !empty($request['pergi_awal'])
                AND !empty($request['pergi_akhir'])
                AND !empty($request['pulang_awal'])
                AND !empty($request['pulang_akhir'])
            ){
             $model->tipe_karcis = 0;
             $model->pergi_awal = 0;
             $model->pergi_akhir = 0;
             $model->pulang_awal = 0;
             $model->pulang_akhir = 0;
          } else {
             $model->tipe_karcis = $request['tipe_karcis'];
             $model->pergi_awal = $request['pergi_awal'];
             $model->pergi_akhir = $request['pergi_akhir'];
             $model->pulang_awal = $request['pulang_awal'];
             $model->pulang_akhir = $request['pulang_akhir'];
          }

          $model->update();

          return $this->refresh();

      }else{

          return $this->redirect(['createkarcis', 'tanggal' => $data->tanggal]);

        // return $this->render('index', [
        //     'model' => $model,
        // ]);
      }
    }

    /**
     * Finds the Karcis model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Karcis the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Karcis::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

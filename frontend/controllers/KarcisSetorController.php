<?php

namespace frontend\controllers;

use Yii;
use frontend\models\KarcisSetor;
use frontend\models\KarcisSetorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Jadwalbus;
use frontend\models\Bus;
use frontend\models\Karcis;
use yii\helpers\ArrayHelper;

/**
 * KarcisSetorController implements the CRUD actions for KarcisSetor model.
 */
class KarcisSetorController extends Controller
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
     * Lists all KarcisSetor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KarcisSetorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KarcisSetor model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new KarcisSetor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KarcisSetor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_karcis]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCreatekarcis($tanggal){
        $today = $tanggal;
        $yesterday = date('Y-m-d', strtotime($today .' -1 day'));

        $this->layout = 'layout_admin3';
        $jadwal = Jadwalbus::find()->where(['tanggal'=>$tanggal])->all();

        $seri = Karcis::find()->all();
        $tpkarcis = ArrayHelper::map($seri, 'id_stok', 'seri');

        // echo $tipe_karcis[0]->tipe_karcis;
        // die();

        if ($today){
            // Ketika submit save button
            if (Yii::$app->request->post()) {
                $request = Yii::$app->request->post();
                $model = KarcisSetor::find()->where(['id_karcis' => $request['id_karcis']])->one();
            
                // $model->id_stok = $request['seri'];
                $model->pergi_awal = $request['KarcisSetor']['pergi_awal'];
                $model->pergi_akhir = $request['KarcisSetor']['pergi_akhir'];
                $model->pulang_awal = $request['KarcisSetor']['pulang_awal'];
                $model->pulang_akhir = $request['KarcisSetor']['pulang_akhir'];
                $model->update();
            }

            $tempviewjadwal = array();
            foreach ($jadwal as $key) {

                //insert to database
                $model = new KarcisSetor();

                $model->id_jadwal = $key['id_jadwal'];
                // $model->id_stok = 0;
                $model->pergi_awal = 0;
                $model->pergi_akhir = 0;
                $model->pulang_awal = 0;
                $model->pulang_akhir = 0;

                $id_jadwal = KarcisSetor::find()->where(['id_jadwal' => $key['id_jadwal']])->one();

                if ($id_jadwal == null) {
                    $model->save();
                }

                $karcis = KarcisSetor::find()->where(['id_jadwal'=>$key->id_jadwal])->one();
                $bus = Bus::find()->where(['id_bus'=>$key->id_bus])->one();

                $query = (new \yii\db\Query())
                     ->select(['karcis_setor.pergi_akhir', 'karcis_setor.pulang_akhir'])
                     ->from('karcis_setor')
                     ->join('LEFT JOIN', 'jadwal_bus', 'jadwal_bus.id_jadwal=karcis_setor.id_jadwal')
                     ->where(['jadwal_bus.tanggal'=>$yesterday, 'jadwal_bus.id_bus'=>$key->id_bus])
                     ->one();

                if($query == null){
                    array_push($tempviewjadwal, [
                        'jam'=>$bus->jam_operasional,
                        'no_polisi'=>$bus->no_polisi,
                        'id_karcis' => $bus->id_karcis, 
                        'id_jurusan'=>$bus->id_jurusan,
                        'id_sopir'=>$key->id_sopir, 
                        'id_kondektur'=>$key->id_kondektur,
                        // 'id_karcis'=> $karcis->id_karcis,
                        'pulang_awal'=> $karcis->pulang_awal,
                        'pergi_awal'=> $karcis->pergi_awal,
                        'pergi_akhir'=> $karcis->pergi_akhir,
                        'pulang_akhir'=> $karcis->pulang_akhir,
                        // 'id_stok' => $karcis->id_stok,
                    ]);
                }
                else{
                    $pergi_awal_besok =  $query['pergi_akhir'] + 1;
                    $pulang_awal_besok =  $query['pulang_akhir'] + 1;

                    array_push($tempviewjadwal, [
                        'jam'=>$bus->jam_operasional,
                        'no_polisi'=>$bus->no_polisi,
                        'id_karcis' => $bus->id_karcis, 
                        'id_jurusan'=>$bus->id_jurusan,
                        'id_sopir'=>$key->id_sopir, 
                        'id_kondektur'=>$key->id_kondektur,
                        // 'id_karcis'=> $karcis->id_karcis,
                        'pulang_awal'=> $pulang_awal_besok,
                        'pergi_awal'=> $pergi_awal_besok,
                        'pergi_akhir'=> $karcis->pergi_akhir,
                        'pulang_akhir'=> $karcis->pulang_akhir,
                        // 'id_stok' => $karcis->id_stok,
                    ]);
                }
               

                    
                
            }
            

            return $this->render('createkarcis', [
                'tempviewjadwal'=> $tempviewjadwal,
                'seri' => $tpkarcis,
                'model' => new KarcisSetor(),
            ]);
        } else {
            $model = new KarcisSetor();
            return $this->render('createkarcis', [
                'model' => $model,
                'tanggal' => $tanggal,
            ]);
        }
    }

    public function actionSave($id)
    {
      $this->layout = 'layout_admin3';
      $model = KarcisSetor::find()->where(['id_karcis' => $id])->one();
      $query = (new \yii\db\Query())
             ->select(['jadwal_bus.tanggal'])
             ->from('jadwal_bus')
             ->where(['karcis_setor.id_karcis'=>$id])
             ->join('LEFT JOIN', 'karcis_setor', 'jadwal_bus.id_jadwal=karcis_setor.id_jadwal')
             ->all();

            $command = $query->createCommand();
            $data = $command->queryAll();
       
      $request = Yii::$app->request->post();
      if (Yii::$app->request->post()) {
          if(!empty($request['pergi_awal'])
                AND !empty($request['pergi_akhir'])
                AND !empty($request['pulang_awal'])
                AND !empty($request['pulang_akhir'])
            ){
             // $model->seri = 0;
             $model->pergi_awal = 0;
             $model->pergi_akhir = 0;
             $model->pulang_awal = 0;
             $model->pulang_akhir = 0;
          } else {
             // $model->seri = $request['seri'];
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
     * Updates an existing KarcisSetor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_karcis]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing KarcisSetor model.
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
     * Finds the KarcisSetor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KarcisSetor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KarcisSetor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

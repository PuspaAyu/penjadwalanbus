<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Jadwalbus;
use frontend\models\JadwalbusSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\db\Query;

use frontend\models\Bus;
use yii\helpers\ArrayHelper;
use frontend\models\Pegawai;

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
    public function actionIndex(){
      $this->layout = 'layout_admin';

      $query = (new \yii\db\Query())
         ->select(['*'])
         ->from('jadwal_bus')
         ->groupBy('tanggal')
         ->all();
      return $this->render('index',[
        'query'=>$query
      ]);
    }


    public function actionShow($tanggal)
    {
        $this->layout = 'layout_admin';

        $dtsupir = Pegawai::find()->where(['id_jabatan'=>'1'])->all();
        $supir = ArrayHelper::map($dtsupir, 'id_pegawai', 'nama');

        $dtkond = Pegawai::find()->where(['id_jabatan'=>'2'])->all();
        $kondektur = ArrayHelper::map($dtkond, 'id_pegawai', 'nama');

        $query = new Query;
        $query->select(['jadwal_bus.id_jadwal','bus.jam_operasional', 'bus.no_polisi', 'sopir.nama as sopir', 'kondektur.nama as kondektur', 'jurusan.jurusan'])
              ->from('jadwal_bus')
              ->where(['jadwal_bus.tanggal' => $tanggal])
              ->join('LEFT JOIN', 'pegawai sopir', 'sopir.id_pegawai = jadwal_bus.id_sopir')
              ->join('LEFT JOIN', 'pegawai kondektur', 'kondektur.id_pegawai = jadwal_bus.id_kondektur')
              ->join('LEFT JOIN', 'bus', 'bus.id_bus = jadwal_bus.id_bus')
              ->join('LEFT JOIN', 'jurusan', 'jurusan.id_jurusan = bus.id_jurusan')
              ->orderBy('bus.id_bus');

        $command = $query->createCommand(); 
        $data = $command->queryAll();

        // $rand = rand(1,137);
        // $randomJadwal = rand([$data]);
        // echo $randomJadwal;

        return $this->render('show', [
            'jadwal' => $data,  
            'supir'=>$supir,
            'kondektur'=>$kondektur,
            // 'model' => $this->findModel($id)
        ]);


    }

    public function actionSupir($id)
    {
      $supir = Pegawai::find()->where('id_pegawai != '.$id)->andWhere(['id_jabatan'=>'1'])->all();
      foreach ($supir as $key) {
          echo "<option value='".$key->id_pegawai."'>".$key->nama."</option>";
      }
    }

    public function actionCreate()
    {
        $this->layout = 'layout_admin';
        $totalBus = Bus::find()->count();
        $bus = Bus::find()->all();

        if (Yii::$app->request->post()) {

            $request = Yii::$app->request->post();

            foreach ($bus as $key) {
              $model = new Jadwalbus();
              $model->tanggal = $request['JadwalBus']['tanggal'];
              $model->id_bus = $key->id_bus;
              $model->id_jurusan = $key->id_jurusan;
              $model->save();
            }

            return $this->redirect(['index']);
        } else {
            $model = new Jadwalbus();
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionSave($id)
    {
      $this->layout = 'layout_admin';
      $model = Jadwalbus::find()->where(['id_jadwal' => $id])->one();

      $request = Yii::$app->request->post();
      if (Yii::$app->request->post()) {

          $model->id_sopir = $request['supir'];
          $model->id_kondektur = $request['kondektur'];
          $model->update();

          return $this->refresh();

      }else{
          return $this->redirect(['show', 'tanggal' => $model->tanggal]);

        // return $this->render('index', [
        //     'model' => $model,
        // ]);
      }
      
    }


}

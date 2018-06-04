<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Tpr;
use frontend\models\TprSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Jadwalbus;
use frontend\models\Bus;
use frontend\models\Stok;
use yii\helpers\ArrayHelper;
use frontend\models\Karcis;
use frontend\models\Setoran;

/**
 * TprController implements the CRUD actions for Tpr model.
 */
class TprController extends Controller
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
     * Lists all Tpr models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'layout_admin2';
        $model = Tpr::find()->all();
        $query = (new \yii\db\Query())
             ->select(['tpr.id_tpr', 'tpr.tpr', 'tpr.kemandoran', 'tpr.id_bus', 'terminal.terminal'])
             ->from('tpr')          
             ->join('LEFT JOIN', 'terminal', 'terminal.id_terminal=tpr.id_terminal')
             ->groupBy('id_tpr')
             ->all();
          return $this->render('index',[
            'query'=>$query,
            'model'=>$model,
          ]);
    }

    /**
     * Displays a single Tpr model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = 'layout_admin2';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tpr model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'layout_admin2';
        $model = new Tpr();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tpr]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionCreatetpr($tanggal){
        $this->layout = 'layout_admin2';
        $jadwal = Jadwalbus::find()->where(['tanggal'=>$tanggal])->all();

        $tipe_karcis = Stok::find()->all();
        $tpkarcis = ArrayHelper::map($tipe_karcis, 'id_stok', 'tipe_karcis');

        // echo $tipe_karcis[0]->tipe_karcis;
        // die();

        // if ($tanggal) {

        //     // Ketika submit save button
        //     if (Yii::$app->request->post()) {
        //         $request = Yii::$app->request->post();
        //         $model = Karcis::find()->where(['id_karcis' => $request['id_karcis']])->one();

        //         $model->id_stok = $request['tipe_karcis'];
        //         $model->pergi_awal = $request['Karcis']['pergi_awal'];
        //         $model->pergi_akhir = $request['Karcis']['pergi_akhir'];
        //         $model->pulang_awal = $request['Karcis']['pulang_awal'];
        //         $model->pulang_akhir = $request['Karcis']['pulang_akhir'];
        //         $model->update();
        //     }


            $tempviewjadwal = array();
            foreach ($jadwal as $key) {

                //insert to database
                $model = new Setoran();

                $model->id_jadwal = $key['id_jadwal'];
                $model->id_karcis = 0;
                $model->id_bon = 0;
                $model->id_tpr = 0;
                $model->id_pengeluaran = 0;
                $model->pendapatan_kotor = 0;
                $model->bersih_perjalanan = 0;

                $id_jadwal = Setoran::find()->where(['id_jadwal' => $key['id_jadwal']])->one();

                if ($id_jadwal == null) {
                    $model->save();
                }

                $karcis = Setoran::find()->where(['id_jadwal'=>$key->id_jadwal])->one();
                $bus = Bus::find()->where(['id_bus'=>$key->id_bus])->one();
                
                array_push($tempviewjadwal, [
                    'jam'=>$bus->jam_operasional,
                    'id_bus'=>$bus->no_polisi, 
                    'id_jurusan'=>$key->id_jurusan,
                    'id_sopir'=>$key->id_sopir, 
                    'id_kondektur'=>$key->id_kondektur,
                    'id_setoran'=> $karcis->id_setoran,
                    'id_bon'=> $karcis->id_bon,
                    'id_tpr'=> $karcis->id_tpr,
                    'id_pengeluaran'=> $karcis->id_pengeluaran,
                    'pendapatan_kotor'=> $karcis->pendapatan_kotor,
                    'bersih_perjalanan'=> $karcis->bersih_perjalanan,
                ]);
            }

            return $this->render('createtpr', [
                'tempviewjadwal'=> $tempviewjadwal,
                'tipe_karcis' => $tpkarcis,
                'model' => new Karcis(),
            ]);
        // } else {
        //     $model = new Karcis();
        //     return $this->render('createtpr', [
        //         'model' => $model,
        //         'tanggal' => $tanggal,
        //     ]);
        // }
    }

    public function actionSetor($id)
    {
        $this->layout = 'layout_admin2';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id_tpr]);
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tpr model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = 'layout_admin2';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id_tpr]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tpr model.
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
     * Finds the Tpr model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tpr the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tpr::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

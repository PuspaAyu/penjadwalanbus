<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Jadwalbus;
use frontend\models\Bus;
use frontend\models\Jurusan;
use frontend\models\Pegawai;
use frontend\models\Izin;
use frontend\models\Komplain;
use frontend\models\Karcis;
use frontend\models\Setor;
use frontend\models\Tilangan;
use frontend\models\KarcisSetor;



/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $user = Yii::$app->user->isGuest;
        if ($user) {
            return $this->render('index');
        }else {
            
            $level = Yii::$app->user->identity->level;
            if ($level == 1) {
                $this->layout = 'layout_admin';
                return $this->render('index');
            }else if ($level == 2) {
                $this->layout = 'layout_admin2';
                return $this->render('index2');
            }else if ($level == 3) {
                $this->layout = 'layout_admin3';
                return $this->render('index3');
            }     
        }        
    }

    public function actionIndexadmin()
    {
        $user = Yii::$app->user->isGuest;

        if ($user) {
            return $this->redirect('login');
        }else {
            $level = Yii::$app->user->identity->level;

            if ($level == 1) {
                $this->layout = 'layout_admin';
                $model = Bus::find()->all();
                $crew = Pegawai::find()->all();
                $izin = Izin::find()->all();
                $komplain = Komplain::find()->all();
                $query = count($model);
                $total_crew = count($crew);
                $total_izin = count($izin);
                $total_komplain = count($komplain);
                return $this->render('indexadmin',[
                    'query'=>$query,
                    'model'=>$model,
                    'total_crew'=>$total_crew,
                    'total_izin'=>$total_izin,
                    'total_komplain'=>$total_komplain,
                  ]);
            }else if ($level == 2) {
                $this->layout = 'layout_admin2';
                return $this->render('index2');
            }else if ($level == 3) {
                $this->layout = 'layout_admin3';
                return $this->render('index3');
            }     
        }

        
          
          // return $this->render('indexadmin',[
          //   'query'=>$query,
          //   'model'=>$model,
          // ]);

    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['site/indexadmin']);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionViewJadwal(){
        // $jadwal = Jadwalbus::find()->where(['tanggal'=>'2018-06-09'])->all();
        $jadwal = Jadwalbus::find()->all();

        $tempviewjadwal = array();
        foreach ($jadwal as $key) {
            $bus = Bus::find()->where(['id_bus'=>$key->id_bus])->one();


            $jurusan = Jurusan::find()->where(['id_jurusan'=>$bus->id_jurusan])->one();


            array_push($tempviewjadwal, [
                'jam'=>$bus->jam_operasional,
                'id_bus'=>$bus->no_polisi, 
                'id_jurusan'=>$jurusan->id_jurusan,
                'id_sopir'=>$key->id_sopir, 
                'id_kondektur'=>$key->id_kondektur,
                'tanggal'=>$key->tanggal
            ]);
        }


        return $this->render('viewjadwal',
        ['tempviewjadwal'=>$tempviewjadwal,
        ]);

        // $query = (new \yii\db\Query())
        //         ->select(['jadwal_bus.id_jadwal',
        //                  'jadwal_bus.tanggal',
        //                  'jadwal_bus.id_bus',
        //                  'jadwal_bus.id_sopir',
        //                  'jadwal_bus.id_kondektur',
        //              ])
        //         ->from('jadwal_bus')
        //         ->join('LEFT JOIN', 'bus', 'bus.id_bus = jadwal_bus.id_bus')
        //         ->all();

        // return $this->render('viewjadwal',[
        //     'tempviewjadwal' => $query,
        //     'model' => $jadwal,
        // ]);
    }

    public function actionViewBus(){
        $model = Bus::find()->all();

        $query = (new \yii\db\Query())
             ->select(['bus.id_bus', 'bus.jam_operasional', 'bus.no_polisi','bus.status', 'jurusan.jurusan', 'karcis.seri'])
             ->from('bus')
             ->join('LEFT JOIN', 'jurusan', 'jurusan.id_jurusan=bus.id_jurusan')
             ->join('LEFT JOIN', 'karcis', 'karcis.id_stok=bus.id_karcis')
             ->groupBy('id_bus')
             ->all();

          return $this->render('viewbus',[
            'query'=>$query,
            'model'=>$model,
          ]);
    }

    public function actionViewRekapuang(){
        $model = Setor::find()->all();
        $query = (new yii\db\Query())
                ->select(['setor.id_setor',
                        'setor.id_jadwal',
                        'setor.id_karcis',
                        'setor.pendapatan_kotor',
                        'setor.bersih_perjalanan',
                        'setor.total_bersih',
                        'setor.premi_sopir',
                        'setor.premi_kondektur',
                        'bus.no_polisi',
                       ])
                ->from('setor')
                ->join('LEFT JOIN', 'jadwal_bus', 'jadwal_bus.id_jadwal = setor.id_jadwal')
                ->join('RIGHT JOIN', 'bus', 'jadwal_bus.id_bus = bus.id_bus')
                ->orderBy('id_setor', 'asc')
                ->all();

            return $this->render('viewrekapuang',[
            'query'=>$query,
            'model'=>$model,
        ]);
    }

    public function actionViewTilangan(){
        $model = Tilangan::find()->all();
          
          $queryalert = (new \yii\db\Query())
                    ->select(['tilangan.id_tilangan',
                        'tilangan.id_jadwal', 
                        'bus.no_polisi',
                        'tilangan.tanggal_batas_tilang',
                        'tilangan.denda', 
                        'tilangan.jenis_pelanggaran',
                        'tilangan.tempat_kejadian', 
                        'tilangan.status',
                        new \yii\db\Expression('CURDATE()as tgl_sekarang'), 
                        new \yii\db\Expression('DATEDIFF(CURDATE(), tanggal_batas_tilang) as selisih') ])
                    ->from('tilangan')
                    ->join('LEFT JOIN', 'bus', 'bus.id_bus=tilangan.id_jadwal')
                   
                    // ->groupBy('tanggal')
                    ->all();

          return $this->render('viewtilangan',[
            //'query'=>$query,
            'model'=>$model,
            'alert' => $queryalert
          ]);
    }

    public function actionViewKarcis(){
        $this->layout = 'layout_admin3';
        $model = KarcisSetor::find()->all();
        $query = (new yii\db\Query())
                ->select(['karcis_setor.id_karcis',
                        'karcis_setor.pergi_awal',
                        'karcis_setor.pergi_akhir',
                        'karcis_setor.pulang_awal',
                        'karcis_setor.pulang_akhir',
                        'bus.no_polisi',
                        'karcis_setor.id_jadwal',
                       ])
                ->from('karcis_setor')
                ->join('LEFT JOIN', 'jadwal_bus', 'jadwal_bus.id_jadwal = karcis_setor.id_jadwal')
                ->join('RIGHT JOIN', 'bus', 'jadwal_bus.id_bus = bus.id_bus')
                ->orderBy('id_karcis', 'asc')
                ->all();
             
            return $this->render('viewkarcis',[
            'query'=>$query,
            'model'=>$model,
        ]);
    }

   
}

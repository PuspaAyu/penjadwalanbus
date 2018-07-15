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
        $jadwal = Jadwalbus::find()->where(['tanggal'=>date('Y-m-d')])->all();

        $tempviewjadwal = array();
        foreach ($jadwal as $key) {
            $bus = Bus::find()->where(['id_bus'=>$key->id_bus])->one();
            array_push($tempviewjadwal, [
                'jam'=>$bus->jam_operasional,
                'id_bus'=>$bus->no_polisi, 
                'id_jurusan'=>$key->id_jurusan,
                'id_sopir'=>$key->id_sopir, 
                'id_kondektur'=>$key->id_kondektur
            ]);
        }
        return $this->render('viewjadwal',
        ['tempviewjadwal'=>$tempviewjadwal,
        ]);
    }
}

<?php
//INI BUAT NGGANTI NAVBAR, KALO MAU NGGANTI CONTENT DI YANG FOLDER SITE//
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
<?php
    $level = array("1"=>"KABAG","2"=>"KEUANGAN",
    "3"=>"KARCIS");

    //isGuest = ketika belum login
    if(Yii::$app->user->isGuest) $judulnya = "SISEKAMIRA"; 
    else $judulnya = $level[Yii::$app->user->identity->level];

    NavBar::begin([
        'brandLabel' => $judulnya,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        //level kabag
        if(Yii::$app->user->identity->level == 1){
            $menuItems = [
                //['label' => 'KEUANGAN', 'url' => ['/kabag/index']]
                ['label' => 'Data Pegawai', 'url' => ['/site/about']],
                ['label' => 'Data Bus', 'url' => ['/']],
                ['label' => 'Data ...', 'url' => ['/']],
            ];
        } 

        //level Keuangan
        elseif(Yii::$app->user->identity->level == 2){
            $menuItems = [
                ['label' => 'Setoran', 'url' => ['/']],
                ['label' => 'Gaji', 'url' => ['/']],
            ];
        }

        //level Karcis
        else{
            $menuItems = [
                ['label' => 'Data Stok', 'url' => ['/']],
                ['label' => 'Data Karcis', 'url' => ['/']],
            ];
        }

        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

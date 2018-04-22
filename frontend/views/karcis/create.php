<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Karcis */

$this->title = 'Create Karcis';
$this->params['breadcrumbs'][] = ['label' => 'Karcis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karcis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

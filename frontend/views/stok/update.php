<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Stok */

$this->title = 'Update Stok: ' . $model->id_stok;
$this->params['breadcrumbs'][] = ['label' => 'Stoks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_stok, 'url' => ['view', 'id' => $model->id_stok]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stok-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

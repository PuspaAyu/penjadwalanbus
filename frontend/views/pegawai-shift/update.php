<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\PegawaiShift */

$this->title = 'Update Pegawai Shift: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Pegawai Shifts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pegawai-shift-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

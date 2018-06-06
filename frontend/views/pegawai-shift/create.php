<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\PegawaiShift */

$this->title = 'Create Pegawai Shift';
$this->params['breadcrumbs'][] = ['label' => 'Pegawai Shifts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-shift-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

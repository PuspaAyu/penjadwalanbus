<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Izin */

$this->title = 'Update Izin: ' . $model->id_izin;
$this->params['breadcrumbs'][] = ['label' => 'Izins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_izin, 'url' => ['view', 'id' => $model->id_izin]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="izin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Bus */

$this->title = 'Update Bus: ' . $model->id_bus;
$this->params['breadcrumbs'][] = ['label' => 'Buses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bus, 'url' => ['view', 'id' => $model->id_bus]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bus-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

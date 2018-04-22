<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tilangan */

$this->title = 'Update Tilangan: ' . $model->id_tilangan;
$this->params['breadcrumbs'][] = ['label' => 'Tilangans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tilangan, 'url' => ['view', 'id' => $model->id_tilangan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tilangan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

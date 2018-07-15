<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Komplain */

$this->title = 'Update Komplain : ' .$model->id_komplain;
$this->params['breadcrumbs'][] = ['label' => 'Komplains', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_komplain, 'url' => ['view', 'id' => $model->id_komplain]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="komplain-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

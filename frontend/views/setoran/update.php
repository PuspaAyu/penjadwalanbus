<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Setoran */

$this->title = 'Update Setoran: ' . $model->id_setoran;
$this->params['breadcrumbs'][] = ['label' => 'Setorans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_setoran, 'url' => ['view', 'id' => $model->id_setoran]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="setoran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

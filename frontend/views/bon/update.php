<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Bon */

$this->title = 'Update Bon: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Bons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bon, 'url' => ['view', 'id' => $model->id_bon]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bon-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

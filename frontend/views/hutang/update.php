<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Hutang */

$this->title = 'Update Hutang: ' . $model->id_hutang;
$this->params['breadcrumbs'][] = ['label' => 'Hutangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_hutang, 'url' => ['view', 'id' => $model->id_hutang]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hutang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

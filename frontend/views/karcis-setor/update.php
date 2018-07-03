<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\KarcisSetor */

$this->title = 'Update Karcis Setor: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Karcis Setors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_karcis, 'url' => ['view', 'id' => $model->id_karcis]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="karcis-setor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

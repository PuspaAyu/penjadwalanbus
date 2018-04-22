<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Karcis */

$this->title = 'Update Karcis: ' . $model->id_karcis;
$this->params['breadcrumbs'][] = ['label' => 'Karcis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_karcis, 'url' => ['view', 'id' => $model->id_karcis]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="karcis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

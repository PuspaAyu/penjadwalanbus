<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Jurusan */

$this->title = 'Update Jurusan : ' . $model->jurusan;
$this->params['breadcrumbs'][] = ['label' => 'Jurusans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jurusan, 'url' => ['view', 'id' => $model->id_jurusan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jurusan-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

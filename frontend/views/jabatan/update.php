<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Jabatan */

$this->title = 'Update Jabatan: ' . $model->id_jabatan;
$this->params['breadcrumbs'][] = ['label' => 'Jabatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jabatan, 'url' => ['view', 'id' => $model->id_jabatan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jabatan-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

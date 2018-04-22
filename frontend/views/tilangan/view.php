<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tilangan */

$this->title = $model->id_tilangan;
$this->params['breadcrumbs'][] = ['label' => 'Tilangans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tilangan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_tilangan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_tilangan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_tilangan',
            'tanggal_tilangan',
            'denda',
            'jenis_pelanggaran',
            'tempat_kejadian',
            'tanggal_batas_tilang',
            'status',
        ],
    ]) ?>

</div>

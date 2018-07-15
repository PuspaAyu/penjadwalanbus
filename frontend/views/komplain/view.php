<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Komplain */

$this->title = $model->id_komplain;
$this->params['breadcrumbs'][] = ['label' => 'Komplains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="komplain-view">

    <h4><?= Html::encode($this->title) ?></h4>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_komplain], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_komplain], [
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
            'id_komplain',
            'id_jadwal',
            'isi_komplain',
            'tgl_komplain',
        ],
    ]) ?>

</div>

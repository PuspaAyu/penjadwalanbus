<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Izin */

$this->title = $model->id_izin;
$this->params['breadcrumbs'][] = ['label' => 'Izins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_izin], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_izin], [
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
            'id_izin',
            'tgl_izin',
            'jenis_izin',
        ],
    ]) ?>

</div>

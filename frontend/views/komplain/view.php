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

    <h1><?= Html::encode($this->title) ?></h1>

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
            'isi_komplain',
        ],
    ]) ?>

</div>

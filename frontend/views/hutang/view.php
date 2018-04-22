<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Hutang */

$this->title = $model->id_hutang;
$this->params['breadcrumbs'][] = ['label' => 'Hutangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hutang-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_hutang], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_hutang], [
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
            'id_hutang',
            'jumlah_hutang',
            'status_hutang',
            'alasan',
        ],
    ]) ?>

</div>

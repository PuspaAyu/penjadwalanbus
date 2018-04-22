<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Stok */

$this->title = $model->id_stok;
$this->params['breadcrumbs'][] = ['label' => 'Stoks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stok-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_stok], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_stok], [
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
            'id_stok',
            'tipe_karcis',
            'stok_jmlh_karcis',
        ],
    ]) ?>

</div>

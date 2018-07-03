<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\KarcisSetor */

$this->title = $model->id_karcis;
$this->params['breadcrumbs'][] = ['label' => 'Karcis Setors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karcis-setor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_karcis], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_karcis], [
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
            'id_karcis',
            'pergi_awal',
            'pergi_akhir',
            'pulang_awal',
            'pulang_akhir',
            'id_jadwal',
        ],
    ]) ?>

</div>

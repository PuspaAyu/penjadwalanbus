<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Setor */

$this->title = $model->id_setor;
$this->params['breadcrumbs'][] = ['label' => 'Setors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_setor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_setor], [
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
            'id_setor',
            'id_jadwal',
            'solar_pergi',
            'nom_solar_pergi',
            'solar_plg',
            'nom_solar_plg',
            'um_sopir',
            'um_kond',
            'cuci_bis',
            'tpr',
            'tol',
            'siaran',
            'lain_lain',
            'potong_minum',
            'pendapatan_kotor',
            'bersih_perjalanan',
            'total_bersih',
        ],
    ]) ?>

</div>

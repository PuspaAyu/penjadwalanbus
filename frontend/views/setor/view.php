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

    <h4><?= Html::encode($this->title) ?></h4>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_setor], ['class' => 'btn btn-primary btn-sm']) ?>
        <!-- <?= Html::a('Delete', ['delete', 'id' => $model->id_setor], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_setor',
            'id_jadwal',
            'tpr_sby',
            'mandor_sby',
            'tpr_caruban',
            'mandor_caruban',
            'tpr_ngawi',
            'mandor_ngawi',
            'tpr_solo',
            'mandor_solo',
            'tpr_kartosuro',
            'mandor_kartosuro',
            'tpr_salatiga',
            'mandor_salatiga',
            'tpr_semarang',
            'mandor_semarang',
            'rit_1',
            'rit_2',
            'bon_sopir',
            'bon_kondektur',
            'solar_pergi',
            'nom_solar_pergi',
            'solar_plg',
            'nom_solar_plg',
            'um_sopir',
            'um_kond',
            'cuci_bis',
            'tpr2',
            'tol',
            'siaran',
            'lain_lain',
            'potong_minum',
            'pendapatan_kotor',
            'bersih_perjalanan',
            'total_bersih',
            'premi_sopir',
            'premi_kondektur'
        ],
    ]) ?>

</div>

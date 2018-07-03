<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tpr */

$this->title = $model->id_tpr;
$this->params['breadcrumbs'][] = ['label' => 'Tprs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpr-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_tpr], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_tpr], [
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
            'id_tpr',
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
        ],
    ]) ?>

</div>

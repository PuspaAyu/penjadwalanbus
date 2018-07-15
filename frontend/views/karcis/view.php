<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Karcis */

$this->title = $model->id_stok;
$this->params['breadcrumbs'][] = ['label' => 'Karcis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karcis-view">

    <h4><?= Html::encode($this->title) ?></h4>

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
            'seri',
            
        ],
    ]) ?>

</div>

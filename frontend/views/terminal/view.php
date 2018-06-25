<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Terminal */

$this->title = $model->id_terminal;
$this->params['breadcrumbs'][] = ['label' => 'Terminals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terminal-view">

    <h4><?= Html::encode($this->title) ?></h4>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_terminal], ['class' => 'btn btn-primary btn-sm']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_terminal], [
            'class' => 'btn btn-danger btn-sm',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_terminal',
            'terminal',
        ],
    ]) ?>

</div>

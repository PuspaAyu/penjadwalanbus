<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Terminal */

$this->title = 'Update Terminal: ' .$model->terminal;
$this->params['breadcrumbs'][] = ['label' => 'Terminals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_terminal, 'url' => ['view', 'id' => $model->id_terminal]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="terminal-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

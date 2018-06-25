<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Terminal */

$this->title = 'Create Terminal';
$this->params['breadcrumbs'][] = ['label' => 'Terminals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terminal-create">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

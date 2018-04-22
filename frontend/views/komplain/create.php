<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Komplain */

$this->title = 'Create Komplain';
$this->params['breadcrumbs'][] = ['label' => 'Komplains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="komplain-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

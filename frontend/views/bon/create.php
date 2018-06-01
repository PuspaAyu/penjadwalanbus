<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Bon */

$this->title = 'Create Bon';
$this->params['breadcrumbs'][] = ['label' => 'Bons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bon-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Setoran */

$this->title = 'Create Setoran';
$this->params['breadcrumbs'][] = ['label' => 'Setorans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setoran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Setor */

$this->title = 'Update Setor';
$this->params['breadcrumbs'][] = ['label' => 'Setors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_setor, 'url' => ['view', 'id' => $model->id_setor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="setor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

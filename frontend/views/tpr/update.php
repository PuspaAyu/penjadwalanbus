<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tpr */

$this->title = 'Update Tpr: '.$model->id_tpr;
$this->params['breadcrumbs'][] = ['label' => 'Tprs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tpr, 'url' => ['view', 'id' => $model->id_tpr]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tpr-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

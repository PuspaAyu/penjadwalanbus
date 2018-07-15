<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Karcis */

$this->title = 'Update Karcis: ' . $model->id_stok;
$this->params['breadcrumbs'][] = ['label' => 'Karcis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_stok, 'url' => ['view', 'id' => $model->id_stok]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="karcis-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

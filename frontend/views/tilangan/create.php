<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Tilangan */

$this->title = 'Create Tilangan';
$this->params['breadcrumbs'][] = ['label' => 'Tilangans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tilangan-create">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

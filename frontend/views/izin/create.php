<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Izin */

$this->title = 'Create Izin';
$this->params['breadcrumbs'][] = ['label' => 'Izins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-create">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

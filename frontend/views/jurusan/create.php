<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Jurusan */

$this->title = 'Create Jurusan';
$this->params['breadcrumbs'][] = ['label' => 'Jurusans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jurusan-create">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

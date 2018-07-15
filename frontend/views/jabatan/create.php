<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Jabatan */

$this->title = 'Create Jabatan';
$this->params['breadcrumbs'][] = ['label' => 'Jabatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jabatan-create">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

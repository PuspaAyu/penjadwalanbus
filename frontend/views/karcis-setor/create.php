<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\KarcisSetor */

$this->title = 'Create Karcis Setor';
$this->params['breadcrumbs'][] = ['label' => 'Karcis Setors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karcis-setor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

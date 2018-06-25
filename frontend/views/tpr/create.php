<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Tpr */

$this->title = 'Create Tpr';
$this->params['breadcrumbs'][] = ['label' => 'Tprs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpr-create">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

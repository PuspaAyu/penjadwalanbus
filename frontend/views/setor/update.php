<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Setor */

$this->title = 'Update Setor :' . $model->id_jadwal;
$this->params['breadcrumbs'][] = ['label' => 'Setors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_setor, 'url' => ['view', 'id' => $model->id_setor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="setor-update">
	<?= Html::a('<i class="fa fa-arrow-left fa-fw" style="font-size:25px;"></i> Back', ['setor/createsetor?tanggal='.date("2018-07-02")]); ?>
    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
        'data' => $data,
    ]) ?>

</div>

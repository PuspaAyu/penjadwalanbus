<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JabatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jabatan';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jabatan-index">

    <h4><?= Html::encode($this->title) ?></h4>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jabatan', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_jabatan',
            'jenis_jabatan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

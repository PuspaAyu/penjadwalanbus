<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TprSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tprs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpr-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tpr', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tpr',
            'tpr_sby',
            'mandor_sby',
            'tpr_caruban',
            'mandor_caruban',
            //'tpr_ngawi',
            //'mandor_ngawi',
            //'tpr_solo',
            //'mandor_solo',
            //'tpr_kartosuro',
            //'mandor_kartosuro',
            //'tpr_salatiga',
            //'mandor_salatiga',
            //'tpr_semarang',
            //'mandor_semarang',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

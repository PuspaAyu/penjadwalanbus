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
            'terminal',
            'tpr',
            'kemandoran',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

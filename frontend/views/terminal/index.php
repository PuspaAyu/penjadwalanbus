<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TerminalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Terminal';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="terminal-index">

    <h4><?= Html::encode($this->title) ?></h4>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Terminal', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_terminal',
            'terminal',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

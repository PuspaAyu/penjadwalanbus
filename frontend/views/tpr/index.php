<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Terminal;
use frontend\models\Tpr;
use frontend\models\Bus;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TprSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tpr';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpr-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tpr', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                            DATA BUS
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body responsive">
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_tpr">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Terminal</th>
                                        <th>Tpr</th>
                                        <th>Kemandoran</th>
                                        <th>Id Setor</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n=0; foreach ($query as $item): $n++;?>
                                    <tr>
                                        <td><?= $n; ?></td>
                                        <td><?= $item['terminal']; ?></td>
                                        <td><?= $item['tpr']; ?></td>
                                        <td><?= $item['kemandoran']; ?></td>
                                        <td><?= $item['id_setor']; ?></td>
                                        <td>
                                            <?= Html::a('<i class="fa fa-eye"></i>', ['view', 'id'=>$item['id_tpr']]) ?>
                                            <?= Html::a('<i class="fa fa-pencil"></i>', ['update', 'id'=>$item['id_tpr']]) ?>
                                            <?= Html::a('<i class="fa fa-trash-o"></i>', ['delete', 'id'=>$item['id_tpr']], ['data-method' => 'post']) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
</div>

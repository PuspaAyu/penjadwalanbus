<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use frontend\models\Karcis;
use frontend\models\Stok;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\KarcisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Karcis';
$this->params['breadcrumbs'][] = $this->title;
?>

   <!-- DataTables CSS -->
<head>
    <link href="http://localhost/puspa/penjadwalanbus/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="http://localhost/puspa/penjadwalanbus/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
</head>

<script src="http://localhost/puspa/penjadwalanbus/vendor/datatables/js/jquery.js"></script>

<div class="karcis-index">

    <h4><?= Html::encode($this->title) ?></h4>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Karcis', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>
    

     <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DATA KARCIS
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_karcis">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tipe Karcis</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n=0; foreach ($query as $item): $n++;?>
                                    <tr>
                                        <td><?= $n; ?></td>
                                        <td><?= $item['seri']; ?></td>

                                        <td>
                                            <?= Html::a('<i class="fa fa-eye"></i>', ['view', 'id'=>$item['id_karcis']]) ?>
                                            <?= Html::a('<i class="fa fa-pencil"></i>', ['update', 'id'=>$item['id_karcis']]) ?>
                                            <?= Html::a('<i class="fa fa-trash-o"></i>', ['delete', 'id'=>$item['id_karcis']], ['data-method' => 'post']) ?>
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


    <!-- DataTables JavaScript -->
    
    <script src="http://localhost/puspa/penjadwalanbus/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="http://localhost/puspa/penjadwalanbus/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="http://localhost/puspa/penjadwalanbus/vendor/datatables-responsive/dataTables.responsive.js"></script>




<script>
//$.noConflict();
jQuery( document ).ready(function( $ ) {
    $('#tabel_karcis').DataTable();
});
// Code that uses other library's $ can follow here.
</script>



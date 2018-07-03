    <?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TilanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tilangan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tilangan-index">

    <h4><?= Html::encode($this->title) ?></h4>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tilangan', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>
    
    
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DATA TILANGAN
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body responsive">
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_bus">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Tilangan</th>
                                        <th>Id Jadwal</th>
                                        <th>Denda</th>
                                        <th>Jenis Pelanggaran</th>
                                        <th>Tempat Kejadian</th>
                                        <th>Tanggal Batas Tilang</th>
                                        <th>Tanggal Sekarang</th>
                                        <th>Selisih</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n=0; foreach ($alert as $item): $n++;?>
                                    <tr>
                                        <td><?= $n; ?></td>
                                        <td><?= $item['id_tilangan']; ?></td>
                                        <td><?= $item['id_jadwal']; ?></td>
                                        <td><?= $item['denda']; ?></td>
                                        <td><?= $item['jenis_pelanggaran']; ?></td>
                                        <td><?= $item['tempat_kejadian']; ?></td>
                                        <td><?= $item['tanggal_batas_tilang']; ?></td>
                                        <td><?= $item['tgl_sekarang']; ?></td>
                                        <td><?= $item['selisih']; ?></td>
                                        <td><?= ($item['status'] == 1) ? "Belum" : "Sudah"; ?></td>
                                        <td>
                                            <?= Html::a('<i class="fa fa-eye"></i>', ['view', 'id'=>$item['id_tilangan']]) ?>
                                            <?= Html::a('<i class="fa fa-pencil"></i>', ['update', 'id'=>$item['id_tilangan']]) ?>
                                            <?= Html::a('<i class="fa fa-trash-o"></i>', ['delete', 'id'=>$item['id_tilangan']], ['data-method' => 'post']) ?>
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

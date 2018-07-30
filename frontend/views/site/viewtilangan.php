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

   <br>
    
    <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-info">
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
                                        <th>No Polisi</th>
                                        <th>Denda</th>
                                        <th>Jenis Pelanggaran</th>
                                        <th>Tempat Kejadian</th>
                                        <th>Tanggal Batas Tilang</th>
                                        <th>Tanggal Sekarang</th>
                                        <th>Selisih</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n=0; foreach ($alert as $item): $n++;?>
                                    <tr>
                                        <td><?= $n; ?></td>
                                        <td><?= $item['no_polisi']; ?></td>
                                        <td><?= $item['denda']; ?></td>
                                        <td><?= $item['jenis_pelanggaran']; ?></td>
                                        <td><?= $item['tempat_kejadian']; ?></td>
                                        <td><?= $item['tanggal_batas_tilang']; ?></td>
                                        <td><?= $item['tgl_sekarang']; ?></td>
                                        <td><?= $item['selisih']; ?></td>
                                        <td><?= ($item['status'] == 1) ? "Belum" : "Sudah"; ?></td>
                                        
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

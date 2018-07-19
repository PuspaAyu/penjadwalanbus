<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\models\Jadwalbus;
use yii\models\Bus;
use yii\models\Pegawai;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JadwalbusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jadwal Bus';
//$this->params['breadcrumbs'][] = $this->title;

?>


<div class="jadwalbus-show">

    <h4><?= Html::encode($this->title) ?></h4>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Kirim SMS', ['create'], ['class' => 'btn btn-danger btn-sm']) ?>
    </p>
    
    <div class="panel panel-primary responsive">
        <div class="panel-heading">
          List Jadwal
        </div>
        <div class = "panel-body responsive">
          <div class="table-responsive">
            <table class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jam Operasional</th>
                  <th>No Polisi</th>
                  <th>Status</th>
                  <th>Jurusan</th>
                  <th>Sopir</th>
                  <th>Kondektur</th>
                  <!-- <th>Aksi</th> -->
                </tr>
              </thead>
              <tbody>
                <?php $n=0; foreach ($jadwal as $item): $n++;?>            
                  <tr>
                  <form method="post" action="<?= Url::to(['jadwalbus/save', 'id' => $item['id_jadwal']]); ?>">
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                    <td><?= $n;?></td>
                    <td>
                      <?= $item['jam_operasional']; ?> 
                      <span style="float: right;"><?= ($n > 37) ? 'malam': 'pagi'; ?></span>
                    </td>
                    <td><?= $item['no_polisi']; ?></td>
                    <td><?= $item['status']; ?></td>
                    <td><?= $item['jurusan']; ?></td>
                    <!-- <td><?= $item['sopir']; ?></td> -->
                    <td>
                      <?php if($item['id_sopir'] == 0){ ?>
                      <?= Html::dropDownList('supir', null, $supir, ['prompt'=>'-select supir-', 'class'=>'form-control']); ?>
                      <?php } else { 
                        echo $item['sopir']; 
                        echo Html::input('hidden', 'sopir', $item['id_sopir']);
                      } ?>
                    </td>
                    <!-- <td><?= $item['kondektur']; ?></td> -->
                    <td>
                      <?php if($item['id_kondektur'] == 0) { ?>
                      <?= Html::dropDownList('kondektur', null, $kondektur, ['prompt'=>'-select kondektur-', 'class'=>'form-control']); ?>
                      <?php } else { 
                        echo $item['kondektur']; 
                        echo Html::input('hidden', 'kondektur', $item['id_kondektur']);
                      } ?>
                    </td>
                    <!-- <td>
                      <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-xs']) ?>
                      <?= Html::submitButton('Edit', ['class' => 'btn btn-warning btn-xs']) ?>
                    </td> -->
                  </form>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

    </div>
   
</div>

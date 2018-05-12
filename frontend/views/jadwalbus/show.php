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

$this->title = 'Jadwalbuses';
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="jadwalbus-show">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jadwalbus', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Generate', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    
    <div class="panel panel-primary">
        <div class="panel-heading">
          <input class="form-control" type="text" value="<?= date('Y-m-d');?>" />
        </div>
        <div class = "panel-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jam Operasional</th>
                  <th>No Polisi</th>
                  <th>Jurusan</th>
                  <th>Sopir</th>
                  <th>Kondektur</th>
                  <th>Aksi</th>
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
                      <span style="float: right;"><?= ($n > 43) ? 'malam': 'pagi'; ?></span>
                    </td>
                    <td><?= $item['no_polisi']; ?></td>
                    <td><?= $item['jurusan']; ?></td>
                    <!-- <td><?= $item['sopir']; ?></td> -->
                    <td>
                      <?= Html::dropDownList('supir', null, $supir, ['name'=> 'Sopir', 'prompt'=>'-select supir-', 'class'=>'form-control', 'id'=>'jadwal-supir'.$n, 'onchange'=>'$.post("supir/"+$(this).val(), function(data){ $("select#jadwal-supir").html(data)});']); ?>
                    </td>
                    <!-- <td><?= $item['kondektur']; ?></td> -->
                    <td>
                      <?= Html::dropDownList('kondektur', null, $kondektur, ['prompt'=>'-select kondektur-', 'class'=>'form-control', 'name'=>'Kondektur']); ?>
                    </td>
                    <td>
                      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </td>
                  </form>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
        </div>

    </div>
   
</div>

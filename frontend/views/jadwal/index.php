<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Jadwal;
use frontend\models\Pegawai;
use frontend\models\Bus;

$this->title = 'COBA TIDAK GII';

// foreach ($jadwalBus as $jadwal) {
// 	var_dump($jadwal);
// }
// die();
?>
<h1>jadwalbus/index</h1>

<table class="table table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Jam Operasional</th>
			<th>Nopol</th>
			<th>Sopir</th>
			<th>Kondektur</th>
		</tr>
	</thead>
	<tbody>
		<?php $n=0; foreach ($jadwalBus as $key) { $n++; ?>
		<?php $bus = Bus::find()->where(['id_bus'=>$key['id_bus']])->one();?>
		<?php $pegawai = Pegawai::find()->where(['id_pegawai'=>$key['id_pegawai']])->one();?>
		<?php 
		$data = Pegawai::find()->where(['jabatan' => 'sopir', 'id_pegawai'=>$key['id_pegawai']])->one(); 
		?>
		<?php 
		$kon = Pegawai::find()->where(['jabatan' => 'Kondektur'])->one(); 
		?>
		<tr>
			<td><?php echo $n;?></td>
			<td><?php echo Html::encode($bus['jam_operasional']);?></td>
			<td><?php echo Html::encode($bus['no_polisi']);?></td>
			<td><?php echo Html::encode($data['nama']);?></td>
			<td><?php echo Html::encode($kon['nama']);?></td>
		</tr>
		<?php } ?>
	</tbody>
	
</table>
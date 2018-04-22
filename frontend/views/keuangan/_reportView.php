<?php
// use yii\helpers\Html;
// use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
use app\models\Guru;
use app\models\Mapelsatuan;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Penjadwalan SMPN 3 Taman';
$dataJenjang = $data['jenjang']->getModels();
// print_r($dataJenjang);
// echo $tahunAjar;
$data['Kelas'] = $data['Kelas']->getModels();
$data['Hari'] = $data['Hari']->getModels();
?>
<?php foreach ($dataJenjang as $keyJenjang) {?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h4>Jenjang <?=$keyJenjang['nama_jenjang']?> <?=$data['tahunAjar']?></h4>
	</div>
	<div class="panel-body">
		<?php foreach($data['Kelas'] as $keyKelas){?>
		<p>Kelas <b><?=$keyKelas['nama_kelas']?></b></p>
		<table class="table table-bordered">
			<tbody>
				<?php foreach($data['Hari'] as $keyHari){
					if ($keyHari['nama_hari']=='Minggu') {
						continue;
					}
				?>
				<tr>
					<th><?=$keyHari['nama_hari']?></th>
					<?php  $dataMapel = Yii::$app->db->createCommand('SELECT * FROM jadwal WHERE nama_hari=\''.$keyHari['nama_hari'].'\' AND idjenjang='.$keyJenjang['idjenjang'].' AND idkelas='.$keyKelas['idkelas'].' AND tahun_ajar=\''.$data['tahunAjar'].'\'')->queryAll();
						// print_r($dataMapel);
						$l=0;
						foreach ($dataMapel as $keyMapel) {
							if($keyMapel['idmapel']==null){
								$namaMapel = '--';	
							}else
								$namaMapel = Mapelsatuan::find()->where(['idsat'=>$keyMapel['idmapel']])->one()->getAttribute('nama_satuan');
							if($keyMapel['idguru']==null){
								$namaGuru = '--';
							}else{
								$namaGuru = Guru::find()->where(['idguru'=>$keyMapel['idguru']])->one()->getAttribute('nama_guru');
							}
							echo "<td width='150px'><center>".($l+1)."<br/>";
		                    echo '<b>'.$namaMapel."</b><br/>".$namaGuru;
		                    echo "</center></td>";
		                    $l++;
						}
					?>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php }?>
	</div>
</div>
<?php }?>
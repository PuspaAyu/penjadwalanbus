<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Bus;

$this->title = 'Demo Query Builder yii2';

?>

<h1>Daftar Bus </h1>

<p>Data berikut diambil dengan menggunakan query builder:</p>
<!-- <pre>
	$query1 = (new \yii\db\Query())
				->select(['*'])
				->from('bus')
				->all();
</pre> -->
<pre>
	$query = Bus::find()->all();
</pre>
<p>==>return <? count($query1) ?> rows</p>
<table class='table table-bordered table-striped'>
	<thead>
		<tr>
			<td>ID</td>
			<td>No Polisi</td>
			<td>Jam Operasional</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($query1 as $bus): ?>
			<tr>
				<td><?= $bus['id_bus'] ?></td>
				<td><?= $bus['no_polisi'] ?></td>
				<td><?=$bus['jam_operasional']	?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
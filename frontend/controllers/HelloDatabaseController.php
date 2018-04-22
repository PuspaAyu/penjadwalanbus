<?php
namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use frontend\models\Bus;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\helpers\ArrayHelper;

class HelloDatabaseController extends \yii\web\Controller
{
	// public function actions()
	// {
	// 	return [
	// 		'error' => [
	// 			'class' => 'yii\web\ErrorAction',
	// 		],
	// 	];
	// }

	// public function actionIndex()
	// {
	// 	$query1 = (new \yii\db\Query())
	// 				->select(['*'])
	// 				->from('bus')
	// 				->all();

	// 	$query2 = (new \yii\db\Query())
	// 				->select(['*'])
	// 				->from('bus')
					
	// 				->orderBy('jam_operasional')
	// 				->all();

	// 	return $this->render('index',[
	// 					'query1'=>$query1,
	// 					'query2'=>$query2,
	// 				]);
	// }
	public function actionIndex()
	{
		$query1 = Bus::find()->all();

		return $this->render('index',[
			'query1' => $query1
		]);
	}

	// public function actionCreate()
	// {
	// 	$bus = new Bus();
	// 	$bus->no_polisi = '2345';
	// 	$bus->jam_operasional = '08';
	// 	$bus->save();

	// 	//==berhubungan dengan view dimana 'message' itu nama file di view, lalu yang 'method' manggil php yang ada di message
	// 	return $this->render('message', ['method'=>__METHOD__]);
	// }
}
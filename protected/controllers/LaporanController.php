<?php

class LaporanController extends Controller
{
	public function actionIndex()
	{

		$years = Yii::app()->db->createCommand()
			->select('YEAR(created_at) as tahun')
			->from('pendaftaran_pasien')
			->group('YEAR(created_at)')
			->queryColumn();

		$data = array();

		foreach ($years as $tahun) {
			$count = Yii::app()->db->createCommand()
				->select('COUNT(*)')
				->from('pendaftaran_pasien')
				->where('YEAR(created_at) = :tahun', array(':tahun' => $tahun))
				->queryScalar();

			$data[] = array($count, $tahun);
		}

		$this->render('index', array('data'=>$data,));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}

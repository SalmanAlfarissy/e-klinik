<?php

class LaporanController extends Controller
{
	public function actionIndex()
	{
		$chartData = array(
			array('name' => 'Januari', 'y' => 100),
			array('name' => 'Februari', 'y' => 150),
			array('name' => 'Maret', 'y' => 200),
			array('name' => 'April', 'y' => 180),
			array('name' => 'Mei', 'y' => 250),
			array('name' => 'Juni', 'y' => 300),
		);
	
		$this->render('index', array('chartData' => $chartData));
	}

	public function actionGraph()
    {
        require_once(Yii::app()->basePath . '/extensions/jpgraph/src/jpgraph.php');
        require_once(Yii::app()->basePath . '/extensions/jpgraph/src/jpgraph_line.php');

        $data = array(40, 21, 17, 14, 23);

        $graph = new Graph(400, 300);
        $graph->SetScale("textlin");

        $lineplot = new LinePlot($data);
        $graph->Add($lineplot);

        $graph->title->Set("Contoh Grafik Garis");

        $graph->Stroke();
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
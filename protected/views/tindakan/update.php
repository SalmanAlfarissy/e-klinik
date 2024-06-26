<?php
/* @var $this TindakanController */
/* @var $model Tindakan */

$this->breadcrumbs=array(
	'Tindakan'=>array('index'),
	$model->nama=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tindakan', 'url'=>array('index')),
	array('label'=>'Create Tindakan', 'url'=>array('create')),
	array('label'=>'View Tindakan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tindakan', 'url'=>array('admin')),
);
?>

<h1>Update Tindakan <?php echo $model->nama; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
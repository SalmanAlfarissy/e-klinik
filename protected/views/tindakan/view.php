<?php
/* @var $this TindakanController */
/* @var $model Tindakan */

$this->breadcrumbs=array(
	'Tindakan'=>array('index'),
	$model->nama,
);

$this->menu=array(
	array('label'=>'List Tindakan', 'url'=>array('index')),
	array('label'=>'Create Tindakan', 'url'=>array('create')),
	array('label'=>'Update Tindakan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tindakan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tindakan', 'url'=>array('admin')),
);
?>

<h1>View Tindakan #<?php echo $model->nama; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nama',
		'deskripsi',
		'biaya',
		'created_at',
	),
)); ?>

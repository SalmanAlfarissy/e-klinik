<?php
/* @var $this InformasiController */
/* @var $model Pembayaran */

$this->breadcrumbs=array(
	'Pembayarans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pembayaran', 'url'=>array('index')),
	array('label'=>'Create Pembayaran', 'url'=>array('create')),
	array('label'=>'View Pembayaran', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pembayaran', 'url'=>array('admin')),
);
?>

<h1>Update Pembayaran <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this TransaksiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'List Pasien',
);

$this->menu=array(
	array('label'=>'Pendaftaran Pasien', 'url'=>array('create')),
	array('label'=>'Manage Pasien', 'url'=>array('admin')),
);
?>

<h1>List Pasien</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

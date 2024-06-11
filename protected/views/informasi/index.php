<?php
/* @var $this InformasiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Informasi',
);

$this->menu=array(
	array('label'=>'Manage Pembayaran', 'url'=>array('admin')),
);
?>

<h1>List Informasi Pembayaran</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

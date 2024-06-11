<?php
/* @var $this InformasiController */
/* @var $model Pembayaran */

$this->breadcrumbs=array(
	'Informasi'=>array('index'),
	'Pembayaran',
);

$this->menu=array(
	array('label'=>'Informasi', 'url'=>array('index')),
	array('label'=>'Manage Pembayaran', 'url'=>array('admin')),
);
?>

<h1>Pembayaran # <?php echo $pasien->nama_pasien ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'pasien'=>$pasien)); ?>
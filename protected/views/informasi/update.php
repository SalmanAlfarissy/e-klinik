<?php
/* @var $this InformasiController */
/* @var $model Pembayaran */

$this->breadcrumbs=array(
	'Pembayaran'=>array('index'),
	$pasien->id=>array('index','id'=>$pasien->nama_pasien),
	'Pembayaran',
);

$this->menu=array(
	array('label'=>'Manage Pembayaran', 'url'=>array('admin')),
);
?>

<h1>Pembayaran <?php echo $pasien->nama_pasien; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'pasien'=>$pasien)); ?>
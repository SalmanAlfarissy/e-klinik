<?php
/* @var $this InformasiController */
/* @var $model Pembayaran */

$this->breadcrumbs=array(
	'Pembayaran'=>array('index'),
	'Pembayaran',
);

?>

<h1>Create Pembayaran</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'pasien'=>$pasien)); ?>
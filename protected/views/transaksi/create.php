<?php
/* @var $this TransaksiController */
/* @var $model PendaftaranPasien */

$this->breadcrumbs=array(
	'Transaksi'=>array('index'),
	'Pendaftaran Pasien',
);

$this->menu=array(
	array('label'=>'List PendaftaranPasien', 'url'=>array('index')),
	array('label'=>'Manage PendaftaranPasien', 'url'=>array('admin')),
);
?>

<h1>Pendaftaran Pasien</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
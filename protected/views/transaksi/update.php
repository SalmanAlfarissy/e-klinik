<?php
/* @var $this TransaksiController */
/* @var $model PendaftaranPasien */

$this->breadcrumbs=array(
	'Transaksi'=>array('index'),
	$model->nama_pasien=>array('view','id'=>$model->id),
	'Update Data Pasien',
);

$this->menu=array(
	array('label'=>'List PendaftaranPasien', 'url'=>array('index')),
	array('label'=>'Create PendaftaranPasien', 'url'=>array('create')),
	array('label'=>'View PendaftaranPasien', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PendaftaranPasien', 'url'=>array('admin')),
	array('label'=>'Tindakan dan Obat Pasien', 'url'=>array('tindakanObat', 'id'=>$model->id)),
);
?>

<h1>Update Data Pasien <?php echo $model->nama_pasien; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this TransaksiController */
/* @var $model PendaftaranPasien */

$this->breadcrumbs=array(
	'Tindakan dan Obat'=>array('index'),
	$model->nama_pasien,
);

$this->menu=array(
	array('label'=>'List Pasien', 'url'=>array('index')),
	array('label'=>'Pendaftaran Pasien', 'url'=>array('create')),
	array('label'=>'Update Data Pasien', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Manage Pasien', 'url'=>array('admin')),
);
?>

<h1>Data Pasien #<?php echo $model->nama_pasien; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nama_pasien',
		'jenis_kelamin',
		'tanggal_lahir',
		'umur',
	),
)); ?>

<?php $this->renderPartial('_formTindakan', array('pasienTindakan'=>$pasienTindakan, 'pasienObat'=>$pasienObat)); ?>

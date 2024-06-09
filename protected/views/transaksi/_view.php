<?php
/* @var $this TransaksiController */
/* @var $data PendaftaranPasien */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_pasien')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nama_pasien), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_kelamin')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_kelamin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat_pasien')); ?>:</b>
	<?php echo CHtml::encode($data->alamat_pasien); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_lahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('umur')); ?>:</b>
	<?php echo CHtml::encode($data->umur); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

</div>
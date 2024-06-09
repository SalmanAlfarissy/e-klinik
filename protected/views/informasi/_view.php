<?php
/* @var $this InformasiController */
/* @var $data Pembayaran */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('pendaftaran_pasien_id')); ?>:</b>
	<?php echo CHtml::encode($data->pendaftaran_pasien_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_biaya')); ?>:</b>
	<?php echo CHtml::encode($data->total_biaya); ?>
	<br />

</div>
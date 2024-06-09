<?php
/* @var $this InformasiController */
/* @var $model Pembayaran */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pembayaran-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php
		$harga_obat = 0;
		foreach ($pasien->pasienObats as $item) {
			$harga_obat += ((float) Obat::model()->find($item->id)->harga * $item->jumlah);
		} 

		$biaya_tindakan = 0;
		foreach ($pasien->pasienTindakans as $item) {
			$biaya_tindakan += (float) Tindakan::model()->find($item->id)->biaya;
		} 

		$total_biaya = $harga_obat + $biaya_tindakan;
	 ?> 

	<div class="row">
		<?php echo $form->labelEx($model,'total_biaya'); ?>
		<?php echo $form->numberField($model,'total_biaya',array('size'=>10,'maxlength'=>10, 'value'=>$total_biaya)); ?>
		<?php echo $form->error($model,'total_biaya'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Pay'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
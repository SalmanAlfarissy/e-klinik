<?php
/* @var $this InformasiController */
/* @var $model Pembayaran */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'nama_pasien'); ?>
		<?php echo $form->textField($model,'nama_pasien'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'tanggal_pebayaran'); ?>
		<?php echo $form->textField($model,'tanggal_pebayaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_biaya'); ?>
		<?php echo $form->textField($model,'total_biaya',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
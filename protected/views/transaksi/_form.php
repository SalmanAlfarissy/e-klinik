<?php
/* @var $this TransaksiController */
/* @var $model PendaftaranPasien */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pendaftaran-pasien-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_pasien'); ?>
		<?php echo $form->textField($model,'nama_pasien',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nama_pasien'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jenis_kelamin'); ?>
		<?php echo $form->dropDownList($model, 'jenis_kelamin', array(
			'laki-laki' => 'Laki-Laki',
			'perempuan' => 'Perempuan',
		), array('prompt'=>'Pilih Jenis Kelamin')); ?>
		<?php echo $form->error($model,'jenis_kelamin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat_pasien'); ?>
		<?php echo $form->textArea($model,'alamat_pasien',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'alamat_pasien'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_lahir'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'tanggal_lahir',
			'options' => array(
				'showAnim' => 'fold',
				'dateFormat' => 'yy-mm-dd',
				'changeMonth' => true,
				'changeYear' => true,
				'yearRange' => '1900:'. date('Y'),
			),
			'htmlOptions' => array(
				'style' => 'height:20px;',
			),
		));
		?>
		<?php echo $form->error($model,'tanggal_lahir'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
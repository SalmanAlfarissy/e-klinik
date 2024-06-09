<?php
/* @var $this PasienTindakanController */
/* @var $model PasienTindakan */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'pasien-tindakan-_formTindakan-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// See class documentation of CActiveForm for details on this,
		// you need to use the performAjaxValidation()-method described there.
		'enableAjaxValidation' => false,
	)); ?>

	<table class="detail-view">
		<tbody>
			<tr class="odd">
				<th><?php echo $form->labelEx($pasienTindakan, 'tindakan_id'); ?></th>
				<td>
					<?php
					$options = Tindakan::getListData();
					echo $form->dropDownList($pasienTindakan, 'tindakan_id', $options, array('multiple' => 'multiple', 'size' => 5, 'style' => 'width:50%; height:100px;'));
					?>
					<?php echo $form->error($pasienTindakan, 'tindakan_id'); ?>
				</td>
			</tr>
		</tbody>
	</table>
	<br>

	<button type="button" id="addRow">Add Row</button>
	<button type="button" id="removeRow">Remove Row</button>
	<table id="itemTable" class="detail-view">
		<tbody>
			<tr class="even">
				<th colspan="2" style="text-align: center;">Obat</th>
			</tr>

			<tr class="even">
				<th style="text-align: center;">Obat</th>
				<th style="text-align: center;">Jumlah</th>
			</tr>

			<tr class="item-row even">
				<td style="text-align: center;"><?php echo $form->dropDownList($pasienObat, 'obat_id[]', Obat::getObat(), array('prompt'=>'Pilih Obat')); ?></td>
				<td style="text-align: center;"><?php echo $form->numberField($pasienObat, 'jumlah[]', array('style' => 'width:50%')); ?></td>
			</tr>
		</tbody>
	</table>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#addRow").click(function() {
				var newRow = $('<tr class="item-row even">' +
								`<td style="text-align: center;"><?php echo $form->dropDownList($pasienObat, 'obat_id[]', Obat::getObat(), array('prompt'=>'Pilih Obat')); ?></td>` +
								`<td style="text-align: center;"><?php echo $form->numberField($pasienObat, 'jumlah[]', array('style' => 'width:50%')); ?></td>` +
								'</tr>');
				$("#itemTable").append(newRow);
			});

			$("#removeRow").click(function() {
				if ($("#itemTable tr.item-row").length > 1) {
					$("#itemTable tr.item-row:last").remove();
				}
			});
		});
	</script>


</div><!-- form -->
<?php
/* @var $this InformasiController */
/* @var $model Pembayaran */
/* @var $form CActiveForm */
$totalBiayaObat = 0;
$totalBiayaTindakan = 0;
?>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'pembayaran-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false,
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php $this->widget('zii.widgets.CDetailView', array(
		'data' => $pasien,
		'attributes' => array(
			'nama_pasien',
			'jenis_kelamin',
			'alamat_pasien',
			'tanggal_lahir',
			'umur',
		),
	)); ?>

	<br>

	<table id="itemTable" class="detail-view">
		<tbody>

			<tr class="even">
				<th style="text-align: center;">Obat - Qty</th>
				<th style="text-align: center;">Biaya</th>
			</tr>

			<?php
			$pasienObat = PasienObat::model()->with('obat')->findAllByAttributes(array('pendaftaran_pasien_id' => $pasien->id));
			foreach ($pasienObat as $item) {
			?>
				<tr class="item-row even">
					<td style="text-align: center;"><?php echo  $item['obat']['nama'] . ' - ' . $item['jumlah'] ?></td>
					<td style="text-align: center;"><?php echo $biayaObat = $item['obat']['harga'] * $item['jumlah']; ?></td>
				</tr>
			<?php
			$totalBiayaObat += $biayaObat;
			}
			?>
		</tbody>
	</table>

	<br>

	<table id="itemTable" class="detail-view">
		<tbody>

			<tr class="even">
				<th style="text-align: center;">Tindakan</th>
				<th style="text-align: center;">Biaya</th>
			</tr>

			<?php
			$pasienTindakan = PasienTindakan::model()->with('tindakan')->findAllByAttributes(array('pendaftaran_pasien_id' => $pasien->id));
			foreach ($pasienTindakan as $item) {
			?>
				<tr class="item-row even">
					<td style="text-align: center;"><?php echo  $item['tindakan']['nama'] ?></td>
					<td style="text-align: center;"><?php echo (integer)$biayaTindakan = $item['tindakan']['biaya'] ?></td>
				</tr>
			<?php
			$totalBiayaTindakan += $biayaTindakan; 
			}
			?>
		</tbody>
	</table>

	<br>

	<table id="itemTable" class="detail-view">
		<tbody>
			<tr class="item-row odd">
				<th style="text-align: center;">Total Biaya</th>
				<th style="text-align: center;"><?php echo $form->numberField($model, 'total_biaya', array('size' => 10, 'maxlength' => 10, 'readonly' => true, 'value' =>  $totalBiayaObat + $totalBiayaTindakan)); ?></th>
			</tr>
			<tr class="item-row odd">
				<th style="text-align: center;"><?php echo $form->labelEx($model, 'total_bayar'); ?></th>
				<th style="text-align: center;">
					<?php echo $form->numberField($model, 'total_bayar', array('size' => 10, 'maxlength' => 10,)); ?>
					<?php echo $form->error($model, 'total_bayar'); ?>
				</th>

			</tr>
			<tr class="item-row odd">
				<th style="text-align: center;">Kembalian</th>
				<th style="text-align: center;">
					<input type="number" id="Kembalian" size="10" maxlength="10" readonly>
				</th>
			</tr>
		</tbody>
	</table>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Bayar'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
$(document).ready(function(){
    $('input[type="number"]').on('input', function() {
        var Pembayaran_total_biaya = parseFloat($('#Pembayaran_total_biaya').val());
        var Pembayaran_total_bayar = parseFloat($('#Pembayaran_total_bayar').val());
        var Kembalian = Pembayaran_total_bayar - Pembayaran_total_biaya;
        $('#Kembalian').val(Kembalian);
    });
});
</script>
<?php
/* @var $this InformasiController */
/* @var $model Pembayaran */

$this->breadcrumbs=array(
	'Informasi'=>array('index'),
	$model->pendaftaranPasien->nama_pasien,
);

$this->menu=array(
	array('label'=>'Informasi', 'url'=>array('index')),
	array('label'=>'Manage Pembayaran', 'url'=>array('admin')),
);
?>

<h1>View Detail Informasi #<?php echo $model->pendaftaranPasien->nama_pasien; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model->pendaftaranPasien,
	'attributes' => array(
		'nama_pasien',
		'jenis_kelamin',
		'alamat_pasien',
		'tanggal_lahir',
		'umur',
	),
)); ?>

<table class="detail-view">
	<tbody>
		<tr class="odd">
			<th>Tindakan</th>
			<td>
				<?php
				$pasienTindakan = PasienTindakan::model()->with('tindakan')->findAllByAttributes(array('pendaftaran_pasien_id'=>$model->pendaftaranPasien->id));
				foreach ($pasienTindakan as $value) {
					echo $value['tindakan']['nama'] . ' ,';
				}
				?>
			</td>
		</tr>
		<tr class="odd">
			<th>Total Biaya</th>
			<td>
				<?php
					echo $model->total_biaya;
				?>
			</td>
		</tr>
	</tbody>
</table>

<table id="itemTable" class="detail-view">
	<tbody>
		<tr class="even">
			<th colspan="2" style="text-align: center;">Obat</th>
		</tr>

		<tr class="even">
			<th style="text-align: center;">Obat</th>
			<th style="text-align: center;">Jumlah</th>
		</tr>

		<?php
		$pasienObat = PasienObat::model()->with('obat')->findAllByAttributes(array('pendaftaran_pasien_id'=>$model->pendaftaranPasien->id));
		foreach ($pasienObat as $item) {
		?>
			<tr class="item-row even">
				<td style="text-align: center;"><?php echo  $item['obat']['nama']; ?></td>
				<td style="text-align: center;"><?php echo  $item['jumlah']; ?></td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table>

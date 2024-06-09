<?php
/* @var $this TransaksiController */
/* @var $model PendaftaranPasien */

$this->breadcrumbs=array(
	'Data Pasiens'=>array('index'),
	$model->nama_pasien,
);

$this->menu=array(
	array('label'=>'List Pasien', 'url'=>array('index')),
	array('label'=>'Pendaftaran Pasien', 'url'=>array('create')),
	array('label'=>'Update Data Pasien', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Manage Pasien', 'url'=>array('admin')),
);
?>
<?php 
	if (empty($pasienObat) && empty($pasienTindakan)) {
		$this->menu[] = array('label'=>'Tindakan dan Obat Pasien', 'url'=>array('tindakanObat', 'id'=>$model->id));
	}
?>

<h1>Data Pasien #<?php echo $model->nama_pasien; ?></h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
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
					foreach ($pasienTindakan as $value) {
						echo $value['tindakan']['nama'] . ' ,';
					}
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

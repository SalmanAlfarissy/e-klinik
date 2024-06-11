<?php
/* @var $this InformasiController */
/* @var $data Pembayaran */
?>

<div class="view">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $data,
	'attributes' => array(
		array(
            'name' => 'Nama Pasien',
            'type' => 'raw',
            'value' => CHtml::link(
                CHtml::encode($data->pendaftaranPasien->nama_pasien),
                array('view', 'id' => $data->pendaftaranPasien->id)
            ),
        ),
	),
)); ?>

<table class="detail-view">
	<tbody>
		<tr class="odd">
			<th>Tindakan</th>
			<td>
				<?php
				$pasienTindakan = PasienTindakan::model()->with('tindakan')->findAllByAttributes(array('pendaftaran_pasien_id'=>$data->pendaftaranPasien->id));
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
					echo $data->total_biaya;
				?>
			</td>
		</tr>
		<tr class="odd">
			<th>Status</th>
			<td>
				<?php
					echo "Lunas";
				?>
			</td>
		</tr>
	</tbody>
</table>

</div>
<?php
/* @var $this InformasiController */
/* @var $model Pembayaran */

$this->breadcrumbs=array(
	'Informasi'=>array('index'),
	'Manage Pembayaran',
);

$this->menu=array(
	array('label'=>'Informasi', 'url'=>array('index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pembayaran-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pembayaran</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pembayaran-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'id',
			'value'=>'$row+1',
			'header'=>'No'
		),
		'nama_pasien',
		array(
			'name' => 'total_biaya',
			'value' => '$data->pembayarans->total_biaya ?? 0' 
		),
		array(
			'name' => 'tanggal_pebayaran',
			'value' => '$data->pembayarans->created_at ?? ""'
		),
		array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{payment}',
            'buttons'=>array(
				'view'=>array(
					'url'=>'Yii::app()->createUrl("/informasi/view", array("id"=>$data->pembayarans->id))',
					'visible'=> '!empty($data->pembayarans->id) ?? true',
				),
                'payment'=>array(
                    'label'=>'Payment',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/payment.png',
                    'url'=>'
						empty($data->pasienObats) && empty($data->pasienTindakans) ? 
						Yii::app()->createUrl("/transaksi/tindakanObat", array("id"=>$data->id)) :
						Yii::app()->createUrl("/informasi/create", array("id"=>$data->id))
					',
					'visible'=> 'empty($data->pembayarans->id) ?? false',
                ),
            ),
        ),
	),
)); ?>

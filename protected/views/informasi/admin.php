<?php
/* @var $this InformasiController */
/* @var $model Pembayaran */

$this->breadcrumbs=array(
	'Pembayaran'=>array('index'),
	'Manage Pembayaran',
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

<h1>Manage Pembayarans</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pendaftaran-pasien-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' => 'id',
			'value' => '$row+1',
			'header' => 'No',
		),
		'nama_pasien',
		'pembayarans.total_biaya',
		'pembayarans.created_at',
		array(
            'class'=>'CButtonColumn',
            'template'=>'{payment}',
            'buttons'=>array(
                'payment'=>array(
                    'label'=>'Payment',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/payment.png',
                    'url'=>'Yii::app()->createUrl("/informasi/create", array("id"=>$data->id))',
                ),
                'delete'=>array(
                    'visible'=>'false',
                ),
            ),
        ),
	),
)); ?>

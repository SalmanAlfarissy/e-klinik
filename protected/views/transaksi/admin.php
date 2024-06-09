<?php
/* @var $this TransaksiController */
/* @var $model PendaftaranPasien */

$this->breadcrumbs=array(
	'Transaksi'=>array('index'),
	'Manage Pasien',
);

$this->menu=array(
	array('label'=>'List Pasien', 'url'=>array('index')),
	array('label'=>'Pendaftaran Pasien', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pendaftaran-pasien-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pasien</h1>


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
		'jenis_kelamin',
		'alamat_pasien',
		'tanggal_lahir',
		array(
            'name' => 'umur',
            'value' => '$data->umur',
            'header' => 'Umur',
            'filter'=>false,
			'htmlOptions'=>array('style'=>'width:50px;'),
        ),
		'created_at',
		array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}{tindakan}',
            'buttons'=>array(
                'tindakan'=>array(
                    'label'=>'Tindakan',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/medicine.png',
                    'url'=>'Yii::app()->createUrl("/transaksi/tindakanObat", array("id"=>$data->id))',
                ),
                'delete'=>array(
                    'visible'=>'false',
                ),
            ),
        ),
	),
)); ?>

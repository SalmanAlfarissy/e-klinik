<?php
/* @var $this TindakanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tindakan',
);

$this->menu=array(
	array('label'=>'Create Tindakan', 'url'=>array('create')),
	array('label'=>'Manage Tindakan', 'url'=>array('admin')),
);
?>

<h1>Tindakan</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

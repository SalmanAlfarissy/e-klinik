<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php 
		$currentRoute = Yii::app()->controller->route;
		$isHomeRoute = ($currentRoute === 'site/index' || $currentRoute === '');
		$isUserRoute = strpos($currentRoute, 'user') === 0;
		$isWilayahRoute = strpos($currentRoute, 'wilayah') === 0;
		$isPegaswaiRoute = strpos($currentRoute, 'pegawai') === 0;
		$isTindakanRoute = strpos($currentRoute, 'tindakan') === 0;
		$isObatRoute = strpos($currentRoute, 'obat') === 0;
		$isTransaksiRoute = strpos($currentRoute, 'transaksi') === 0;
		$isSrbacRoute = strpos($currentRoute, 'srbac') === 0;
		$isInformasiRoute = strpos($currentRoute, 'informasi') === 0;
		$isLaporanRoute = strpos($currentRoute, 'laporan') === 0;

		$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site'), 'active'=>$isHomeRoute),
				array('label'=>'User', 'url'=>array('/user'), 'visible'=>Yii::app()->user->checkAccess('admin'), 'active'=>$isUserRoute),
				array('label'=>'Wilayah', 'url'=>array('/wilayah'), 'active'=>$isWilayahRoute),
				array('label'=>'Pegawai', 'url'=>array('/pegawai'), 'active'=>$isPegaswaiRoute),
				array('label'=>'Tindakan', 'url'=>array('/tindakan'), 'active'=>$isTindakanRoute),
				array('label'=>'Obat', 'url'=>array('/obat'), 'active'=>$isObatRoute),
				array('label'=>'SRBAC', 'url'=>array('/srbac'), 'visible'=>Yii::app()->user->checkAccess('admin'),'active'=>$isSrbacRoute),
				array('label'=>'Transaksi', 'url'=>array('/transaksi'), 'active'=>$isTransaksiRoute),
				array('label'=>'Informasi', 'url'=>array('/informasi'), 'active'=>$isInformasiRoute),
				array('label'=>'Laporan', 'url'=>array('/laporan'), 'active'=>$isLaporanRoute),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); 
		?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>

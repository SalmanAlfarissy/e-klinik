<?php
/* @var $this LaporanController */

$this->breadcrumbs=array(
	'Laporan',
);
?>

<h1>Laporan</h1>

<p>Ini adalah halaman laporan.</p>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/vendors/highcharts/code/highcharts.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScript('chart-script', "
    $(function () {
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Penjualan Produk per Bulan'
            },
            xAxis: {
                type: 'category',
                title: {
                    text: 'Bulan'
                }
            },
            yAxis: {
                title: {
                    text: 'Jumlah Penjualan'
                }
            },
            series: [{
                name: 'Penjualan',
                data: " . CJSON::encode($chartData) . "
            }]
        });
    });
");
?>






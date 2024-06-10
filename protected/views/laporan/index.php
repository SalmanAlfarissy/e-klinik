<?php
/* @var $this LaporanController */

$this->breadcrumbs = array(
    'Laporan',
);
?>

<h1>Laporan</h1>

<?php
$array = $data;
$this->widget(
    'jqBarGraph',
    array(
        'values' => $array,
        'type' => 'simple',
        'width' => 400,
        'color1' => '#122A47',
        'color2' => '#1B3E69',
        'space' => 5,
        'title' => 'Jumlah Pasien / Bulan'
    )
);

?>
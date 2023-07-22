<?php
error_reporting(E_ALL & ~E_WARNING);
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
$name = $_SESSION['username'];

include('database.php');
$database = new Database();
$result = $database->runQuery("SELECT product_name,price,quantity FROM product WHERE created_by='$name'");
$header = $database->runQuery("SELECT UCASE(`COLUMN_NAME`) 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='inventorymanagement' 
AND `TABLE_NAME`='product'
and `COLUMN_NAME` in ('product_name','price','quantity')");

require('fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
try {
    if ($result == null) {
        echo '<span style="color:#FF0000; padding-left:450; font-size:50px"><b>"No Products!!!"</b></span>';
    }
    foreach ($header as $heading) {
        foreach ($heading as $column_heading)
            $pdf->Cell(55, 12, $column_heading, 1);
    }foreach ($result as $row) {
        $pdf->Ln();
        foreach ($row as $column)
            $pdf->Cell(55, 12, $column, 1);
    }
    $pdf->Output();

} catch (Exception) {


}

?>
<?php 
/*
require('fpdf/fpdf.php');

$pdf= new FPDF();


$pdf->SetAuthor('Lana Kovacevic');
$pdf->SetTitle('FPDF tutorial');

//$pdf-> AddPage();


$pdf->SetFont('Helvetica','B',20);
$pdf->SetTextColor(50,60,100);

$pdf->AddPage('P');
//$pdf->SetDisplayMode(real,'default');

//$pdf->Image('logo.png',10,20,33,0,' ','http://www.fpdf.org/');

//$pdf->Link(10, 20, 33,33, 'http://www.fpdf.org/');


//$pdf->Cell(100, 20, 'Hello World', 1, 0, 'C');
$pdf->SetXY(50,20);
$pdf->SetDrawColor(50,60,100);
$pdf->Cell(100,10,'FPDF Tutorial',1,0,'C',0);


$pdf->SetXY(10,50);
$pdf->SetFontSize(10);
$pdf->Write(5,'Congratulations! You have generated a PDF. ');

$pdf->Output('example1.pdf','I');
//$pdf->Output();
*/
?>


<?php
include_once("init.php");
include('database.php');
$database = new Database();
$result = $database->runQuery("SELECT * FROM items");
$header = $database->runQuery("SELECT UCASE(`COLUMN_NAME`) 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='posnic' 
AND `TABLE_NAME`='items'
and `COLUMN_NAME` in ('id','itemId','name','unitCost','date','openingCost','receiver','supplier','itemUsed','transfer','dayCost','closingStock')");

require('fpdf/fpdf.php');

$pdf = new FPDF();
// Page Orientation P(portrait), L(landscape)
$pdf->AddPage('L');

$pdf->SetFont('Arial','B',8);

//$pdf->SetFont('Helvetica','B',20);
$pdf->SetTitle('ITEMS USED FOR PRODUCTION ');
//$pdf->SetTitle('ITEMS USED FOR PRODUCTION ');
$pdf->SetTextColor(40,40,130);

//$pdf->SetXY(50,20); // This reduces the font and size of the text
//$pdf->Image('logo.png',10,20,33,0,' ','http://www.fpdf.org/');

foreach($header as $heading) {
	foreach($heading as $column_heading)
		$pdf->Cell(36,12,$column_heading,1,0,'C',1 );
}
foreach($result as $row) {
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(36,12,$column,1,0,'C',0 );
        //$pdf->Ln(); This breaks the line
}

function Footer()
{
$this->SetXY(120,-17);
$this->SetFont('Helvetica','I',10);
$this->Write (5, 'This is a footer');
}
$pdf->Footer();
$pdf->Output();


?> 
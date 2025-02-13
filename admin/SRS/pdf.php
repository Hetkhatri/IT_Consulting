<?php
if (isset($_POST['btn']))
{
	//name
	$title=$_POST['titl'];
	$purpos=$_POST['purpo'];
	$dat=$_POST['dat'];
	$ref=$_POST['referenc'];
	$funt=$_POST['refu'];
	$nonfunt=$_POST['nonfu'];

	require("fpdf/fpdf.php");

	$pdf= new FPDF();
	$pdf->AddPage();

	$pdf->SetFont("Arial","B",13);
	$pdf->Cell(0,10,"Registration Details",1,1,'C');

	$pdf->Cell(60,10,"Project Title.",1,0);
	$pdf->Cell(60,10,"Purpose.",1,0);
	$pdf->Cell(70,10,"issued Date.",1,1);
	$pdf->Cell(20,10,"Any Refrences.",1,0);
	$pdf->Cell(30,10,"Requirements Functional.",1,1);
	$pdf->Cell(20,10,"Non-Functional.",1,1);

	$pdf->cell(60,10,$title,1,0);
	$pdf->cell(60,10,$purpos,1,0);
	$pdf->cell(70,10,$dat,1,1);
	$pdf->cell(40,10,$ref,1,0);
	$pdf->cell(40,10,$funt,1,0);
	$pdf->cell(40,10,$nonfunt,1,0);

	$file=time().'.pdf';

	$pdf->output($file,'D');
}
?>
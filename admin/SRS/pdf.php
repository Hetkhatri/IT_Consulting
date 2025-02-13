<?php
if(!empty($_POST['btn']))
{
	$nam=$_POST['a1'];
	$f_cont=$_POST['c1'];
	// $gender=$_POST['gender'];
	$hobb=$_POST['h1'];

	require("fpdf/fpdf.php");

	$pdf= new FPDF();
	$pdf->AddPage();

	$pdf->SetFont("Arial","B",13);
	$pdf->Cell(0,10,"Registration Details",1,1,'C');

	$pdf->Cell(60,10,"Name.",1,0);
	$pdf->Cell(60,10,"Contact Number.",1,0);
	$pdf->Cell(70,10,"hobby.",1,1);
	//$pdf->Cell(20,10,"age.",1,0);
	//$pdf->Cell(30,10,"address.",1,1);
	//$pdf->Cell(20,10,"city.",1,1);

	$pdf->cell(60,10,$nam,1,0);
	$pdf->cell(60,10,$f_cont,1,0);
	$pdf->cell(70,10,$hobb,1,1);
	//$pdf->cell(40,10,$nam,1,0);

	$file=time().'.pdf';

	$pdf->output($file,'D');
}
?>	
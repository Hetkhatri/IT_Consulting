<?php
if(isset($_POST['btn']))
{
    // Retrieve form values
    $title = $_POST['titl'];
    $purpose = $_POST['purpo'];
    $date = $_POST['dat'];
    $reference = $_POST['referenc'];
    $functional = $_POST['refu'];
    $nonfunctional = $_POST['nonfu'];

    require("fpdf/fpdf.php");

    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 13);
    $pdf->Cell(0, 10, "Registration Details", 1, 1, 'C');

    // Table headers
    $pdf->Cell(60, 10, "Project Title.", 1, 0);
    $pdf->Cell(60, 10, "Purpose.", 1, 0);
    $pdf->Cell(70, 10, "Issued Date.", 1, 1);
    $pdf->Cell(20, 10, "Any References.", 1, 0);
    $pdf->Cell(30, 10, "Requirements Functional.", 1, 1);
    $pdf->Cell(20, 10, "Non-Functional.", 1, 1);

    // Data row
    $pdf->Cell(60, 10, $title, 1, 0);
    $pdf->Cell(60, 10, $purpose, 1, 0);
    $pdf->Cell(70, 10, $date, 1, 1);
    $pdf->Cell(40, 10, $reference, 1, 0);
    $pdf->Cell(40, 10, $functional, 1, 0);
    $pdf->Cell(40, 10, $nonfunctional, 1, 0);

    // Generate filename
    $file = time() . '.pdf';

    // Set headers to prompt download
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . $file . '"');

    // Output the PDF
    $pdf->Output();
}
?>

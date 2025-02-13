<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once __DIR__ . "/fpdf/fpdf.php";

    $titl = $_POST['titl'];
    $pur = $_POST['purpo'];
    $dt = $_POST['dat'];
    $ref = $_POST['referenc'];
    $rf = $_POST['refu'];
    $nf = $_POST['nonfu'];

    // Create PDF instance
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);

    // Title
    $pdf->Cell(190, 10, 'Software Requirement Specification', 0, 1, 'C');
    $pdf->Ln(10);

    // Project Title
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(50, 10, 'Project Title:', 0, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $titl);
    $pdf->Ln(5);

    // Purpose
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(50, 10, 'Purpose:', 0, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $pur);
    $pdf->Ln(5);

    // Issued Date
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(50, 10, 'Issued Date:', 0, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $dt);
    $pdf->Ln(5);

    // Reference
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(50, 10, 'Reference:', 0, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $ref);
    $pdf->Ln(5);

    // Functional Requirements
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(50, 10, 'Functional Requirements:', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $rf);
    $pdf->Ln(5);

    // Non-Functional Requirements
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(50, 10, 'Non-Functional Requirements:', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $nf);
    $pdf->Ln(10);

    // Output PDF
    $pdf->Output('D', 'Final_Requirement_Form.pdf'); // 'D' forces download
    exit;
}
?>
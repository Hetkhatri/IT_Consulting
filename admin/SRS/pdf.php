<?php
    if(!empty($_POST['submit']))
    {
        $titl = $_POST['titl'];
        $pur = $_POST['purpo'];
        $dt = $_POST['dat'];
        $ref = $_POST['referenc'];
        $rf = $_POST['refu'];
        $nf= $_POST['nonfu'];

        require("fpdf/fpdf.php");


        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->output();

    }
?>
<?php
	require("../fpdf/fpdf.php");
	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->SetFont("Arial","B",18);
	$pdf->Cell("",6,'Download file pdf',1,"","C");
	$pdf->Output();
?>
<?php

include('view/reportes/CabezaReport.php');

$pdf = new PDF();

if ($resultRep !="" ) {

	$pdf->Carton = "No.  $Carton";
	$pdf->Titulo  = "Reporte de Documentos por Cartón";
	
	$pdf->AddPage('L');
	
	
	 
	
	
	/*
	$pdf->Cell(0,30, "No.  $Carton",0,0,'C');
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(0,20,utf8_decode("Reporte de Documentos por Cartón"),0,0,'R');
	*/
	
	

	
	//$pdf->AddCol('No.',19,utf8_decode('Fecha'),'L');
	$pdf->AddCol('nombre_subcategorias',30,'SubCategoria','L');
	//$pdf->AddCol('nombre_tipo_documentos',40,'Tipo Documento','L');
	
	$pdf->AddCol('numero_documentos_legal',40,'No. Documento','C');
	$pdf->AddCol('nombre_remitente_documentos_legal',80,'Nombre Remitente','C');
	$pdf->AddCol('nombre_emision_documentos_legal',80,'Nombre Emision','C');
	$pdf->AddCol('numero_control_documentos_legal',40,'No. Control','C');
	$pdf->AddCol('paginas_documentos_legal',20,'Paginas','C');
	
	
	
	
	
	
	$prop=array('HeaderColor'=>array(63,202,254),
			'color1'=>array(255,255,255),
			'color2'=>array(206,239,252),
			'padding'=>1);
	$format = 1;
	
	
	$pdf->SetY(40);
	
	$pdf->Table($resultRep, $prop, $format);
	
	$pdf->AddCol('totales',50,utf8_decode(''),'L');
	$pdf->AddCol('total_documentos',50,utf8_decode('Total Documentos'),'C');
	$pdf->AddCol('total_paginas',50,utf8_decode('Total de Páginas'),'C');
	
	
	$prop2=array('HeaderColor'=>array(63,202,254),
			'color1'=>array(255,255,255),
			'color2'=>array(206,239,252),
			'padding'=>1);
	
	//$pdf->SetY(40);
	$format = 1;
	
	$pdf->Table($resultRep2, $prop2, $format);

}




$pdf->Output();

?>
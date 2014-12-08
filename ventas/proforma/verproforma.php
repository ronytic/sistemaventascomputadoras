<?php

include_once("../../impresion/fpdf/fpdf.php");
$titulo="Reporte de Venta de Producto";
$id=$_GET['id'];

include_once("../../class/proforma.php");
$proforma=new proforma;
$prof=array_shift($proforma->mostrar($id));


include_once("../../class/cliente.php");
$cliente=new cliente;
$cli=array_shift($cliente->mostrar($prof['codcliente']));

//print_r($prof);
include_once("../../class/proformadetalle.php");
$proformadetalle=new proformadetalle;

include_once("../../class/producto.php");
$producto=new producto;
$pro=array_shift($producto->mostrar($mp['codproductos']));


class PPDF extends FPDF{
	function Header(){
		global $prof,$cli;

		$this->SetFont("arial","UB",12);
		
		$this->setxy(115,32);
		$this->Cell(180,6,utf8_decode("Número de Proforma....".$prof['codigoinicial']),0,0,"L");
		$this->SetFont("arial","UB",14);
		$this->setxy(15,45);
		$this->Cell(180,6,"PROFORMA",0,0,"C");
		//$this->Image("../../imagenes/documentos/nota.jpg",0,0,216,139);
		
		$this->SetFont("arial","",11);
		$this->sety(55);
		$this->Cell(100,5,strftime("La Paz, %A, %d de %B del %Y",strtotime($prof['fechaproforma'])),0);
		$this->Ln();
		$this->Cell(30,5,utf8_decode("Señores:"),0);
		$this->SetFont("arial","B",11);
		$this->Cell(120,5,utf8_decode($cli['razonsocial']),0);
		$this->Ln();
		$this->SetFont("arial","",11);
		$this->Cell(120,5,utf8_decode("Presente.-"),0);
		$this->Ln();
		$this->Cell(120,5,utf8_decode("Mediante la presente, hacemos llegar la siguiente cotización:"),0);

		$this->Ln();
		$this->SetY(85);
	}
	function Footer(){
		
	}
}

$pdf=new PPDF("P","mm","letter");

$pdf->SetTopMargin(75);
$pdf->SetAutoPageBreak(true,20.5);
$pdf->SetMargins(35,75,25);
$pdf->AddPage();

$pdf->SetFont("arial","B",11);


$pdf->SetY(55);

//echo $pdf->GetY();
$pdf->Ln();$pdf->Ln();$pdf->Ln();$pdf->Ln();
$pdf->Cell(20,5,"CANT.",1,0,"C");
$pdf->Cell(100,5,"DETALLE",1,0,"C");
$pdf->SetFont("arial","B",7);
$pdf->Cell(25,5,"P/UNITARIO EN (Bs)",1,0,"C");
$pdf->Cell(25,5,"P/UNITARIO EN (Bs)",1,0,"C");
$pdf->Ln(6);
$pdf->SetFont("arial","B",11);
$total=0;
foreach($proformadetalle->mostrarTodo("codproforma=".$prof['codproforma']) as $vd){
	$prod=array_shift($producto->mostrar($vd['codproducto']));
$pdf->SetFont("arial","B",11);
	$pdf->Cell(20,5,utf8_decode($vd['cantidad']),1,0,"C");
	$pdf->Cell(100,5,utf8_decode($prod['nombre']),1,0,"L");
	$pdf->Cell(25,5,round($vd['precio'],2),1,0,"C");
	$pdf->Cell(25,5,$vd['total'],1,0,"R");
	$pdf->Ln();
	$pdf->SetFont("arial","",11);
	$pdf->Cell(20,5,"",1,0,"C");
	$pdf->MultiCell(100,5,utf8_decode($prod['caracteristica']),1,"L");
	/*$pdf->Cell(25,5,"",1,0,"C");
	$pdf->Cell(25,5,"",1,0,"R");*/
	$pdf->Ln();
	
	
	$total+=$vd['total'];
}
	$pdf->SetFont("arial","B",11);
	$pdf->Cell(20,5,"",1,0,"C");
	$pdf->Cell(100,5,"PRECIO TOTAL CON IMPUESTOS DE LEY",1,0,"L");
	$pdf->Cell(25,5,"",1,0,"C");
	$pdf->Cell(25,5,$total,1,0,"R");
	$pdf->Ln(15);
	
	$pdf->SetFont("arial","",8);
	$pdf->Cell(40,5,"GARANTIA",1,0,"L");
	$pdf->Cell(80,5,utf8_decode($prof['garantia1']),1,0,"L");
	$pdf->Ln();
	
	$pdf->Cell(40,5,"GARANTIA",1,0,"L");
	$pdf->Cell(80,5,utf8_decode($prof['garantia2']),1,0,"L");

	$pdf->Ln();
	
	$pdf->Cell(40,5,"VALIDEZ",1,0,"L");
	$pdf->Cell(80,5,utf8_decode($prof['validez']),1,0,"L");
	
	$pdf->Ln();
	
	$pdf->Cell(40,5,"ENTREGA",1,0,"L");
	$pdf->Cell(80,5,utf8_decode($prof['entrega']),1,0,"L");
	$pdf->Ln();
	
	$pdf->Cell(40,5,"FORMA DE PAGO",1,0,"L");
	$pdf->MultiCell(80,5,utf8_decode($prof['formapago']),1,"L",0);
	$pdf->Ln(20);
	$pdf->setx(80);
	$pdf->Cell(50,5,utf8_decode("Departamento de Ventas"),0,1,"C");
	$pdf->setx(80);
	$pdf->Cell(50,5,utf8_decode("R&E ARTE EN COMPUTACIÓN"),0,1,"C");
	$pdf->Ln();
	

$pdf->Output();
?>
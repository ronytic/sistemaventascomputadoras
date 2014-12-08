<?php

include_once("../../impresion/fpdf/fpdf.php");
$titulo="Reporte de Venta de Producto";
$id=$_GET['id'];

include_once("../../class/servicio.php");
$servicio=new servicio;
$serv=array_shift($servicio->mostrar($id));


include_once("../../class/cliente.php");
$cliente=new cliente;
$cli=array_shift($cliente->mostrar($serv['codcliente']));

//print_r($prof);
include_once("../../class/serviciodetalle.php");
$serviciodetalle=new serviciodetalle;

include_once("../../class/producto.php");
$producto=new producto;
$pro=array_shift($producto->mostrar($mp['codproductos']));


class PPDF extends FPDF{
	function Header(){
		global $serv,$cli;

		$this->SetFont("arial","UB",12);
		
		$this->setxy(115,32);
		$this->Cell(180,6,utf8_decode("Informe Técnico: ".$serv['codigoinicial']),0,0,"L");
		$this->SetFont("arial","UB",14);
		$this->setxy(15,45);
		$this->Cell(180,6,"INFORME   TECNICO",0,0,"C");
		//$this->Image("../../imagenes/documentos/nota.jpg",0,0,216,139);
		
		$this->SetFont("arial","",11);
		
		$this->Ln();
		$this->Cell(30,5,utf8_decode("CLIENTE:"),0);
		$this->SetFont("arial","B",11);
		$this->Cell(120,5,utf8_decode($cli['razonsocial']),0);
		$this->Ln();
		$this->SetFont("arial","",11);
		$this->sety(55);
		$this->Cell(100,5,strftime("La Paz, %A, %d de %B del %Y",strtotime($serv['fechaservicio'])),0);
		$this->Ln();
		$this->SetFont("arial","BU",11);
		$this->Cell(120,5,utf8_decode(mb_strtoupper($serv['tiposervicio'],"utf8")),0);
		$this->Ln();$this->SetFont("arial","",11);
		$this->Cell(120,5,utf8_decode($serv['descripcion']),0);

		$this->Ln();
		$this->SetY(85);
	}
	function Footer(){
		
	}
}

$pdf=new PPDF("P","mm","letter");

$pdf->SetTopMargin(75);
$pdf->SetAutoPageBreak(true,20.5);
$pdf->SetMargins(15,75,25);
$pdf->AddPage();

$pdf->SetFont("arial","B",9);


$pdf->SetY(55);

//echo $pdf->GetY();
$pdf->Ln();$pdf->Ln();$pdf->Ln();$pdf->Ln();
$pdf->Cell(15,5,"Fecha",1,0,"C");
$pdf->Cell(30,5,"Equipo",1,0,"C");
$pdf->Cell(20,5,"N Serie",1,0,"C");
$pdf->Cell(30,5,"Usuario",1,0,"C");
$pdf->Cell(40,5,"Trabajo Realizado",1,0,"C");
$pdf->Cell(30,5,"Obser",1,0,"C");
$pdf->Cell(20,5,"Precio",1,0,"C");
$pdf->SetFont("arial","B",7);

$pdf->Ln(6);
$pdf->SetFont("arial","",9);
$total=0;
foreach($serviciodetalle->mostrarTodo("codservicio=".$serv['codservicio']) as $vd){
	
	$prod=array_shift($producto->mostrar($vd['codproducto']));
$pdf->SetFont("arial","",8);
	$pdf->Cell(15,5,utf8_decode(fecha2Str($vd['fecharegistro'])),1,0,"C");
	$pdf->Cell(30,5,utf8_decode($vd['equipo']),1,0,"L");
	$pdf->Cell(20,5,utf8_decode($vd['nserie']),1,0,"L");
	$pdf->Cell(30,5,utf8_decode($vd['usuariodepartamento']),1,0,"L");
	$pdf->Cell(40,5,utf8_decode($vd['trabajorealizado']),1,0,"L");
	$pdf->Cell(30,5,utf8_decode($vd['observacion']),1,0,"L");
	$pdf->Cell(20,5,utf8_decode($vd['precio']),1,0,"R");
	
	
	/*$pdf->Cell(25,5,"",1,0,"C");
	$pdf->Cell(25,5,"",1,0,"R");*/
	$pdf->Ln();
	
	
	$total+=$vd['precio'];
}

	$pdf->SetFont("arial","B",11);

	$pdf->Cell(165,5," TOTAL",1,0,"R");

	$pdf->Cell(20,5,$total,1,0,"R");
	$pdf->Ln(15);
	
	$pdf->SetFont("arial","B",10);
	$pdf->setx(80);
	$pdf->Cell(50,5,utf8_decode(""),0,1,"C");
	$pdf->setx(80);
	$pdf->Cell(50,5,utf8_decode("R&E ARTE EN COMPUTACIÓN"),0,1,"C");
	$pdf->Ln();
	

$pdf->Output();
?>
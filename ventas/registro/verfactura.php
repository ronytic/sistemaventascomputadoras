<?php

include_once("../../impresion/fpdf/fpdf.php");
$titulo="Reporte de Venta de Producto";
$id=$_GET['id'];

include_once("../../class/venta.php");
$venta=new venta;
$ven=array_shift($venta->mostrar($id));

include_once("../../class/cliente.php");
$cliente=new cliente;

include_once("../../class/ventadetalle.php");
$ventadetalle=new ventadetalle;


include_once("../../class/producto.php");
$producto=new producto;
$pro=array_shift($producto->mostrar($mp['codproductos']));

$cli=$cliente->mostrar($ven['codcliente']);
$cli=array_shift($cli);

class PPDF extends FPDF{
	function Header(){
		global $ven,$id,$cli;
		$this->SetTopMargin(115);
		$this->SetFont("arial","",10);
		//$this->Image("../../imagenes/documentos/factura.jpg",0,0,216,139);
		
		$this->setxy(60,43);
		$this->Cell(100,3,strftime(" %d ",strtotime($ven['fechaventa'])),0);
		$this->setxy(80,43);
		$this->Cell(100,3,strftime(" %B",strtotime($ven['fechaventa'])),0);
		$this->setxy(130,43);
		$this->Cell(100,3,strftime("%y",strtotime($ven['fechaventa'])),0);
		
	
		
		$this->setxy(30,52);
		$this->Cell(100,3,$cli['razonsocial'],0);
		$this->setxy(155,52);
		$this->Cell(50,3,$cli['nitci'],0);	
		$this->SetY(70);
		
	}
	function Footer(){
		global $ven,$codigos;
		$this->setxy(20,133);
		$this->Cell(135,3,num2letras($ven['total']),0,0,"I");
		
		$this->setxy(165,122);
		$this->Cell(25,3,$ven['total'],0,0,"R");	
	}
}


$pdf=new PPDF("L","mm",array(215.9,160));
$pdf->SetTopMargin(70);
$pdf->SetAutoPageBreak(true,20.5);


$pdf->AddPage();

$pdf->SetX(10);
foreach($ventadetalle->mostrarTodo("codventa=".$ven['codventa']) as $vd){
	$prod=array_shift($producto->mostrar($vd['codproducto']));
	$pdf->SetX(10);
	$pdf->Cell(12,3,$vd['cantidad'],0,0,"C");
	$pdf->Cell(120,3,$prod['nombre'],0,0,"L");
	$pdf->Cell(22,3,round($vd['precio'],2),0,0,"C");
	$pdf->Cell(22,3,$vd['total'],0,0,"R");
	$pdf->Ln(4);
}
/*$foto="../foto/".$emp['foto'];
if(!empty($emp['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,50,40,40);	
}
*/
$pdf->Output();
?>
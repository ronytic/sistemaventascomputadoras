<?php
include_once("../../impresion/pdf.php");
$titulo="Datos de Producto";
$id=$_GET['id'];
class PDF extends PPDF{
	
}

include_once("../../class/producto.php");
$producto=new producto;
$prod=array_shift($producto->mostrar($id));

include_once("../../class/productotipo.php");
$productotipo=new productotipo;
$tip=array_shift($productotipo->mostrar($prod['codproductotipo']));

$pdf=new PDF("P","mm","letter");

$pdf->AddPage();
mostrarI(array("Nombre"=>$prod['nombre'],
				"Caracteristica"=>$prod['caracteristica'],
				"Código de Barra"=>$prod['codigonserie'],
				"Tipo de Producto"=>$tip['nombre'],
				
				
				"direccionweb"=>$prod['direccionweb'],
			));

/*$foto="../foto/".$emp['foto'];
if(!empty($emp['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,50,40,40);	
}
*/
$pdf->Output();
?>
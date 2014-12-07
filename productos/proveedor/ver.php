<?php
include_once("../../impresion/pdf.php");
$titulo="Datos de Proveedor";
$id=$_GET['id'];
class PDF extends PPDF{
	
}

include_once("../../class/proveedor.php");
$proveedor=new proveedor;
$prov=array_shift($proveedor->mostrar($id));


$pdf=new PDF("P","mm","letter");

$pdf->AddPage();
mostrarI(array("Nombres"=>$prov['nombres'],
				"Apellidos"=>$prov['apellidos'],
				"Razón Social"=>$prov['razonsocial'],
				"Nit / C.I."=>$prov['nitci'],
				"Teléfono"=>$prov['telefono'],
				"Celular"=>$prov['celular'],
				"Dirección"=>$prov['direccion'],
				"Correo"=>$prov['correo'],
			));

/*$foto="../foto/".$emp['foto'];
if(!empty($emp['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,50,40,40);	
}
*/
$pdf->Output();
?>
<?php
include_once("../../impresion/pdf.php");
$titulo="Datos del Cliente";
$id=$_GET['id'];
class PDF extends PPDF{
	
}

include_once("../../class/cliente.php");
$cliente=new cliente;
$cli=array_shift($cliente->mostrar($id));


$pdf=new PDF("P","mm","letter");

$pdf->AddPage();
mostrarI(array("Nombres"=>$cli['nombres'],
				"Apellido Paterno"=>$cli['paterno'],
				"Apellido Materno"=>$cli['materno'],
				"Razón Social"=>$cli['razonsocial'],
				"Nit / C.I."=>$cli['nitci'],
				"Teléfono"=>$cli['telefono'],
				"Celular"=>$cli['celular'],
				"Dirección"=>$cli['direccion'],
				"Correo"=>$cli['correo'],
			));

/*$foto="../foto/".$emp['foto'];
if(!empty($emp['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,50,40,40);	
}
*/
$pdf->Output();
?>
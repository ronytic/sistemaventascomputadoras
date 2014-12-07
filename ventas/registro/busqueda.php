<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	//include_once '../../class/productos.php';
	include_once '../../class/venta.php';
	//include_once '../../class/cliente.php';
	extract($_POST);
	
	
	//$productos=new productos;
	$venta=new venta;
	//$cliente=new cliente;
	include_once("../../class/cliente.php");
	$cliente=new cliente;
	
	$observacionpago=$observacionpago!=""?$observacionpago:'%';
	$codcliente=$codcliente!=""?$codcliente:'%';
	$fechaventa=$fechaventa!=""?$fechaventa:'%';
	
	foreach($venta->mostrarTodo("codcliente LIKE '$codcliente' and observacionpago LIKE '$observacionpago' and fechaventa LIKE '$fechaventa'","fechaventa")as $mp){$i++;
		$cli=$cliente->mostrar($mp['codcliente']);
		$cli=array_shift($cli);
		
		$datos[$i]['codventa']=$mp['codventa'];
		$datos[$i]['cliente']=$cli['nombres']." ".$cli['paterno']." ".$cli['materno']." - ".$cli['razonsocial'];
		$datos[$i]['fechaventa']=$mp['fechaventa'];
		$datos[$i]['pagado']=$mp['pagado'];
		$datos[$i]['devolucion']=$mp['devolucion'];
		$datos[$i]['total']=$mp['total'];
		$datos[$i]['observacionpago']=$mp['observacionpago'];
	}
	
	
	
	$titulo=array("fechaventa"=>"Fecha de Venta","cliente"=>"Cliente","devolucion"=>"Cambio","total"=>"Total","observacionpago"=>"Observación Pago");
	listadoTabla($titulo,$datos,1,"modificar.php","","",array("Ver Factura"=>"verfactura.php"),"","_blank");
}
?>
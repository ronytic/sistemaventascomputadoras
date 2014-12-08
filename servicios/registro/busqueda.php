<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	//include_once '../../class/productos.php';
	include_once '../../class/servicio.php';
	//include_once '../../class/cliente.php';
	extract($_POST);
	
	
	//$productos=new productos;
	$servicio=new servicio;
	//$cliente=new cliente;
	include_once("../../class/cliente.php");
	$cliente=new cliente;
	
	$observacionpago=$observacionpago!=""?$observacionpago:'%';
	$codcliente=$codcliente!=""?$codcliente:'%';
	$fechaservicio=$fechaservicio!=""?$fechaservicio:'%';
	
	foreach($servicio->mostrarTodo("codcliente LIKE '$codcliente' and fechaservicio LIKE '$fechaservicio'","fechaservicio")as $mp){$i++;
		$cli=$cliente->mostrar($mp['codcliente']);
		$cli=array_shift($cli);
		
		$datos[$i]['codservicio']=$mp['codservicio'];
		$datos[$i]['cliente']=$cli['nombres']." ".$cli['paterno']." ".$cli['materno']." - ".$cli['razonsocial'];
		$datos[$i]['fechaservicio']=$mp['fechaservicio'];
		$datos[$i]['total']=$mp['total'];
		$datos[$i]['descripcion']=$mp['descripcion'];
	}
	
	
	
	$titulo=array("fechaservicio"=>"Fecha de Servicio","cliente"=>"Cliente","descripcion"=>"Descripción");
	listadoTabla($titulo,$datos,1,"","","",array("Ver Servicio"=>"verservicio.php"),"","_blank");
}
?>
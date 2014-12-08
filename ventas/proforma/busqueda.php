<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	//include_once '../../class/productos.php';
	include_once '../../class/proforma.php';
	//include_once '../../class/cliente.php';
	extract($_POST);
	
	
	//$productos=new productos;
	$proforma=new proforma;
	//$cliente=new cliente;
	include_once("../../class/cliente.php");
	$cliente=new cliente;
	
	$observacionpago=$observacionpago!=""?$observacionpago:'%';
	$codcliente=$codcliente!=""?$codcliente:'%';
	$fechaproforma=$fechaproforma!=""?$fechaproforma:'%';
	
	foreach($proforma->mostrarTodo("codcliente LIKE '$codcliente' and fechaproforma LIKE '$fechaproforma'","fechaproforma")as $mp){$i++;
		$cli=$cliente->mostrar($mp['codcliente']);
		$cli=array_shift($cli);
		
		$datos[$i]['codproforma']=$mp['codproforma'];
		$datos[$i]['cliente']=$cli['nombres']." ".$cli['paterno']." ".$cli['materno']." - ".$cli['razonsocial'];
		$datos[$i]['fechaproforma']=$mp['fechaproforma'];
		$datos[$i]['total']=$mp['total'];
		$datos[$i]['garantia1']=$mp['garantia1'];
	}
	
	
	
	$titulo=array("fechaproforma"=>"Fecha de Proforma","cliente"=>"Cliente","garantia1"=>"Garantia 1");
	listadoTabla($titulo,$datos,1,"","","",array("Ver Proforma"=>"verproforma.php"),"","_blank");
}
?>
<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/proforma.php");
$proforma=new proforma;
include_once("../../class/proformadetalle.php");
$proformadetalle=new proformadetalle;

include_once("../../class/producto.php");
$producto=new producto;

//include_once("../../class/compra.php");
//$compra=new compra;
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
extract($_POST);
$valoresventa=array("fechaproforma"=>"'$fechaproforma'",
"codcliente"=>"'$codcliente'",
"total"=>"'$supertotal'",
"codigoinicial"=>"'$codigoinicial'",
"garantia1"=>"'$garantia1'",
"garantia2"=>"'$garantia2'",
"validez"=>"'$validez'",
"entrega"=>"'$entrega'",
"formapago"=>"'$formadepago'",
					);
$proforma->insertar($valoresventa);
$idproforma=$proforma->last_id();
$id=$idproforma;

foreach($pro as $prod){
	if($prod['codproducto']==""){
		continue;	
	}
	$codproductos=$prod['codproducto'];
	$cantidad=$prod['cantidad'];
	$cantidadventatotal=$prod['cantidad'];
	$preciounitario=$prod['preciounitario'];
	$subtotal=$prod['subtotal'];
	$observacion=$prod['observacion'];
	
	$fecha=date("Y-m-d");
	$totalproducto=0;
	/*$inv=$compra->sumarTotalProducto("$codproductos");
	$inv=array_shift($inv);*/
	$totalproducto=$inv['cantidadtotalstock'];
	//echo $totalproducto."<br>";
	//echo $totalproducto;
	$pr=array_shift($producto->mostrar($codproductos));
	$nombreproducto=$pr['nombre'];
	
	
	$valores=array(	"codproforma"=>"'$idproforma'",
					"codproducto"=>"'$codproductos'",
					"cantidad"=>"'$cantidad'",
					"precio"=>"'$preciounitario'",
					"total"=>"'$subtotal'",
					"observacion"=>"'$observacion'",
					);
	$proformadetalle->insertar($valores);
	
	
	
}
$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";
$botones=array("verproforma.php"=>"Ver Proforma");

$listar=1;
$modificar=1;
$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>
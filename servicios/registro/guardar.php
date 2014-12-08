<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/servicio.php");
$servicio=new servicio;
include_once("../../class/serviciodetalle.php");
$serviciodetalle=new serviciodetalle;

include_once("../../class/producto.php");
$producto=new producto;

//include_once("../../class/compra.php");
//$compra=new compra;
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
extract($_POST);
$valoresventa=array("fechaservicio"=>"'$fechaservicio'",
"codcliente"=>"'$codcliente'",
"total"=>"'$supertotal'",
"codigoinicial"=>"'$codigoinicial'",
"descripcion"=>"'$descripcion'",
"tiposervicio"=>"'$tiposervicio'",
					);
$servicio->insertar($valoresventa);
$idservicio=$servicio->last_id();
$id=$idservicio;

foreach($pro as $prod){
	
	$codproductos=$prod['codproducto'];
	$cantidad=$prod['cantidad'];
	$cantidadventatotal=$prod['cantidad'];
	$preciounitario=$prod['preciounitario'];
	$subtotal=$prod['subtotal'];
	$observacion=$prod['observacion'];
	
	$fecha=date("Y-m-d");
	$totalproducto=0;
	
	
	$fecharegistro=$prod['fecharegistro'];
	$equipo=$prod['equipo'];
	$nserie=$prod['nserie'];
	$usuariodepartamento=$prod['usuariodepartamento'];
	$trabajorealizado=$prod['trabajorealizado'];
	$subtotal=$prod['subtotal'];
	$observacion=$prod['observacion'];
	/*$inv=$compra->sumarTotalProducto("$codproductos");
	$inv=array_shift($inv);*/
	$totalproducto=$inv['cantidadtotalstock'];
	//echo $totalproducto."<br>";
	//echo $totalproducto;
	$pr=array_shift($producto->mostrar($codproductos));
	$nombreproducto=$pr['nombre'];
	
	
	$valores=array(	"codservicio"=>"'$idservicio'",
					"fecharegistro"=>"'$fecharegistro'",
					"equipo"=>"'$equipo'",
					"nserie"=>"'$nserie'",
					"usuariodepartamento"=>"'$usuariodepartamento'",
					"trabajorealizado"=>"'$trabajorealizado'",
					"precio"=>"'$subtotal'",
					
					"observacion"=>"'$observacion'",
					);
	$serviciodetalle->insertar($valores);
	
	
	
}
$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";
$botones=array("verservicio.php"=>"Ver Servicio");

$listar=1;
$modificar=1;
$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>
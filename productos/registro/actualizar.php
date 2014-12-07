<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/producto.php");
$producto=new producto;
extract($_POST);
//empieza la copia de archivos
$valores=array(	"nombre"=>"'$nombre'",
				"codproductotipo"=>"'$codproductotipo'",
				"caracteristica"=>"'$caracteristica'",
				"direccionweb"=>"'$direccionweb'",
				
				
				"codigonserie"=>"'$codigonserie'",
				);
				
if($_FILES['imagen']['name']!=""){
	@copy($_FILES['imagen']['tmp_name'],"../../imagenes/productos/".$_FILES['imagen']['name']);	
	$valores["imagen"]="'".$_FILES['imagen']['name']."'";
}
				$producto->actualizar($valores,$id);
				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";


$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>
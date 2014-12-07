<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/proveedor.php");
$proveedor=new proveedor;
extract($_POST);
//empieza la copia de archivos
$valores=array(	"nombres"=>"'$nombres'",
				"apellidos"=>"'$apellidos'",
				"razonsocial"=>"'$razonsocial'",
				"nitci"=>"'$nitci'",
				"telefono"=>"'$telefono'",
				"celular"=>"'$celular'",
				"correo"=>"'$correo'",
				"direccion"=>"'$direccion'",
				
				);
				$proveedor->actualizar($valores,$id);
				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";


$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>
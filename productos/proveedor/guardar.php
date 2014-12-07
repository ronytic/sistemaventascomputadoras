<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/proveedor.php");
$proveedor=new proveedor;

extract($_POST);
//empieza la copia de archivos
/*
if(($_FILES['curriculum']['type']=="application/pdf" || $_FILES['curriculum']['type']=="application/msword" || $_FILES['curriculum']['type']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document") && $_FILES['curriculum']['size']<="500000000"){
	@$curriculum=$_FILES['curriculum']['name'];
	@copy($_FILES['curriculum']['tmp_name'],"../curriculum/".$_FILES['curriculum']['name']);
}else{
	//mensaje que no es valido el tipo de archivo	
	$mensaje[]="Archivo no válido del curriculum. Verifique e intente nuevamente";
}
*/
$valores=array(	"nombres"=>"'$nombres'",
				"apellidos"=>"'$apellidos'",
				"razonsocial"=>"'$razonsocial'",
				"nitci"=>"'$nitci'",
				"telefono"=>"'$telefono'",
				"celular"=>"'$celular'",
				"correo"=>"'$correo'",
				"direccion"=>"'$direccion'",
				
				);
				$proveedor->insertar($valores);
				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";



$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>
<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/producto.php';
	extract($_POST);
	$codproductotipo=$codproductotipo?"codproductotipo='$codproductotipo'":"codproductotipo LIKE '%'";
	$producto=new producto;
	$prod=$producto->mostrarTodo("nombre LIKE '%$nombre%' and $codproductotipo");
	$titulo=array("nombre"=>"Nombre","caracteristica"=>"Caracteristica","codigonserie"=>"Código de Barra","direccionweb"=>"Dirección Web");
	listadoTabla($titulo,$prod,1,"modificar.php","eliminar.php","ver.php");
}
?>
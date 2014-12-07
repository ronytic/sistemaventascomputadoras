<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/productotipo.php';
	extract($_POST);

	$productotipo=new productotipo;
	$tip=$productotipo->mostrarTodo("nombre LIKE '%$nombre%'");
	$titulo=array("nombre"=>"Nombre","descripcion"=>"Descripción");
	listadoTabla($titulo,$tip,1,"modificar.php","eliminar.php","ver.php");
}
?>
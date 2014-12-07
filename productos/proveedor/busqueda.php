<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/proveedor.php';
	extract($_POST);

	$proveedor=new proveedor;
	$prov=$proveedor->mostrarTodo("nombres LIKE '%$nombres%'");
	$titulo=array("nombres"=>"Nombres","apellidos"=>"Apellidos","razonsocial"=>"Razón Social","nitci"=>"Nit / CI","direccion"=>"Dirección","telefono"=>"Teléfono","celular"=>"Celular");
	listadoTabla($titulo,$prov,1,"modificar.php","eliminar.php","ver.php");
}
?>
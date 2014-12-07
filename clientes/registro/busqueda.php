<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/cliente.php';
	extract($_POST);

	$cliente=new cliente;
	$cli=$cliente->mostrarTodo("nombres LIKE '%$nombres%' and paterno LIKE '%$paterno%' and materno LIKE '%$materno%'");
	$titulo=array("nombres"=>"Nombres","paterno"=>"Ap. Paterno","materno"=>"Ap. Materno","razonsocial"=>"Razón Social","nitci"=>"Nit / CI","direccion"=>"Dirección","telefono"=>"Teléfono","celular"=>"Celular");
	listadoTabla($titulo,$cli,1,"modificar.php","eliminar.php","ver.php");
}
?>
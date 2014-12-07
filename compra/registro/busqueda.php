<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/producto.php';
	include_once '../../class/compra.php';
	extract($_POST);
	
	
	$producto=new producto;
	$compra=new compra;
	
	
	$codproducto=$codproducto!=""?$codproducto:'%';
	$codproveedor=$codproveedor!=""?$codproveedor:'%';
	$numerofactura=$numerofactura!=""?$numerofactura:'%';
	$fecha=$fecha!=""?$fecha:'%';
	
	
	foreach($compra->mostrarTodo("codproveedor LIKE '$codproveedor' and codproducto LIKE '$codproducto' and numerofactura LIKE '$numerofactura' and fecha LIKE '$fecha'")as $mp){$i++;
		$pro=array_shift($producto->mostrar($mp['codproducto']));
		$datos[$i]['codcompra']=$mp['codcompra'];
		$datos[$i]['producto']=$pro['nombre'];
		$datos[$i]['fechacompra']=$mp['fechacompra'];
		$datos[$i]['numerofactura']=$mp['numerofactura'];
		$datos[$i]['cantidad']=$mp['cantidad'];
		$datos[$i]['preciounitario']=$mp['preciounitario'];
		$datos[$i]['total']=$mp['total'];
		$datos[$i]['cantidadstock']=$mp['cantidadstock'];
		$datos[$i]['observacion']=$mp['observacion'];
	}
	
	
	
	$titulo=array("fechacompra"=>"Fecha de Compra","producto"=>"Producto","cantidad"=>"Cantidad","preciounitario"=>"Precio Uni","total"=>"Total","cantidadstock"=>"Cantidad Stock","numerofactura"=>"Número de Fac","observacion"=>"Observación");
	if($_SESSION['Nivel']==1 || $_SESSION['Nivel']==2){
		$eliminar="eliminar.php";
	}else{
		$eliminar="";
	}
	listadoTabla($titulo,$datos,1,"modificar.php",$eliminar,"ver.php");
}
?>
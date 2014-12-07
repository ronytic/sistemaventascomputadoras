<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Nuevo Producto";

include_once("../../class/productotipo.php");
$productotipo=new productotipo;
$tip=todolista($productotipo->mostrarTodo(),"codproductotipo","nombre","");

include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_4 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="guardar.php" method="post" enctype="multipart/form-data">
				<table class="tablareg">
					<tr>
						<td><?php campos("Nombre","nombre","text","",1,array("required"=>"required"));?></td>
					</tr>
	                <tr>
						<td><?php campos("Tipo de Producto","codproductotipo","select",$tip);?></td>
					</tr>
                    <tr>
						<td><?php campos("Caracteristica","caracteristica","textarea","",0,array("rows"=>"10","cols"=>40));?></td>
					</tr>
                    <tr>
						<td><?php campos("Dirección Web","direccionweb","text");?></td>
					</tr>
                    <tr>
						<td><?php campos("Imágen","imagen","file");?></td>
					</tr>
                    <tr>
						<td><?php campos("Código de Barra - Código de Serie","codigonserie","text","",0,array("size"=>"40"));?></td>
					</tr>
					<tr><td><?php campos("Guardar","guardar","submit");?></td></tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>
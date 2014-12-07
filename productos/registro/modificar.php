<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Producto";
$id=$_GET['id'];
include_once '../../class/producto.php';
$producto=new producto;
$prod=array_shift($producto->mostrar($id));

include_once("../../class/productotipo.php");
$productotipo=new productotipo;
$tip=todolista($productotipo->mostrarTodo(),"codproductotipo","nombre","");
/*include_once("../../class/proveedor.php");
$proveedor=new proveedor;
$prov=todolista($proveedor->mostrarTodo(),"codproveedor","nombre","");*/

include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_4 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="actualizar.php" method="post" enctype="multipart/form-data">
                <?php campos("","id","hidden",$id);?>
				<table class="tablareg">
					<tr>
						<td><?php campos("Nombre","nombre","text",$prod['nombre'],1,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Tipo de Producto","codtipo","select",$tip,0,"",$prod['codproductotipo']);?></td>
					</tr>
                    <tr>
						<td><?php campos("Caracteristica","caracteristica","textarea",$prod['caracteristica'],0,array("rows"=>"10","cols"=>40));?></td>
					</tr>
                    <tr>
						<td><?php campos("Dirección Web","direccionweb","text",$prod['direccionweb']);?></td>
					</tr>
                    <tr>
						<td><?php campos("Imágen","imagen","file");?>
                        <br>
                        <?php
							if($prod['imagen']!=""){
							?><a href="../../imagenes/productos/<?php echo $prod['imagen']?>" target="_blank"><img src="../../imagenes/productos/<?php echo $prod['imagen']?>" width="150"></a><?php	
							}
						?>
                        </td>
					</tr>
                    <tr>
						<td><?php campos("Código de Barra - Código de Serie","codigonserie","text",$prod['codigonserie'],0,array("size"=>"40"));?></td>
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
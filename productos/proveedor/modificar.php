<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Datos de Proveedor";
$id=$_GET['id'];
include_once '../../class/proveedor.php';
$proveedor=new proveedor;
$prov=array_shift($proveedor->mostrar($id));
/*include_once("../../class/proveedor.php");
$proveedor=new proveedor;
$prov=todolista($proveedor->mostrarTodo(),"codproveedor","nombre","");*/

include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_3 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="actualizar.php" method="post" enctype="multipart/form-data">
                <?php campos("","id","hidden",$id);?>
				<table class="tablareg">

					<tr>
						<td><?php campos("Nombres","nombres","text",$prov['nombres'],1,array("required"=>"required"));?></td>
					
						<td><?php campos("Apellidos","apellidos","text",$prov['apellidos'],1,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Razón Social","razonsocial","text",$prov['razonsocial']);?></td>
					
						<td><?php campos("Nit / C.I.","nitci","text",$prov['nitci']);?></td>
					</tr>
                    <tr>
						<td><?php campos("Teléfono","telefono","text",$prov['telefono']);?></td>
					
						<td><?php campos("Celular","celular","text",$prov['celular']);?></td>
					</tr>
                    <tr>
						<td><?php campos("Correo","correo","text",$prov['correo']);?></td>
					
						<td><?php campos("Dirección","direccion","text",$prov['direccion']);?></td>
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
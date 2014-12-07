<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Datos de Proveedor";
$id=$_GET['id'];
include_once '../../class/cliente.php';
$cliente=new cliente;
$cli=array_shift($cliente->mostrar($id));
/*include_once("../../class/proveedor.php");
$proveedor=new proveedor;
$prov=todolista($proveedor->mostrarTodo(),"codproveedor","nombre","");*/

include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_2 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="actualizar.php" method="post" enctype="multipart/form-data">
                <?php campos("","id","hidden",$id);?>
				<table class="tablareg">

					<tr>
						<td><?php campos("Nombres","nombres","text",$cli['nombres'],1,array("required"=>"required"));?></td>
					
						<td><?php campos("Apellido Paterno","paterno","text",$cli['paterno'],1,array("required"=>"required"));?></td>
                        <td><?php campos("Apellido Materno","materno","text",$cli['materno'],1,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Razón Social","razonsocial","text",$cli['razonsocial']);?></td>
					
						<td><?php campos("Nit / C.I.","nitci","text",$cli['nitci']);?></td>
                        <td><?php campos("Dirección","direccion","text",$cli['direccion']);?></td>
					</tr>
                    <tr>
                    	<td><?php campos("Correo","correo","text",$cli['correo']);?></td>
						<td><?php campos("Teléfono","telefono","text",$cli['telefono']);?></td>
					
						<td><?php campos("Celular","celular","text",$cli['celular']);?></td>
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
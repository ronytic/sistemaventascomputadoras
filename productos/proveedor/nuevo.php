<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Nuevo Proveedor";

include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_3 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="guardar.php" method="post" enctype="multipart/form-data">
				<table class="tablareg">
					<tr>
						<td><?php campos("Nombres","nombres","text","",1,array("required"=>"required"));?></td>
					
						<td><?php campos("Apellidos","apellidos","text","",1,array("required"=>"required"));?></td>
					</tr>
                    <tr>
						<td><?php campos("Razón Social","razonsocial","text");?></td>
					
						<td><?php campos("Nit / C.I.","nitci","text");?></td>
					</tr>
                    <tr>
						<td><?php campos("Teléfono","telefono","text");?></td>
					
						<td><?php campos("Celular","celular","text");?></td>
					</tr>
                    <tr>
						<td><?php campos("Correo","correo","text");?></td>
					
						<td><?php campos("Dirección","direccion","text");?></td>
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
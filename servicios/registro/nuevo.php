<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Servicios";

include_once("../../class/cliente.php");
$cliente=new cliente;
$cli=todolista($cliente->mostrarTodo("","paterno,materno,nombres"),"codcliente","nombres,paterno,materno,razonsocial"," ");
//print_r($cli);
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<script language="javascript">
$(document).on("ready",function(){
	var linea=0;
	
	$(document).on("click",".aumentar",function(e){
		e.preventDefault();
		var posi=$(this).parent().parent();
		$.post("aumentar.php",{'l':linea},function(data){
			posi.before(data);
			$("select").select2({'placeholder':'Búsqueda no encontrada','loadMorePadding':0});
			 $('input[type=date]').click(function(e){e.preventDefault();}).datepicker();
			linea++;
		});
	})
	
	$(".aumentar").click();
	$(document).on("change",".producto",function(){
		var l=$(this).attr("rel-linea");
		var stock=$(".producto[rel-linea="+l+"]>option:selected").attr("rel-cantidad");
		$("input[rel-stock="+l+"]").val(stock);
		$("input[rel-cantidad="+l+"]").attr("max",stock);
		
		
	});
	$(document).on("change",".subtotal",function(e){
		
		/*var l=$(this).attr("rel-linea");
		var cantidad=$("input[rel-cantidad="+l+"]").val();
		var preciounitario=$("input[rel-preciounitario="+l+"]").val();
		var total=(cantidad*preciounitario).toFixed(2);
		$("input[rel-subtotal="+l+"]").val(total);
*/
		
		var stotal=0;
		for(i=1;i<=linea;i++){
		stotal+=parseFloat($("input[rel-subtotal="+i+"]").val());
		}
		$(".supertotal").val(stotal.toFixed(2))
		
	});
	/*$(document).on("change","#ci",function(){
		var ci=$(this).val();
		$.post("sacarnombre.php",{"nit":ci},function(data){$("#cliente").val(data)});
	});*/
	
	$(document).on("change",".pagado",function(){
		//var supertotal=parseFloat($(".supertotal").val());
		//var pagado=parseFloat($(".pagado").val());	
		//$(".pagado").val((pagado).toFixed(2));
		//$(".devolucion").val((pagado-supertotal).toFixed(2));
		
	});
	$("#formulario").submit(function(e) {
		if(confirm("¿Seguro que los Datos registrados estan Correctos, NO SE PODRAN MODIFICAR POSTERIORMENTE?")){
			//$(this).submit();	
		}else{
        	e.preventDefault();
			return false;
		}
    });
});
</script>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<form action="guardar.php" method="post" enctype="multipart/form-data" id="formulario">
    	<div class="prefix_1 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                
				<table class="tablareg">
                	<tr>
						<td><?php campos("Fecha de Servicio","fechaservicio","date",date("Y-m-d"),0,array("required"=>"required"));?></td>						
                        <td><?php campos("Usuario","vendedor","text",$us['nombre']." ".$us['paterno']." ".$us['materno'],0,array("required"=>"required","readonly"=>"readonly","size"=>40));?></td>
					</tr>
                    <tr>
						
                        <td colspan="2"><?php campos("Cliente","codcliente","select",$cli,0,array("required"=>"required"));?></td>										
                        
					</tr>
                    <tr>
                    	<td colspan="1"><?php campos("Código Inicial","codigoinicial","text","",0,array("size"=>"20"));?></td>
                        <td colspan="1"><?php campos("Descripción","descripcion","text","",0,array("size"=>"40"));?></td>
                        <td colspan="1"><?php campos("Tipo de Servicio","tiposervicio","text","",0,array("size"=>"20"));?></td>
                    </tr>
                </table>
                
                
			</fieldset>
		</div>
        <div class="prefix_0 grid_10 alpha">
        	<fieldset>
            	<!--<div class="titulo"><?php echo $titulo?></div>-->
                <table class="tablareg">
					<tr class="titulo"><td>N</td><td style="width:600px !important">Fecha</td><td>Equipo</td><td>Usuario Departamento</td><td>SubTotal</td><td>Observación</td></tr>
                    
                    <tr class="contenido"><td colspan="3"><a href="#" class="aumentar"><img src="../../imagenes/ico/nuevo1.png" height="15"> Aumentar</a><br>
                    
                    </td><td class="der">Total<br></td><td>
                    <input type="text" name="supertotal" class="der supertotal" value="0" readonly size="10" style="width:100px">
                    </td><td></td>	</tr>
                    
				</table>
                <div class="rojoC">Revise los Datos, no se Podrán modificar posteriormente</div>
                <input type="submit" value="Confirmar Servicio">
            </fieldset>
        </div>
        </form>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>
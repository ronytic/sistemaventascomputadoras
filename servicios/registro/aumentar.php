<?php
include_once("../../login/check.php");
$l=$_POST['l'];
$l++;
include_once("../../class/producto.php");
$producto=new producto;
include_once("../../class/compra.php");
$compra=new compra;
?>
<tr>
<td class="der"><?php echo $l;?></td>
<td>
	<input type="date" name="pro[<?php echo $l?>][fecharegistro]" class="der fecha" rel-linea="<?php echo $l?>" rel-stock="<?php echo $l?>" style="width:115px"></td>
<td>
	<input type="text" name="pro[<?php echo $l?>][equipo]"  class="der"  rel-linea="<?php echo $l?>" rel-stock="<?php echo $l?>" size="15"><br>
	Nº Serie:<br><input type="text" name="pro[<?php echo $l?>][nserie]"  class=" der" rel-linea="<?php echo $l?>" rel-cantidad="<?php echo $l?>" size="15">
</td>

<td><input type="text" name="pro[<?php echo $l?>][usuariodepartamento]"  class=" der" rel-linea="<?php echo $l?>" rel-cantidad="<?php echo $l?>"  size="15">
<br>Trabajo Realizado:<br>
<input type="text" name="pro[<?php echo $l?>][trabajorealizado]"  class=" der" rel-linea="<?php echo $l?>" rel-cantidad="<?php echo $l?>">
</td>

<td><input type="text" name="pro[<?php echo $l?>][subtotal]" value="0" size="10" min="0" maxlength="10" style="width:100px" class="subtotal der"  rel-linea="<?php echo $l?>" rel-subtotal="<?php echo $l?>"></td>
<td><input type="text" name="pro[<?php echo $l?>][observacion]" value="" size="10" maxlength="10" style="width:120px" class="der" ></td>

</tr>
<?php
?>
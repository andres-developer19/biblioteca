<?php include ('funciones/fsesion.php');
if($usuario!="")
{
	
include("funciones/conexion.php");
extract($_POST);
$ci_est=$_GET['ci'];
$op=$_GET['op'];

if(($op=='E')&&($boton=='')){
	
	$sql="SELECT * FROM persona, estudiante WHERE persona.ci=estudiante.ci_est and ci_est=$ci_est";
	$Resultado=mysql_db_query($bd,$sql);
	$nfilas=mysql_num_rows($Resultado);
	
	if($nfilas>0){
		$Registro=mysql_fetch_array($Resultado);
		$ci_est=$Registro['ci_est'];
		$nombre_est=$Registro['nombre'];
		$apellido_est=$Registro['apellido'];
		$cod_area=$Registro['cod_area'];
		$telefono=$Registro['telefono'];
		$cod_movil=$Registro['cod_movil'];
		$movil=$Registro['movil'];
		$direccion=$Registro['direccion'];
		$grado=$Registro['grado'];
		$seccion=$Registro['seccion'];
	}
 }

switch($boton){
	
	case Guardar:
	
if($ci_est and $nombre_est and $apellido_est and $grado and $seccion){
	
	$sql="INSERT INTO persona VALUES ('$ci_est','$nombre_est','$apellido_est','$cod_area','$telefono','$cod_movil','$movil','$direccion','Estudiante')";
 	$resultado=mysql_db_query($bd,$sql);
	
	$sql="INSERT INTO estudiante VALUES ('$ci_est','$grado','$seccion')";
 	$resultado=mysql_db_query($bd,$sql);
	
		?>
			<script>
			alert("Sus datos se han guardado exitosamente");
			window.location.href='index.php?pag=4&&ci=<?php echo $ci_est;?>';
			</script>
		<?php
}
	break;
	
	
	case Editar:
	
if($ci_est and $nombre_est and $apellido_est and $grado and $seccion){
	
  	$registros=mysql_query("update persona set 						 
					   nombre='$nombre_est', 
					   apellido='$apellido_est',
					   cod_area='$cod_area',
					   telefono='$telefono',
					   cod_movil='$cod_movil',
					   movil='$movil',
					   direccion='$direccion'	
					   where ci='$ci_est'",$conexion);
	
	$registros=mysql_query("update estudiante set 						 
					   grado='$grado', 
					   seccion='$seccion'	
					   where ci_est='$ci_est'",$conexion);

		?>
			<script>
			alert("Sus datos se han editado exitosamente");
			window.location.href='index.php?pag=4&&ci=<?php echo $ci_est;?>';
			</script>
		<?php
}
    break; 
  
	case Volver:
	
	?><script>window.location.href='index.php?pag=4';</script><?php

    break;
	
   
   
   
}   
?>
<fieldset id="Formulario" style="border: 2px solid #649DC8; width:800px; height:450px; ">
<legend style="text-align:center"><B><?php if($op=='G'){ echo 'REGISTRAR '; }elseif($op=='E'){ echo 'EDITAR ';}?>ESTUDIANTE</B><br /><br /></legend>
<form action="#" method="post" name="estudiante">
<table align="center" cellpadding="3px" cellspacing="3px">
<tr>

<td><font color="red">*</font> Cedula:</td><td><input type="text" name="ci_est" value="<?php echo $ci_est;?>"  onKeyPress="return permite(event, 'num')" maxlength="8">
<!--<button  type="submit" value="Buscar" name="boton" ><img src="imagenes/buscar.png" title="Buscar"/></button> --></td>
</tr>
<tr>

<td><font color="red">*</font> Nombre:</td><td><input type="text" name="nombre_est" value="<?php echo $nombre_est;?>" onKeyPress="return permite(event, 'num_car')" onblur="this.value=this.value.toUpperCase()"></td>
</tr><tr>
<td><font color="red">*</font> Apellido:</td><td><input type="text" name="apellido_est" value="<?php echo $apellido_est;?>" onKeyPress="return permite(event, 'num_car')" onblur="this.value=this.value.toUpperCase()"></td>
</tr>
<?php include("funciones/telefonos.php");?>
<tr>

<td ><font color="red">*</font> Direcci&oacute;n:</td><td colspan="3">
<textarea cols="21" name="direccion"  onKeyPress="return permite(event, 'num_car')" onblur="this.value=this.value.toUpperCase()"><?php echo $direccion;?></textarea></td></tr>
<tr>



<tr>
  <td><font color="red">*</font> Grado</td>
  <td><select name="grado">
  <option value="">Seleccione un grado</option>
  <option value="1"<?php if($grado=='1'){ echo "selected";}?> >1&#176;</option>
  <option value="2"<?php if($grado=='2'){ echo "selected";}?>>2&#176;</option>
  <option value="3"<?php if($grado=='3'){ echo "selected";}?>>3&#176;</option>
  <option value="4"<?php if($grado=='4'){ echo "selected";}?>>4&#176;</option>
  <option value="5"<?php if($grado=='5'){ echo "selected";}?>>5&#176;</option>
  <option value="6"<?php if($grado=='6'){ echo "selected";}?>>6&#176;</option>
  <option value="7"<?php if($grado=='7'){ echo "selected";}?>>7&#176;</option>
  <option value="8"<?php if($grado=='8'){ echo "selected";}?>>8&#176;</option>
  <option value="9"<?php if($grado=='9'){ echo "selected";}?>>9&#176;</option>
</select>
  </td>
  </tr><tr>
  <td><font color="red">*</font> Seccion</td>
  <td><select name="seccion">
  <option value="">Seleccione una seccion</option>
  <option value="A"<?php if($seccion=='A'){ echo "selected";}?>>A</option>
 <option value="B"<?php if($seccion=='B'){ echo "selected";}?>>B</option>
 <option value="C"<?php if($seccion=='C'){ echo "selected";}?>>C</option>
  </select>
  </td>
</tr>
</table>

<center>
<BR /><BR />
<font color="red" style="font-style:italic;">* Campos Obligatorios</font>
<br /><br />
<?php if($op=='G'){ ?>
<button  type="submit" value="Guardar" name="boton" onClick="valida_envia8()" ><img src="imagenes/guardar.png" title="Guardar"/></button>
<?php }elseif($op=='E'){ ?>
<button  type="submit" value="Editar" name="boton" onClick="valida_envia8()"  ><img src="imagenes/editar.png" title="Editar"/></button>
<?php }?>
<button  type="submit" value="Volver" name="boton" ><img src="imagenes/volver.png" title="Volver" ></button>


</center>
</form>
</fieldset>
<?php } else { ?> 
<script>
alert("Debes Iniciar Sesion");
location.href='index.php';
</script>
<?php } ?>

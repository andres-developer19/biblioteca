<?php include ('funciones/fsesion.php');
if($usuario!="")
{
	
include("funciones/conexion.php");
extract($_POST);
$ci_doc=$_GET['ci'];
$op=$_GET['op'];

if(($op=='E')&&($boton=='')){
	
	$sql="SELECT * FROM persona WHERE ci=$ci_doc";
	$Resultado=mysql_db_query($bd,$sql);
	$nfilas=mysql_num_rows($Resultado);
	
	if($nfilas>0){
		$Registro=mysql_fetch_array($Resultado);
		$ci_doc=$Registro['ci'];
		$nombre_doc=$Registro['nombre'];
		$apellido_doc=$Registro['apellido'];
		$cod_area=$Registro['cod_area'];
		$telefono=$Registro['telefono'];
		$cod_movil=$Registro['cod_movil'];
		$movil=$Registro['movil'];
		$direccion=$Registro['direccion'];
	}
 }

switch($boton){
	
	case Guardar:
	
if($ci_doc and $nombre_doc and $apellido_doc){
	
	$sql="INSERT INTO persona VALUES ('$ci_doc','$nombre_doc','$apellido_doc','$cod_area','$telefono','$cod_movil','$movil','$direccion','DOCENTE')";
 	$resultado=mysql_db_query($bd,$sql);
	
		?>
			<script>
			alert("Sus datos se han guardado exitosamente");
			window.location.href='index.php?pag=4&&ci=<?php echo $ci_doc;?>';
			</script>
		<?php
}
	break;
	
	
	case Editar:
	
if($ci_doc and $nombre_doc and $apellido_doc and $grado and $seccion){
	
  	$registros=mysql_query("update persona set 						 
					   nombre='$nombre_doc', 
					   apellido='$apellido_doc',
					   cod_area='$cod_area',
					   telefono='$telefono',
					   cod_movil='$cod_movil',
					   movil='$movil',
					   direccion='$direccion'	
					   where ci='$ci_doc'",$conexion);
	

		?>
			<script>
			alert("Sus datos se han editado exitosamente");
			window.location.href='index.php?pag=4&&ci=<?php echo $ci_doc;?>';
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
<legend style="text-align:center"><B><?php if($op=='G'){ echo 'REGISTRAR '; }elseif($op=='E'){ echo 'EDITAR ';}?>DOCENTE</B><br /><br /></legend>
<form action="#" method="post" name="docente">
<table align="center" cellpadding="3px" cellspacing="3px">
<tr>

<td><font color="red">*</font> Cedula:</td><td><input type="text" name="ci_doc" value="<?php echo $ci_doc;?>"  onKeyPress="return permite(event, 'num')" maxlength="8">
<!--<button  type="submit" value="Buscar" name="boton" ><img src="imagenes/buscar.png" title="Buscar"/></button> --></td>
</tr>
<tr>

<td><font color="red">*</font> Nombre:</td><td><input type="text" name="nombre_doc" value="<?php echo $nombre_doc;?>" onKeyPress="return permite(event, 'num_car')" onblur="this.value=this.value.toUpperCase()"></td>
</tr><tr>
<td><font color="red">*</font> Apellido:</td><td><input type="text" name="apellido_doc" value="<?php echo $apellido_doc;?>" onKeyPress="return permite(event, 'num_car')" onblur="this.value=this.value.toUpperCase()"></td>
</tr>

<?php include("funciones/telefonos.php");?>
<tr>

<td ><font color="red">*</font> Direcci&oacute;n:</td><td colspan="3">
<textarea cols="21" name="direccion"  onKeyPress="return permite(event, 'num_car')" onblur="this.value=this.value.toUpperCase()"><?php echo $direccion;?></textarea></td></tr>
<tr>



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

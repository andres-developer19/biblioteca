<?php include ('funciones/fsesion.php');
if($usuario!="")
{
include("funciones/conexion.php");
include("funciones/cambiarformatofecha.php");
extract($_POST);
date_default_timezone_set("America/Caracas" ) ; 

$hoy = date('Y-m-d',time() - 3600*date('I'));



switch($boton){
	
	case Buscar:
	$fecha2=cambiarFormatoFecha($fecha4);
	$sql="select *, DATE_FORMAT(fecha,'%d/%m/%Y') as 'fecha' from calendario where fecha='$fecha2'";
	$Resultado=mysql_db_query($bd,$sql);
	$nfilas=mysql_num_rows($Resultado);
	
	if($nfilas>0){
		$Registro=mysql_fetch_array($Resultado);
		$id_cal=$Registro['id_cal'];
		$fecha4=$Registro['fecha'];
		$titulo=$Registro['titulo'];
		$descripcion=$Registro['descripcion'];
		$imagen=$Registro['imagen'];
		

	$mostrar='si';
	
	}else{
		?>
			<script>
			alert("El Acontecimiento no est\u00e1 registrado");
			</script>
		<?php
	}

    break;
	
	case Guardar:
	
	
if($fecha4 and $titulo and $descripcion){
	
	
	$fecha2=cambiarFormatoFecha($fecha4);
	
	
$status = "";
if ($_POST["action"] == "upload") {
	// obtenemos los datos del archivo 
	$tamano = $_FILES["archivo"]['size'];
	$tipo = $_FILES["archivo"]['type'];
	$archivo = $_FILES["archivo"]['name'];
	$prefijo = substr(md5(uniqid(rand())),0,6);
	
	if ($archivo != "") {
		// guardamos el archivo a la carpeta files
		$destino =  "files/".$fecha2;
		if (copy($_FILES['archivo']['tmp_name'],$destino)) {
			$status = "Archivo subido: <b>".$archivo."</b>";
		} else {
			$status = "Error al subir el archivo";
		}
	} else {
		$status = "Error al subir archivo";
	}
}


	$sql="INSERT INTO calendario VALUES('','$fecha2','$titulo','$descripcion')";
	$resultado=mysql_db_query($bd,$sql);
	
	
		?>
			<script>
			alert("Sus Datos se han guardado exitosamente");
			</script>
		<?php


}
	break;
   
	case Editar:
	
	if($fecha4 and $titulo and $descripcion){
		
	$fecha2=cambiarFormatoFecha($fecha4);
    $registros=mysql_query("update calendario set
						   titulo='$titulo',
						   descripcion='$descripcion'
						   where fecha='$fecha2'",$conexion);	
	
$status = "";

if ($_POST["action"] == "upload") {
	// obtenemos los datos del archivo 
	$tamano = $_FILES["archivo"]['size'];
	$tipo = $_FILES["archivo"]['type'];
	$archivo = $_FILES["archivo"]['name'];
//	$prefijo = substr(md5(uniqid(rand())),0,6);
	
	if ($archivo != "") {
		// guardamos el archivo a la carpeta files
		$destino =  "files/".$fecha2;
		if (copy($_FILES['archivo']['tmp_name'],$destino)) {
			//$status = "Archivo subido: <b>".$archivo."</b>";
		} else {
			//$status = "Error al subir el archivo";
		}
	} else {
		//$status = "Error al subir archivo";
	}
}	


	
	
  
  		?>
			<script>
			alert("Sus datos se han editado exitosamente");
			</script>
		<?php
}
   break; 
	
	case Eliminar:
	$fecha2=cambiarFormatoFecha($fecha4);
	$registro=mysql_query("delete from calendario where fecha='$fecha2'",$conexion);
    mysql_close($conexion);
	
		?>
			<script>
			alert("Sus Datos se han eliminado exitosamente");
			</script>
		<?php

$acontecimiento='';

   break;
   
   case Limpiar:
   
	?><script>window.location.href='index.php?pag=1.1';</script><?php

    break;
   
}   
?>
<fieldset id="Formulario" name="acontecimiento">
<legend><B>REGISTRAR ACONTECIMIENTO</B><br /><br /></legend>
<form action="#" method="post" name="acontecimiento" enctype="multipart/form-data">
<table  cellpadding="5px" cellspacing="5px">
<tr>
<td><font color="red">*</font> Fecha: </td>
<td>
<input type="text" name="fecha4" onKeyPress="return permite(event, 'num')" value="<?php echo $fecha4;?>" maxlength="10">
<a href="javascript:showCal('Calendar4')" title="Calendario">
<img src="imagenes/calendario.png" title="Calendario">
<button  type="submit" value="Buscar" name="boton" ><img src="imagenes/buscar.png" title="Buscar"/></button>

</td>
</tr>
<tr>
<td><font color="red">*</font> Acontecimiento: </td>
<td><input type="text" name="titulo" value="<?php echo $titulo;?>" onblur="this.value=this.value.toUpperCase()"></td>
</tr>
<tr>
<td><font color="red">*</font> Descripci&oacute;n: </td>
<td><textarea name="descripcion" cols="22" rows="5" style="resize:none" onblur="this.value=this.value.toUpperCase()"><?php echo $descripcion;?></textarea></td>
</tr>
<tr>

<td>&nbsp;&nbsp;&nbsp;Imagen: </td>
<td>
<?php 
$fecha2=cambiarFormatoFecha($fecha4);
	if ($gestor = opendir('files')) {
		
	    while (false !== ($arch = readdir($gestor))) {
		   if ($arch != "." && $arch != "..") {
			   if($arch==$fecha2){
			   echo "<img src=\"files/".$arch."\" class=\"linkli\" width=\"50px\" height=\"50px\"><br>";
			  }
		   }
	    }
	    closedir($gestor);
	
	}
	?>	<br />
      <input name="archivo" type="file" class="casilla" id="archivo" size="35" accept="image/gif" title="Solo im&aacute;genes Gif">
      <!--<input name="enviar" type="submit" class="boton" id="enviar" value="Upload File" /> -->
	  <input name="action" type="hidden" value="upload" />
      <br />
      <?php echo $status; ?>
      
</td>

</tr>
</table>
<br />
<font color="red" style="font-style:italic;">* Campos Obligatorios</font>
<BR /><BR />

<?php if($mostrar=='si'){?>
<button  type="submit" value="Editar" name="boton" onClick="valida_envia10()" ><img src="imagenes/editar.png" title="Editar"/></button>
<button  type="submit" value="Eliminar" name="boton" ><img src="imagenes/eliminar.png" title="Eliminar"/></button>
<?php }else{?>
<button  type="submit" value="Guardar" name="boton" onClick="valida_envia10();" ><img src="imagenes/guardar.png" title="Guardar"/></button>
<?php }?>
<button  type="submit" value="Limpiar" name="boton" ><img src="imagenes/limpiar.png" title="Limpiar"/></button>

</form>
</fieldset>
<?php } else { ?> 
<script>
alert("Debes Iniciar Sesion");
location.href='index.php';
</script>
<?php  } ?>
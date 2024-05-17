<?php include ('funciones/fsesion.php');
if($usuario!="")
{
	
include("funciones/conexion.php");
extract($_POST);

switch($boton){
	
	 case Buscar:
	 
     $sql="select  *, count(cota) as cantidad from lib_doc, documento where lib_doc.cota=documento.cota_doc and lib_doc.cota like  '%".$cota_doc."-%' order By cota";
	$Resultado=mysql_db_query($bd,$sql);
	$nfilas=mysql_num_rows($Resultado);
	
	if($nfilas>0){
		$Registro=mysql_fetch_array($Resultado);
		$id_d=$Registro['id_d'];
		//$cota_doc=$Registro['cota'];
		$tipo_doc=$Registro['tipo'];
		$nombre_doc=$Registro['nombre'];
		$area=$Registro['area'];
		$cant_doc=$Registro['cantidad'];
		$cantidad=$Registro['cantidad'];
		$cota_doc=str_replace("-0","",$Registro['cota']);
	
	$mostrar='si';
	}else{	
	
		?>
			<script>
			alert("El codigo ingresado no existe");
			</script>
		<?php
	}


    break;
	
	case Guardar:
	
if($cota_doc and $tipo_doc and $nombre_doc and $area and $cant_doc){
	
	for($i=0;$i<$cant_doc;$i++){
	
	$cota=$cota_doc.'-'.$i;
	
	$sql="INSERT INTO lib_doc VALUES ('','$cota','$nombre_doc','DISPONIBLE','Documento')";
 	$resultado=mysql_db_query($bd,$sql);
	$sql2="INSERT INTO documento VALUES ('$cota','$tipo_doc','$area')";
 	$resultado=mysql_db_query($bd,$sql2);
	}
		?>
			<script>
			alert("Sus datos se han guardado exitosamente");
			</script>
		<?php
}
	break;
	
	case Editar:
if($cota_doc and $tipo_doc and $nombre_doc and $area and $cant_doc){
	
    $registros=mysql_query("update lib_doc set nombre='$nombre_doc' where lib_doc.cota like  '%".$cota_doc."-%'",$conexion);
	
	$registros=mysql_query("update documento set 						 
					   tipo='$tipo_doc', 
					   area='$area' 
					   where cota_doc like  '%".$cota_doc."-%'",$conexion);
	

		?>
			<script>
			alert("Sus datos se han editado exitosamente");
			</script>
		<?php
}
    break; 
    
	
	case Eliminar:
	
	for($i=$cant_doc;$i>0;$i--){
			
			$num=$cantidad-$i;
			$cota=$cota_doc.'-'.$num; 
			//echo $cota;
			//$registro=mysql_query("delete from lib_doc where cota like  '%".$cota_lib."-%'",$conexion);
			$registro=mysql_query("delete from lib_doc where cota='$cota'",$conexion);
   		
	
		}
/*	$registro=mysql_query("delete from lib_doc where cota like '%".$cota_doc."-%'",$conexion);
    mysql_close($conexion);*/
	
	?>
			<script>
			alert("Sus datos se han eliminado exitosamente");
			</script>
	<?php
	
	$id_d="";
	$cota_doc="";
	$tipo_doc="";
	$nombre_doc="";
	$area="";
	$cant_doc="";
	
		
    break;
   
    case Limpiar:
	
	?><script>window.location.href='index.php?pag=3';</script><?php

    break;
  
   
}   
?>
<fieldset id="Formulario" style="border: 2px solid #649DC8; width:800px; height:450px; text-align: justify">
<legend style="text-align:center"><B>REGISTRAR DOCUMENTO</B><br /><br /></legend>
<form action="#" method="post" name="documento">
<table align="center" cellpadding="3px" cellspacing="3px">
<tr><td><font color="red">*</font> Codigo:</td><td><input type="text" name="cota_doc" value="<?php echo $cota_doc;?>"  onKeyPress="return permite(event, 'num')">
<button  type="submit" value="Buscar" name="boton" ><img src="imagenes/buscar.png" title="Buscar"/></button></td></tr>
<tr><td><font color="red">*</font>Nombre del Documento:</td><td><input type="text" name="nombre_doc" value="<?php echo $nombre_doc;?>" onKeyPress="return permite(event, 'num_car')" onblur="this.value=this.value.toUpperCase()"></td></tr>
<tr>
  <td><font color="red">*</font> Tipo:</td>
  <td><select name="tipo_doc">
  <option value="">Seleccione un tipo</option>
  <option value="MAPA"<?php if($tipo_doc=='MAPA'){ echo "selected";}?>>MAPA</option>
  <option value="REVISTA"<?php if($tipo_doc=='REVISTA'){ echo "selected";}?>>REVISTA</option>
  <option value="PERIODICO"<?php if($tipo_doc=='PERIODICO'){ echo "selected";}?>>PERIODICO</option>
  </select>
  </td>
</tr>
<tr>
  <td><font color="red">*</font> Area:</td>
  <td><select name="area">
  <option value="">Seleccione una area</option>
  <option value="HISTORIA"<?php if($area=='HISTORIA'){ echo "selected";}?>>Historia</option>
  <option value="GEOGRAFIA"<?php if($area=='GEOGRAFIA'){ echo "selected";}?>>Geografia</option>
  <option value="CASTELLANO"<?php if($area=='CASTELLANO'){ echo "selected";}?>>Castellano</option>
  <option value="MATEMATICA"<?php if($area=='MATEMATICA'){ echo "selected";}?>>Matematica</option>
  </select>
  </td>
</tr>
<tr>
  <td><font color="red">*</font> Cantidad:</td>
  <td><input type="hidden" name="cantidad" value="<?php echo $cantidad;?>" />
  <input type="text" name="cant_doc" value="<?php echo $cant_doc;?>"  onKeyPress="return permite(event, 'num')"></td>
</tr>
</table>

<center>
<BR /><BR />
<font color="red" style="font-style:italic;">* Campos Obligatorios</font>
<br /><br />

<?php if($mostrar=='si'){?>
<button  type="submit" value="Editar" name="boton" onClick="valida_envia()" ><img src="imagenes/editar.png" title="Editar"/></button>
<?php 			 if($nivel==1){?>
<button  type="submit" value="Eliminar" name="boton" ><img src="imagenes/eliminar.png" title="Eliminar"/></button>
<?php 			 }
	  }else{
?>
<button  type="submit" value="Guardar" name="boton" onClick="valida_envia();" ><img src="imagenes/guardar.png" title="Guardar"/></button>
<?php }?>
<button  type="submit" value="Limpiar" name="boton" ><img src="imagenes/limpiar.png" title="Limpiar"/></button>


</center>
</form>
</fieldset>
<?php } else { ?> 
<script>
alert("Debes Iniciar Sesion");
location.href='index.php';
</script>
<?php } ?>

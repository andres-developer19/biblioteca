<?php include ('funciones/fsesion.php');
if($usuario!="")
{
	
include("funciones/conexion.php");
extract($_POST);

switch($boton){
	
	case Buscar:
	//select * from lib_doc left join libro on lib_doc.cota=libro.cota_lib
   // $sql="select  * from lib_doc where cota like  '%".$cota_lib."%'";
   // $sql="select  * from lib_doc where cota like  '%".$cota_lib."%'";
 //  $sql="select  * from lib_doc left join libro on lib_doc.cota=libro.cota_lib and lib_doc.cota like  '%".$cota_lib."%'";
  $sql="select *, count(cota) as cantidad from lib_doc, libro where lib_doc.cota=libro.cota_lib and lib_doc.cota like  '%".$cota_lib."-%' order By cota";
	$Resultado=mysql_db_query($bd,$sql);
	$nfilas=mysql_num_rows($Resultado);
	
	if($nfilas>0){
		$Registro=mysql_fetch_array($Resultado);
		$id_libro=$Registro['id'];
		//$cota_lib=$Registro['cota'];
		$nombre_lib=$Registro['nombre'];
		$autor_lib=$Registro['autor'];
		$editorial_lib=$Registro['editorial'];
		$asignatura_lib=$Registro['asignatura'];
		$anio_edicion=$Registro['anio_edicion'];
		$paginas=$Registro['paginas'];
		$grado=$Registro['grado'];
		$cant_lib=$Registro['cantidad'];
		$cantidad=$Registro['cantidad'];
		$cota_lib=str_replace("-0","",$Registro['cota']);
	
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
	
if($cota_lib and $nombre_lib and $autor_lib and $asignatura_lib and $grado and $cant_lib){
	
	for($i=0;$i<$cant_lib;$i++){
	
	$cota=$cota_lib.'-'.$i;  
	$sql="INSERT INTO lib_doc VALUES ('','$cota','$nombre_lib','DISPONIBLE','Libro')";
	$resultado=mysql_db_query($bd,$sql);
	$sql2="INSERT INTO libro VALUES ('$cota','$autor_lib','$editorial_lib','$asignatura_lib','$anio_edicion','$paginas','$grado')";
  	$resultado=mysql_db_query($bd,$sql2);
	
	}
		?>
			<script>
			alert("Sus Datos se han guardado exitosamente");
			</script>
		<?php
}
	break;
   
	case Editar:
	
if($cota_lib and $nombre_lib and $autor_lib and $asignatura_lib and $grado and $cant_lib){
	
    $registros=mysql_query("update lib_doc set nombre='$nombre_lib' where lib_doc.cota like  '%".$cota_lib."-%'",$conexion);
	
	
    $registros2=mysql_query("update libro set 
					   autor='$autor_lib', 
					   editorial='$editorial_lib', 
					   asignatura='$asignatura_lib',
					   anio_edicion='$anio_edicion',
					   paginas='$paginas',
					   grado='$grado'
					   where cota_lib like  '%".$cota_lib."-%'",$conexion);
	
	
  
  		?>
			<script>
			alert("Sus datos se han editado exitosamente");
			</script>
		<?php
}
   break; 
	
	case Eliminar:
		
		for($i=$cant_lib;$i>0;$i--){
			
			$num=$cantidad-$i;
			$cota=$cota_lib.'-'.$num; 
			//echo $cota;
			//$registro=mysql_query("delete from lib_doc where cota like  '%".$cota_lib."-%'",$conexion);
			$registro=mysql_query("delete from lib_doc where cota='$cota'",$conexion);
   		
	
		}
		?>
			<script>
			alert("Sus Datos se han eliminado exitosamente");
			</script>
		<?php 
		
	$id_lib="";
	$cota_lib="";
	$nombre_lib="";
	$autor_lib="";
	$editorial_lib="";
	$asignatura_lib="";
	$anio_edicion="";
	$paginas="";
	$grado="";
	$cant_lib="";
		
   break;
   
   case Limpiar:
   
	?><script>window.location.href='index.php?pag=2';</script><?php

    break;
   
}   
?>
<fieldset id="Formulario" style="border: 2px solid #649DC8; width:800px; height:450px; text-align: justify">
<legend style="text-align:center"><B>REGISTRAR LIBRO</B><br /><br /></legend>
<form action="#" method="post" name="libro">
<table align="center" cellpadding="3px" cellspacing="3px">
<tr>
  <td><font color="red">*</font> Codigo:</td><td><input type="text" name="cota_lib" value="<?php echo $cota_lib;?>" onKeyPress="return permite(event, 'num')">
<button  type="submit" value="Buscar" name="boton"><img src="imagenes/buscar.png" title="Buscar"/></button></td>
</tr>
<tr><td><font color="red">*</font> T&iacute;tulo:</td><td><input type="text" name="nombre_lib" value="<?php echo $nombre_lib;?>" onKeyPress="return permite(event, 'num_car')" onblur="this.value=this.value.toUpperCase()"></td></tr>
<tr><td><font color="red">*</font> Autor:</td><td><input type="text" name="autor_lib" value="<?php echo $autor_lib;?>" onKeyPress="return permite(event, 'car')" onblur="this.value=this.value.toUpperCase()"></td></tr>
<tr><td>&nbsp;&nbsp; A&ntilde;o de Edici&oacute;n:</td><td><input type="text" name="anio_edicion" value="<?php echo $anio_edicion;?>" onKeyPress="return permite(event, 'num')" maxlength="4"></td></tr>
<tr>
  <td>&nbsp;&nbsp; Editorial:</td>
  <td><input type="text" name="editorial_lib" value="<?php echo $editorial_lib;?>"  onKeyPress="return permite(event, 'num_car')" onblur="this.value=this.value.toUpperCase()"></td>
</tr>
<tr><td>&nbsp;&nbsp; N&uacute;mero de P&aacute;ginas:</td><td><input type="text" name="paginas" value="<?php echo $paginas;?>" onKeyPress="return permite(event, 'num')"></td></tr>
<tr>
  <td><font color="red">*</font> Asignatura:</td>
  <td><select name="asignatura_lib">
  <option value="">Seleccione una asignatura</option>
  <option value="HISTORIA"<?php if($asignatura_lib=='HISTORIA'){ echo "selected";}?>>HISTORIA</option>
  <option value="GEOGRAFIA"<?php if($asignatura_lib=='GEOGRAFIA'){ echo "selected";}?>>GEOGRAF&Iacute;A</option>
  <option value="CASTELLANO"<?php if($asignatura_lib=='CASTELLANO'){ echo "selected";}?>>CASTELLANO</option>
  <option value="MATEMATICA"<?php if($asignatura_lib=='MATEMATICA'){ echo "selected";}?>>MATEM&Aacute;TICA</option>
  </select></td>
</tr>
<tr>
  <td><font color="red">*</font> Grado:</td>
  
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
</tr>
<tr>
  <td><font color="red">*</font> Cantidad:</td>
  <td>
  <input type="hidden" name="cantidad" value="<?php echo $cantidad;?>" />
  <input type="text" name="cant_lib" value='<?php echo $cant_lib;?>' onKeyPress="return permite(event, 'num')"></td>
</tr>
</table>
<center>
<br />
<font color="red" style="font-style:italic;">* Campos Obligatorios</font>
<BR /><BR />

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
<?php  } ?>

<?php include ('funciones/fsesion.php');
if($usuario!="")
{
	
	include("funciones/conexion.php");	
	include("funciones/cambiarformatofecha.php");
	$hoy = date('d/m/Y',time() - 3600*date('I')); 
	
	extract($_POST);
	
	
		switch($boton){
	
	case 'Buscar Estudiante':


    $sql="SELECT * FROM persona, estudiante WHERE persona.ci=estudiante.ci_est and ci_est='$ci_est'";
	$Resultado=mysql_db_query($bd,$sql);
	$nfilas=mysql_num_rows($Resultado);
	
	if($nfilas>0){
		$Registro=mysql_fetch_array($Resultado);
		$ci_est=$Registro['ci'];
		$nombre_est=$Registro['nombre'];
		$apellido_est=$Registro['apellido'];
		$grado_est=$Registro['grado'];
		$seccion=$Registro['seccion'];
		
	
    $sql2="SELECT *, DATE_FORMAT(fecha_devolucion,'%d/%m/%Y') as 'fecha_devolucion' 
	FROM prestamo, relacion, lib_doc 
	WHERE prestamo.id_p=relacion.id_p and relacion.id=lib_doc.id and fecha_real='0000-00-00' and prestamo.ci='$ci_est'";
	$Resultado=mysql_db_query($bd,$sql2);
	$nfilas=mysql_num_rows($Resultado);
	
	if($nfilas>0){
		$Registro=mysql_fetch_array($Resultado);
		$fecha_devolucion=$Registro['fecha_devolucion'];
		$id_p=$Registro['id_p'];
		$tipo=$Registro['tipo'];
		$titulo=$Registro['nombre'];
		$cota=$Registro['cota'];
					
					$sql2="SELECT * FROM $tipo";
						$Resultado=mysql_db_query($bd,$sql2);
						$nfilas=mysql_num_rows($Resultado);
	
							if($nfilas>0){
								$Registro=mysql_fetch_array($Resultado);
								$tipo_doc=$Registro['tipo_doc'];								
								$grado=$Registro['grado'];
							}
	}else{
		$saldado='si';
	}
		
$mostrar='si';
	
	
	}else{
		?>
			<script>
			alert("El estudiante no está registrado");
			</script>
		<?php
	}

    break;
	
	case Guardar:

	$fecha2=cambiarFormatoFecha($fecha);

	$registros=mysql_query("update relacion set
						   fecha_real='$fecha2'
						   where id_p='$id_p'",$conexion);
	
	$registros2=mysql_query("update prestamo set
						   observaciones='$observaciones'
						   where id_p='$id_p'",$conexion);
	
		?>
			<script>
			alert("Sus Datos se han guardado exitosamente");
			</script>
		<?php

	break;
   
	
	case Limpiar:
	
	?><script>window.location.href='index.php?pag=8';</script><?php

    break;
  
	
}
?>
<fieldset id="Formulario" style="border: 2px solid #649DC8; width:800px; height:450px; ">
<legend><B>DEVOLUCIÓN DE LIBROS O DOCUMENTOS</B><br /><br /></legend>
<form action="#" method="post" name="devolucion">
<table align="center">
<tr>

<td valign="top">




<fieldset><legend>Búsqueda de Estudiante</legend>
<table class="busqueda">
<tr>
<td>Estudiante: </td>
<td><input type="text" maxlength="8"  name="ci_est" value="<?php echo $ci_est;?>" ></td>
<td><button  type="submit" value="Buscar Estudiante" name="boton"><img src="imagenes/buscar.png" title="Buscar"/></button></td>
</tr>
</table>
</fieldset>

<fieldset><legend>Ficha de Estudiante</legend>
<?php 
if($mostrar=='si'){
	
echo $nombre_est.' '.$apellido_est.'<br> Grado: '.$grado_est.' - Sección: '.$seccion;


		if($saldado==''){ 
		    echo '<br /><br /><center> Libro o Documento por Devolver</center><br>';
			if($tipo=='LIBRO'){ echo $tipo;} else{ echo $tipo_doc;}
			echo ': '.$cota.' / '.$titulo.'<br>';
			echo 'Fecha a devolver: '.$fecha_devolucion.'<br>';	
		}else{
			echo '<br /><br />No tiene préstamo pendiente<br>';
		}
}
?>
</fieldset>
<?php if($saldado==''){ ?>
<fieldset><legend>Préstamo</legend>
<table>
<tr><td>Fecha Actual: </td><td>
<input name="fecha" type="text" maxlength="10" size="10" value='<?php echo $hoy;?>'><a href="javascript:showCal('Calendar1')" title="Calendario">
	<img src="imagenes/calendario.png" title="Calendario">
</td>
</tr><tr><td>Observaciones: </td><td>
<textarea cols="21" rows="3" name="observaciones"><?php echo $observaciones;?></textarea>
<input type="hidden" name="id_p" value="<?php echo $id_p;?>"></td></tr>
</table>
</fieldset>
<?php } ?>
</td>



</tr>

<tr><td align="center" colspan="2">
<br /><br />
<button  type="submit" value="Guardar" name="boton" onClick="valida_envia()"><img src="imagenes/guardar.png" title="Devolver Libro o Documento"/></button>
<button  type="submit" value="Limpiar" name="boton"><img src="imagenes/limpiar.png" title="Limpiar"/></button>
</td></tr>
</table>
</div>

</form>
</fieldset>
<?php } else { ?> 
<script>
alert("Debes Iniciar Sesion");
location.href='index.php';
</script>
<?php } ?>

<?php include ('funciones/fsesion.php');
if($usuario!="")
{
	
	include("funciones/conexion.php");
	extract($_POST);
	$ci=$_GET['ci'];
	if($ci!=''){
		$ci_est=$ci; include("funciones/select_estudiante.php");
			
	}
	$modo='disabled';
	switch($boton){
		
	
	case 'Buscar Estudiante':
	
if($ci_est!=''){ //IF 1

	$sql="SELECT * FROM persona WHERE ci='$ci_est'";
    
	$Resultado=mysql_db_query($bd,$sql);
	$nfilas=mysql_num_rows($Resultado);
	
	if($nfilas>0){ //IF 2
		$Registro=mysql_fetch_array($Resultado);
		$ci_est=$Registro['ci'];
		$nombre_est=$Registro['nombre'];
		$apellido_est=$Registro['apellido'];
		$tipo_persona=$Registro['tipo'];
	
		
$mostrar='si';

	$sql2="SELECT * FROM persona, estudiante WHERE persona.ci=estudiante.ci_est and ci_est='$ci_est'";
    
	$Resultado2=mysql_db_query($bd,$sql2);
	$nfilas=mysql_num_rows($Resultado2);
	
	if($nfilas>0){ //IF 2
		$Registro=mysql_fetch_array($Resultado2);
		$grado_est=$Registro['grado'];
		$seccion=$Registro['seccion'];
	}
	
	$sql="select *, 
		DATE_FORMAT(prestamo.fecha_actual,'%d/%m/%Y') as 'fecha_actual', 
		DATE_FORMAT(prestamo.fecha_devolucion,'%d/%m/%Y') as 'fecha_devolucion', 
		DATE_FORMAT(relacion.fecha_real,'%d/%m/%Y') as 'fecha_real' 
		
			from prestamo, relacion, lib_doc 
			where 
				
				prestamo.id_p=relacion.id_p and 
				relacion.id=lib_doc.id and 
				prestamo.ci=$ci_est and 
				prestamo.id_p=(SELECT MAX(id_p) FROM relacion)";
	 
	$Resultado=mysql_db_query($bd,$sql);
	$nfilas=mysql_num_rows($Resultado);
	
	if($nfilas>0){ // IF 3
		$Registro=mysql_fetch_array($Resultado);
		$cota_lib=$Registro['cota'];
		$nombre_lib=$Registro['nombre'];
		$fecha_actual=$Registro['fecha_actual'];
		$fecha_devolucion=$Registro['fecha_devolucion'];
		$fecha_real=$Registro['fecha_real'];
		$tipo=$Registro['tipo'];
		$prestamo='si';
		
		if($fecha_devolucion<$fecha_real){  // IF 4
		
		$sql2="select count(prestamo.id_p) as cantidad from
		prestamo, relacion  
		where 
		prestamo.id_p=relacion.id_p and
		prestamo.fecha_devolucion<relacion.fecha_real and prestamo.ci='$ci_est'";
	 				$Resultado2=mysql_db_query($bd,$sql2);
					$nfilas2=mysql_num_rows($Resultado2);
	
						if($nfilas2>0){ // IF 5
							$Registro=mysql_fetch_array($Resultado2);
								$cantidad=$Registro['cantidad'];
								
								if($cantidad<3){ // IF 6
									$modo='';
									$entrega="<font color='red'>$cantidad&ordm; vez entregando tarde, Por Favor que no se repita</font>";
								}else{
									$entrega="<font color='red'>$cantidad&ordm; vez entregando tarde, Debe pagar sanción</font>";
								}
						}
							
		
		}elseif($fecha_real==0000-00-00){ // IF 7
								
								$entrega="<font color='red'>Favor Entregar el Libro que tiene Pendiente</font>";
						
		}else{
				$modo='';
			}
				
				
	}else{ $modo='';}//else
			
	
	
	}else{
		
		if($nivel==1){ // IF 8
		
if($presionar=='docente'){ ?>

			<script>
			alert("La persona no está registrada");
			location.href='index.php?pag=7.1&&op=G&&ci=<?php echo $ci_est;?>';
			</script>

<?php 	}elseif($presionar=='estudiante'){ ?>

			<script>
			alert("La persona no está registrada");
			location.href='index.php?pag=7&&op=G&&ci=<?php echo $ci_est;?>';
			</script>

<?php  	}
		
		}else{
		?>
        	<script>
			alert("La persona no está registrada");
			</script>
		<?php
		}
	}
	
}else{
		?>
			<script>
			alert("Introduzca la cedula por favor");
			</script>
		<?php
	}
    break;
	
	
	
	
	
	
	
	case 'Editar Estudiante':
	if($presionar=='docente'){ ?><script>window.location.href='index.php?pag=7.1&&op=E&&ci=<?php echo $ci_est;?>';</script><?php 	}
	if($presionar=='estudiante'){ ?><script>window.location.href='index.php?pag=7&&op=E&&ci=<?php echo $ci_est;?>';</script><?php 	}	
		
    break;
	
	case 'Eliminar Estudiante':
	
	$registro=mysql_query("delete from persona where ci='$ci_est'",$conexion);
    mysql_close($conexion);
	
	?>
			<script>
			alert("Sus datos se han eliminado exitosamente");
			window.location.href='index.php?pag=4';
			</script>
	<?php
		
    break;
	
	
	
	case 'Buscar Libro':
	
	?><script>window.location.href='index.php?pag=5&&ci=<?php echo $ci_est;?>';</script><?php

    break;
	
	case 'Buscar Documento':
	
	?><script>window.location.href='index.php?pag=6&&ci=<?php echo $ci_est;?>';</script><?php

    break; 
	
	case Limpiar:
	
	?><script>window.location.href='index.php?pag=4';</script><?php

    break;
  
	
}
?>
<fieldset id="Formulario" style="border: 2px solid #649DC8; width:800px; height:450px; text-align:justify" align="center">
<legend style="text-align:center"><B>PRESTAMO</B><br /><br />
</legend>
<form action="#" method="post" name="prestamo">
<table align="center">
<tr>
<td valign="top">




<center><fieldset>
<legend>Búsqueda de Persona</legend>
<table class="busqueda">
<tr>
<td><input type="radio" name="presionar" value="estudiante" <?php if($presionar=='estudiante'){ echo 'checked'; }?> checked="checked">Estudiante: &nbsp;&nbsp;<br />
<input type="radio" name="presionar" value="docente" <?php if($presionar=='docente'){ echo 'checked'; }?>>Docente:</td>
<td valign="middle">
<input type="text" maxlength="8"  name="ci_est" value="<?php echo $ci_est;?>" size="10" onKeyPress="return permite(event, 'num')">
</td><td valign="middle">
<button  type="submit" value="Buscar Estudiante" name="boton"><img src="imagenes/buscar.png" title="Buscar"/></button>
</td>
</tr>
</table>

</fieldset>
<p align="right">
<?php  if($nivel==1){?>
<button type="submit" value="Editar Estudiante" name="boton"><img src="imagenes/editar.png" title="Editar Estudiante" width="15" height="20"></button>
<button type="submit" value="Eliminar Estudiante" name="boton"><img src="imagenes/eliminar.png" title="Eliminar Estudiante" width="15" height="20"></button>
<?php  }?>
</p>
<fieldset><legend><?php echo $tipo_persona; ?></legend>
<?php 
if($mostrar=='si'){
	
echo $nombre_est.' '.$apellido_est;
if($grado_est!=''){ echo '<br> Grado: '.$grado_est.' - Sección: '.$seccion;}

echo "<br>";

if($prestamo=='si'){
echo "<br>";
echo "<fieldset>";
echo "<legend><b>Estado de cuenta en Préstamos</b>";
echo "</legend>";


echo "<b>$tipo: </b>";
echo $cota_lib;
echo "<br>";
echo "<b>Nombre del Libro: </b>";
echo $nombre_lib;
echo "<br>";
echo "<b>Fecha Actual: </b>";
echo $fecha_actual;
echo "<br>";
echo "<b>Fecha Devolucion: </b>";
echo $fecha_devolucion;
echo "<br>";
echo "<b>Fecha Real: </b>";
echo $fecha_real;
echo "</fieldset>";

echo $entrega;

}

}
?>

</fieldset>

</center>


</td>



</tr>

<tr><td align="center" colspan="2">
<br />
<button type="submit" value="Buscar Libro" name="boton" <?php echo $modo;?>><img src="imagenes/libro.png" title="Buscar Libro"/></button>
<button  type="submit" value="Buscar Documento" name="boton" <?php echo $modo;?>><img src="imagenes/documento.png" title="Buscar Documento"/></button>
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

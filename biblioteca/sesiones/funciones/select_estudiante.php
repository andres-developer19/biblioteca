<?php
$sql="SELECT * FROM persona WHERE ci='$ci_est'";
    
	$Resultado=mysql_db_query($bd,$sql);
	$nfilas=mysql_num_rows($Resultado);
	
	if($nfilas>0){ //IF 2
		$Registro=mysql_fetch_array($Resultado);
		$ci_est=$Registro['ci'];
		$nombre_est=$Registro['nombre'];
		$apellido_est=$Registro['apellido'];
		$tipo=$Registro['tipo'];
	
		
$mostrar='si';

	$sql2="SELECT * FROM persona, estudiante WHERE persona.ci=estudiante.ci_est and ci_est='$ci_est'";
    
	$Resultado2=mysql_db_query($bd,$sql2);
	$nfilas=mysql_num_rows($Resultado2);
	
	if($nfilas>0){ //IF 2
		$Registro=mysql_fetch_array($Resultado2);
		$grado_est=$Registro['grado'];
		$seccion=$Registro['seccion'];
	}
		
$mostrar='si';

	/*"SELECT *, DATE_FORMAT(prestamo.fecha_actual,'%d/%m/%Y') as 'fecha_actual', DATE_FORMAT(prestamo.fecha_devolucion,'%d/%m/%Y') as 'fecha_devolucion', DATE_FORMAT(relacion_lib.fecha_real2,'%d/%m/%Y') as 'fecha_real2' FROM estudiante, prestamo, relacion_lib, libro
						   where
						   estudiante.ci_est=prestamo.ci_est and
						   prestamo.id_p=relacion_lib.id_p and
						   relacion_lib.cota_lib=libro.cota_lib and
						   estudiante.ci_est=$ci_est and prestamo.id_p=(SELECT MAX(id_p) FROM prestamo)";*/
						   
	 $sql="select *, DATE_FORMAT(prestamo.fecha_actual,'%d/%m/%Y') as 'fecha_actual', DATE_FORMAT(prestamo.fecha_devolucion,'%d/%m/%Y') as 'fecha_devolucion', DATE_FORMAT(relacion.fecha_real,'%d/%m/%Y') as 'fecha_real' from prestamo, relacion, lib_doc where 
prestamo.id_p=relacion.id_p and relacion.id=lib_doc.id and prestamo.ci=$ci_est and prestamo.id_p=(SELECT MAX(id_p) FROM prestamo)";
	 
	 $Resultado=mysql_db_query($bd,$sql);
	$nfilas=mysql_num_rows($Resultado);
	
	if($nfilas>0){
		$Registro=mysql_fetch_array($Resultado);
		$cota_lib=$Registro['cota'];
		$nombre_lib=$Registro['nombre'];
		$fecha_actual=$Registro['fecha_actual'];
		$fecha_devolucion=$Registro['fecha_devolucion'];
		$fecha_real=$Registro['fecha_real'];
		
		
		$prestamo='si';
	}	
	}
?>
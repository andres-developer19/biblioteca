<?php 
$num=0;
 //IF 1
 
if($cedulauser and $nombreuser and $apellidouser and $direccion and $usuario1 and $clave  and clave2 and $niveluser){
	
if($clave!=$clave2){ //IF 2


	$var="<font color=#FF0000'>LAS CLAVES NO COINCIDEN</font>";
	
	$num=0;
	
}else{
	include("funciones/conexion.php");
	$sql="select usuario from usuario where usuario='$usuario1'";
	$Resultado=mysql_db_query($bd,$sql);
	$nfilas=mysql_num_rows($Resultado);
	if($nfilas>0){ // IF 3
	$var="<font color=#FF0000'>EL NOMBRE DE USUARIO YA EST&Aacute; SIENDO UTILIZADO</font>";
	
	$num=0;
	}else{
	$num=1;
	} // FIN IF 3
	
	
	}// FIN IF 2
	
	} // FIN IF 1
	


if($num!=0){

include ('funciones/conexion.php');
mysql_select_db($bd, $conexion);
$sql="insert into usuario values ('$cedulauser','$nombreuser', '$apellidouser','$cod_area','$telefono','$cod_movil','$movil','$direccion',
								  '$usuario1','$clave','$niveluser')";
$resultado=mysql_db_query($bd,$sql);
$cedulauser="";
$nombreuser="";
$apellidouser="";
$usuario1="";
$clave="";
$clave2="";
$niveluser="";
$cod_area="";
$telefono="";
$cod_movil="";
$movil="";
$direccion="";

			?>
			<script>
			alert("Sus datos se han guardado exitosamente");
			</script>
		<?php	
	
			
}
?>
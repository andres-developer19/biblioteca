<fieldset id="Formulario" name="acontecimientos" style="width:750px">
<legend><B>ACONTECIMIENTOS</B><br /><br /></legend>
<table cellpadding="5px" cellspacing="5px" > 
<?php

	$día = date("d");
	$mes = date("M");
	$año = date("Y");
	switch($mes) {
			case "Jan" : $mes="Enero de $año";
						break;
			case "Feb" : $mes="Febrero de $año";
						break;
			case "Mar" : $mes="Marzo de $año";
						break;
			case "Apr" : $mes="Abril de $año";
						break;
			case "May" : $mes="Mayo de $año";
						break;
			case "Jun" : $mes="Junio de $año";
						break;
			case "Jul" : $mes="Julio de $año";
						break;
			case "Ago" : $mes="Agosto de $año";
						break;
			case "Sep" : $mes="Septiembre de $año";
						break;
			case "Oct" : $mes="Octubre de $año";
						break;
			case "Nov" : $mes="Noviembre de $año";
						break;
			case "Dec" : $mes="Diciembre de $año";
						break;
				}


include("funciones/conexion.php");
include("funciones/cambiarformatofecha.php");

$hora = date('h:i a',time() - 3600*date('I')); 
$hoy = date('Y-m-d',time() - 3600*date('I')); 

 	$sql="select *, DATE_FORMAT(fecha,'%d/%m/%Y') as 'fecha' from calendario where fecha='$hoy'";
	$Resultado=mysql_db_query($bd,$sql);
	$nfilas=mysql_num_rows($Resultado);
	
	if($nfilas>0){
		$Registro=mysql_fetch_array($Resultado);
		$id_cal=$Registro['id_cal'];
		$fecha=$Registro['fecha'];
		$titulo=$Registro['titulo'];
		$descripcion=$Registro['descripcion'];
		$imagen=$Registro['imagen'];
		
		$var='si';
	}

	  if($var!='si'){
	?>
	  
		  
<tr>
<td width="30%"><img src='imagenes/biblioteca.jpg' alt='Imágen de Biblioteca ' width='150px' height='150px'></td>
<td valign="top"><center>U.E.N Miguel Ángel Álvarez<hr></center>
<p style="text-align:justify">Fué fundada el 28 de mayo del año 1.981 y se encuentra ubicada en la urb La Mora, limitando al norte con la avenida número treinta y seis (36), al sur con la urb Techo Propio, al este con la avenida once (11) y al oeste con la avenida nueve (9), 
está bajo la dirección de la profesora Carmen Puerta, sub-director Pedro Rodríguez y los coordinadores: profesor José Viera, profesora Ivonne Fernández, profesora Ana Naranjo y profesor José Gregorio Hernández, actualmente se encuentra una población de cuarenta y ocho (48) profesores y quinientos cuarenta y tres (543) alumnos, este instituto cuenta con una estructura dividida en 16 salones, una dirección, una subdirección, tres (3) seccionales, un laboratorio de química, cafetín y una biblioteca, además cuenta con la elaboración de una nueva sede la cual aún está en proceso de culminación.
</p></td><td width='30%' valign='middle'><?php  include("funciones/calendario.php");?></td>
</tr>
<?php

	  }else{
?>

<tr>
<td align="left" width="20%">
<?php 
date_default_timezone_set("America/Caracas" ) ; 

$hoy = date('Y-m-d',time() - 3600*date('I')); 
	if ($gestor = opendir('files')) {
		
	    while (false !== ($arch = readdir($gestor))) {
		   if ($arch != "." && $arch != "..") {
			   if($arch==$hoy){
			   echo "<img src=\"files/".$arch."\" class=\"linkli\" width=\"150px\" height=\"150px\"><br>";
			  }
		   }
	    }
	    closedir($gestor);
	
	}
	?>	
</td>
<td valign="top"><center><?php echo $titulo; ?><hr></center>
<p style='font-size:18px; font-family:'Times New Roman', Times, serif'><?php echo $descripcion; ?></p></td>
<td width='30%'valign='middle'><?php include("funciones/calendario.php");?></td>
<tr>


<?php }?>

</table>


</fieldset>


<?php include ('funciones/fsesion.php');
$opcion=$_GET['pag'];
date_default_timezone_set("America/Caracas" ) ; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<TITLE>Biblioteca U.E.N Miguel Ángel Álvarez</TITLE>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/general.css" rel="stylesheet" type="text/css">
<script language="javascript" src="funciones/cal2.js"></script>
<script language="javascript" src="funciones/cal_conf2.js"></script>
<script language="javascript" src="funciones/validacion.js"></script>
<script language="javascript" src="funciones/vali_form.js"></script>
</head>
<body>
<div class="membrete"></div>
<div class="espacio"><table align="center"><th>
<?php if($opcion>=1&&$opcion<=11||$opcion=='R1'||$opcion=='R2'||$opcion=='R3'||$opcion=='R4'){include("menu/menu-horizontal.php");}?>
</th></table></div>

<div class="contenido">

<table class="tablacontenido">
<tr><td>
<table class="tablainicio">
<tr>
<td valign="top" align="center" >

<?php

switch($opcion){
	
	case '1':
	include ("inicio.php");
	break;
	
	case '1.1':
	include ("acontecimiento.php");
	break;
	
	case '2':
	include ("libro.php");
	break;
	
	case '3':
	include ("documento.php");
	break;
	
	case '4':
	include ("prestamo.php");
	break;
	
	case '5':
	include ("busqueda_libro.php");
	break;
	
	case '6':
	include ("busqueda_documento.php");
	break;
	
	case '7':
	include ("estudiante.php");
	break;
	
	case '7.1':
	include ("docente.php");
	break;
	
	case '8':
	include ("devolucion.php");
	break;
	
	case '9':
	include ("perfil.php");
	break;
	
	case '10':
	include ("newuser.php");
	break;
	
	case '11':
	include ("editar_usuario.php");
	break;
	
	
	case 'R1':
	include ("reporte_libro.php");
	break;
	
	case 'R2':
	include ("reporte_documento.php");
	break;
	
	case 'R3':
	include ("reporte_estudiante.php");
	break;
	
	case 'R4':
	include ("reporte_docente.php");
	break;
	
	case 'construccion':
	include ("construccion.php");
	break;
	
	default:
	include ("ingresar.php");
	break;
}
?>


</td>
</tr>
</table>
</td></tr>
</table>

</div>

<div class="pie">
<?php 
if($opcion==1){ 
echo "<a href='index.php?pag=1.1'><img src='imagenes/acontecimiento.png' title='Agregar Acontecimiento' align='right'></a>";
}elseif($opcion==1.1){ 
echo "<a href='index.php?pag=1'><img src='imagenes/volver.png' title='Atr&aacute;s' align='right'></a>";
}else{
echo $var;
}
?>
</div>
</body>
</html>

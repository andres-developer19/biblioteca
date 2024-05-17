<?php include ('funciones/fsesion.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body alink="#2A3F55" link="#2A3F00" l>
<center>
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<ul id="menu-horizontal">

<?php if($usuario!=""){ ?> 


<a href="index.php?pag=1" title="Ir a Inicio" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:black">
<li>Inicio</li>
</a>
 
<a href="#" title="Agregar Nuevo" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:black">
<li>Agregar Nuevo


<ul>

<a href="index.php?pag=2" title="Libro" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:black">

<li>Libro</li>
</a>


<a href="index.php?pag=3" title="Documento" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:black">
<li>Documento</li>
</a>

</ul>  
</li>
</a>
 
 

<a href="index.php?pag=4" title="Préstamo" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:black">
<li>Préstamo</li>
</a>  

<a href="index.php?pag=8" title="Devolución" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:black">
<li>Devolución</li>
</a> 

  
<a href="" title="Reportes" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:black">
<li>Reportes
<ul>

<a href="index.php?pag=R1" title="Reporte Libros" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:black"><li>Libros</li></a>
<a href="index.php?pag=R2" title="Reporte Documentos" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:black"><li>Documentos</li></a>
<a href="index.php?pag=R3" title="Reporte Estudiantes"style="font-family:'Times New Roman', Times, serif; font-size:12px; color:black" ><li>Estudiantes</li></a>
<a href="index.php?pag=R4" title="Reporte Docentes" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:black" ><li>Docentes</li></a>
</ul>  
</li>
</a>


  
<li><a href="#" title="Usuario">Usuario</a>
<ul>
  
<a href="index.php?pag=9" title="Perfil de Usuario" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:black"><li>Perfil</li></a> 
 
  
<?php }

if($usuario!=""){ if($nivel=="1"){?> 
  
<a href="index.php?pag=10" title="Registrar Nuevo Usuario" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:black"><li>Registrar usuario</li></a>
<a href="index.php?pag=11" title="Editar Usuario" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:black"><li>Editar usuario</li></a>  
  
<?php } ?>
</ul>   
</li>

  
<a href="funciones/cerrar.php" title="Cerrar Sesi&oacute;n" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:black">
<li>Cerrar Sesión</li>
</a>

<?php }?>
</ul> 

</center>
</body>
</html>

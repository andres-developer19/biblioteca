<?php
    session_start();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="shortcut icon" href="../logo.bmp" /> <!--el icono que se mestra en el navegador cuando se visita la página-->
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<meta http-equiv="refresh" content="2; url=../index.php" />
<link href="../css/estilo.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="cerrando" align="center">
					<p>Cerrando Sesión</p>
					<center><img src="../imagenes/cargando.gif" alt="cerrar"></center>
					  <?php 
						session_destroy();
						session_unset();
						
					?>
					
					
		
                  	<script language="javascript" type="text/javascript">							
						alert("Ha cerrado su sesion correctamente");
					</script>			  
 
</div>
</body>
</html>
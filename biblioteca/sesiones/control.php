<?php session_start();
extract($_POST);

	if($usuario!='' && $clave!=''){	
		
//conecto con la base de datos  y selecciono la BBDD  
include("funciones/conexion.php");

//Sentencia SQL para buscar un usuario con esos datos  
$sql="select * from usuario where usuario='$usuario' and clave='$clave'";
    $cursor= mysql_db_query ($bd,$sql);
    $num = mysql_num_rows($cursor);
    
//vemos si el usuario y contraseña es váildo  
//si la ejecución de la sentencia SQL nos da algún resultado  
//es que si que existe esa conbinación usuario/contraseña  
if($num>0){ 
    //usuario y contraseña válidos  
    //defino una sesion y guardo datos 
    session_start();  
    session_register("autentificado");  
    $autentificado = "SI";  
	$arr_asoc = mysql_fetch_array($cursor);
	  
	$usuario= $arr_asoc['usuario'];
	$clave = $arr_asoc['clave'];
	$nivel = $arr_asoc['nivel'];
		  		  	   
    $_SESSION['usuario']=$usuario;
    $_SESSION['clave']=$clave;
    $_SESSION['nivel']=$nivel;
	$_SESSION["nrosesion"]=$aleatorio;
	$_SESSION["autentificado"]=$autentificado;
	//echo $autentificado;

	   header("Location: index.php?errorusuario=no"); 
}else{  
    //si no existe le mando otra vez a la portada  
    header("Location: index.php?errorusuario=si");  
}  
mysql_free_result($rs);  
mysql_close($conn);  

	}else{
		 header("Location: index.php");
	}
?> 
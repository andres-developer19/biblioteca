<?php include ('funciones/fsesion.php');
if($usuario!="")
{
	$num=0;
	extract($_POST);

include ("funciones/conexion.php");
$select = "SELECT * from usuario where usuario='$usuario'"; 
$resultado = mysql_query($select); 
while ($fila=mysql_fetch_array($resultado) ) 
{ 
    $nombreuser=$fila["nombreuser"];
	$apellidouser=$fila["apellidouser"];
	$cod_area=$fila["cod_area"];
	$telefono=$fila["telefono"];
	$cod_movil=$fila["cod_movil"];
	$movil=$fila["movil"];
	$direccion=$fila["direccion"];
	$usuariouser=$fila["usuario"];
	$claveuser=$fila["clave"];
	$nivel=$fila["nivel"];
}


if($_POST['boton1']){ $num=1; }if($_POST['boton2']){ $num=2; }if($_POST['boton3']){ $num=3; }

if($_REQUEST['boton1']=='Guardar'){ //IF 1
	
	//$cont=0;
if ($nombre != "" && $apellido!="") { //IF 2
if($nombreuser and $apellidouser){
	include ('funciones/conexion.php');
mysql_select_db($bd, $conexion);
$sql=mysql_query("update usuario set nombreuser='$nombre', apellidouser='$apellido', cod_area='$cod_area1', 					   telefono='$telefono1', cod_movil='$cod_movil1', movil='$movil1', direccion='$direccion1' where usuario='$usuario'",$conexion);
$resultado=mysql_db_query($bd,$sql);

?>
<script>
alert ("Cambio Guardado");
location.href='index.php?pag=9';
</script>

<?php
$num=0;
}// FIN IF 2
}// FIN IF 1 
}



if($_REQUEST['boton2']=='Guardar'){ // IF 3
	
	$cont=0;
	
	if ($usuario1!="") { // IF 4
	if($nombreuser and $apellidouser){
	include("funciones/conexion.php");
	$sql="select usuario from usuario where usuario='$usuario1'";
	$Resultado=mysql_db_query($bd,$sql);
	$nfilas=mysql_num_rows($Resultado);
	if($nfilas>0){ // IF 5
	$var="<font color=#FF0000'>EL NOMBRE DE USUARIO YA ESTÁ SIENDO UTILIZADO</font>";
	
	}else{
		
	include ('funciones/conexion.php');
	mysql_select_db($bd, $conexion);
	$sql=mysql_query("update usuario set usuario='$usuario1' where usuario='$usuario'",$conexion);
	$resultado=mysql_db_query($bd,$sql);
	$num=0;
	
	  ?> <script>
	  alert ("¡Cambio Guardado! \n Por favor Inicia Sesión con tu nuevo nombre de usuario");
	  location.href='funciones/cerrar.php';
      </script> 
	  <?php
	  
	} // FIN IF 5
	
	}// FIN IF 4
	
}// FIN IF 3

}

if($_REQUEST['boton3']=='Guardar'){ // IF 6 
if($nombreuser and $apellidouser){
	$cont=0;
	
if ($clave0!="" && $clave1!="" && $clave2!="") { // IF 7

require("funciones/conexion.php");
	$sql="select * from usuario where usuario='$usuario' and clave='$clave0'";
    $cursor= mysql_db_query ($bd,$sql);
    $num = mysql_num_rows($cursor);
    if($num>0){ // IF 8
		
		if($clave1==$clave2){ // IF 9
		
include ('funciones/conexion.php');
mysql_select_db($bd, $conexion);
$sql=mysql_query("update usuario set clave='$clave1' where usuario='$usuario'",$conexion);
$resultado=mysql_db_query($bd,$sql);
  ?> <script>
	  alert ("¡Cambio Guardado! \n Por favor Inicia Sesión con tu nueva clave de usuario");
	  location.href='funciones/cerrar.php';
      </script> 
	  <?php
	  
$num=0;
			}else{ 
				$var="<font color=#FF0000'>Las Claves no Coinciden</font>";
				$num=0;
				} // FIN IF 9
		
		}else{ 
		$var="<font color=#FF0000'>Tu clave está incorrecta</font>";
		$num=0;
		} // FIN IF 8

} // FIN IF 7
} // FIN IF 6
}
?>
<fieldset id="Formulario" name="perfil" style="border: 2px solid #649DC8; width:800px; height:450px;  vertical-align:top">
<legend><B>PERFIL DE USUARIO</B><br /><br /></legend>
<form action="#" method="post" name="perfil" id="Formulario">
  <br>
   
  <table align="center">
  <tr>
  	<td width="123" valign="top"><label for="nombre">Nombre</label></td>
    <td width="5">&nbsp; </td>
    <td width="143" style="text-transform:capitalize"><?php echo $nombreuser;?></td>
    
    <td width="52" rowspan="5" style="text-transform:capitalize">
    &nbsp;<button  type="submit" name="boton1" title="Editar" value="Editar" ><img src="imagenes/editar.png" title="Editar"/></button>
    </td>
    <td width="33" style="text-transform:capitalize">&nbsp;</td>
    
    <td width="209" >
	<?php if($num==1){ //SI PRESIONO EL BOTON 1 -  A LA VARIABLE NUM SE LE ASIGNA UN UNO Y MUESTRA LO SIGUIENTE: ?> 
					
	                 
   					 <div>
					<input name="nombre" value="<?php echo $nombreuser;?>" onKeyPress="return permite(event, 'car')" id="nombre" type="text" /><br />
							
                    </div>
     
    <?php }?>
    </td>
    
    <td width="89" rowspan="5" style="text-transform:capitalize"><?php if($num==1){ ?>
    <button type="submit" value="Guardar" name="boton1" onClick="valida_envia5()"><img src="imagenes/guardar.png" title="Guardar"/></button>
<?php }?></td>
    
    <td width="106" style="text-transform:capitalize">&nbsp;</td>
    
  	</tr>
    
    <tr><td width="123" valign="top" ><label for="apellido">Apellido</label></td>
      <td width="5">&nbsp; </td>
      <td width="143" style="text-transform:capitalize"><?php echo $apellidouser;?></td>
      <td width="33">&nbsp;</td>
      <td width="209"><?php if($num==1){ ?>
      
      <div>
      <input  name="apellido" value="<?php echo $apellidouser;?>" onKeyPress="return permite(event, 'car')" id="apellido" type="text" />
      <br />
      </div>
                    
       <?php }?></td>
      <td width="106">&nbsp;</td>
    </tr>
   	<tr>
   	  <td valign="top" ><label for="apellido">Tel&eacute;fono</label></td>
   	  <td>&nbsp;</td>
   	  <td style="text-transform:capitalize"><?php echo '('.$cod_area.') '.$telefono;?></td>
   	  <td>&nbsp;</td>
   	  <td>
      <?php if($num==1){ ?>
      <select name="cod_area1">
<option></option>
<?php for($i=212; $i<=295; $i++){?>
<option value="<?php echo '0'.$i;?>" <?php if($cod_area==$i){echo 'selected';}?>><?php echo '0'.$i; ?></option>
<?php 

if($i==212){$i=$i+21;}
if(($i==235)||($i==259)||($i==288)){$i=$i+2;}
if(($i==239)||($i==249)||($i==251)||($i==256)||($i==265)||($i==269)||($i==279)){$i=$i+1;}
}?>
</select>

<input type="text" name="telefono1" size="6" value="<?php echo $telefono;?>" maxlength="7" onkeypress="return permite(event, 'num')" id="campo9">
<?php }?>
      </td>
   	  <td>&nbsp;</td>
 	  </tr>
   	<tr>
   	  <td valign="top" ><label for="apellido">M&oacute;vil</label></td>
   	  <td>&nbsp;</td>
   	  <td style="text-transform:capitalize"><?php echo '('.$cod_movil.') '.$movil;?></td>
   	  <td>&nbsp;</td>
   	  <td>
      <?php if($num==1){ ?><select name="cod_movil1">
<option></option>
<?php for($j=412; $j<=426; $j=$j+2){
	
?>
<option value="<?php echo '0'.$j;?>" <?php if($cod_movil==$j){echo 'selected';}?>><?php echo '0'.$j; ?></option>
<?php 

if($j==416){$j=$j+6;}

}?>
</select>

<input type="text" name="movil1" size="6" value="<?php echo $movil;?>" maxlength="7" onkeypress="return permite(event, 'num')" id="movil">
<?php }?>
      </td>
   	  <td>&nbsp;</td>
 	  </tr>
   	<tr>
   	  <td valign="top" ><label for="apellido">Direcci&oacute;n</label></td>
   	  <td>&nbsp;</td>
   	  <td style="text-transform:capitalize"><?php echo $direccion;?></td>
   	  <td>&nbsp;</td>
   	  <td>
      <?php if($num==1){ ?>
      <textarea cols="21" name="direccion1"  onKeyPress="return permite(event, 'num_car')"><?php echo $direccion;?></textarea>
      <?php }?>
      </td>
   	  <td>&nbsp;</td>
 	  </tr>
   	
                    
     <tr>
      <td colspan="8" valign="top"><hr></td>
      </tr>
  <tr><td><label for="usuario">Nombre de Usuario</label></td>
    <td>&nbsp; </td>
    <td style="text-transform:capitalize"><?php echo $usuariouser;?></td>
    <td >&nbsp;<button  type="submit" name="boton2" title="Editar" value="Editar"><img src="imagenes/editar.png" title="Editar"/></button>  
</td>
    <td >&nbsp;</td>
    <td ><?php if($num==2){ ?>
    <div>
    <input name="usuario1" value="<?php echo $usuario;?>" onKeyPress="return validarLetra(event)" id="usuario" type="text" />

	</div>
	<?php }?></td>
    <td ><?php if($num==2){ ?>
    <button type="submit" value="Guardar" name="boton2" onClick="valida_envia6()"  onKeyPress="return permite(event, 'num_car')"><img src="imagenes/guardar.png" title="Guardar"/></button>
<?php }?></td>
    <td >&nbsp;</td>
  </tr>
    <tr>
      <td colspan="8" valign="top"><hr></td>
      </tr><tr><td><label for="usuario">Contrase&ntilde;a</label></td>
    <td>&nbsp; </td>
    <td>********</td>
    <td>&nbsp;<button type="submit" name="boton3" title="Editar" value="Editar" ><img src="imagenes/editar.png" title="Editar"/></button>
</td>
    <td>&nbsp;</td>
    <td colspan="2">
    <table>
       	             
	<?php if($num==3){ ?>
     <tr><td><label for="pass0">Clave Anterior: </label></td>
     <td>
     				<div>
					<input name="clave0" value="<?php echo $clave0;?>" id="pass0" type="password"maxlength='10' />
				
                 	</div>
     </td></tr>
      <tr><td><label for="pass1">Nueva Clave: </label></td>
      <td>
					<div>
					<input name="clave1" value="<?php echo $clave1;?>" id="pass1" type="password"maxlength='10' />
								
                 	</div>
      </td></tr>
     <tr>
     <td> <label for="pass2">Vuelve a Escribir la Clave: </label></td>
     <td>
					<div>
				 	<input name="clave2"value="<?php echo $clave2;?>" id="pass2" type="password" onpaste="return false" />
				 	
                    </div>
                    
     </td></tr><?php }?>
      </table>
      </td>
    <td><?php if($num==3){ ?>
    <button type="submit" value="Guardar" name="boton3"  onClick="valida_envia7()"><img src="imagenes/guardar.png" title="Guardar"/></button>
<?php }?>
    </td>
    
      </tr>
  </table>
  
</form>
  </fieldset>
<?php } else { ?> 
<script>
alert("Debes Iniciar Sesion");
location.href='index.php';
</script>
<?php } ?>
<?php include ('funciones/fsesion.php');
if($usuario!="")
{
	$num=0;
	extract($_POST);

switch($boton){
		
case Buscar: 

include ("funciones/conexion.php");
$select = "SELECT * from usuario where usuario='$user'"; 
$resultado = mysql_query($select); 
while ($fila=mysql_fetch_array($resultado) ) 
{ 
   		$nombreuser=$fila["nombreuser"];
		$apellidouser=$fila["apellidouser"];
		$cod_area=$fila['cod_area'];
		$telefono=$fila['telefono'];
		$cod_movil=$fila['cod_movil'];
		$movil=$fila['movil'];
		$direccion=$fila['direccion'];	
		$niveluser=$fila["nivel"];
}

break;

case Editar:
if($user and $nombreuser and $apellidouser and $direccion and $niveluser){
include ('funciones/conexion.php');
mysql_select_db($bd, $conexion);
$sql=mysql_query("update usuario set nombreuser='$nombreuser', apellidouser='$apellidouser', cod_area='$cod_area',
					   telefono='$telefono',
					   cod_movil='$cod_movil',
					   movil='$movil',
					   direccion='$direccion', nivel=$niveluser where usuario='$user'",$conexion);
$resultado=mysql_db_query($bd,$sql);
}
break;

case Eliminar:

if($user!=$usuario){
	
	
include ("funciones/conexion.php");
$sql=mysql_query("delete from usuario where usuario='$user' and usuario!='$usuario'",$conexion);
		mysql_close($conexion);
?>
        
      <script>
	  alert("Usuario Eliminado")
	  location.href='index.php?pag=11';
      </script> 
			
<?php
}else{ $var="<font color=#FF0000'>No puede ser eliminado el usuario que está en linea</font>"; }

break;
case Limpiar:?>
 
 	  <script>
	  location.href='index.php?pag=11';
      </script> 
<?php
break;
}

?>
<fieldset id="Formulario" style="border: 2px solid #649DC8; width:800px; height:450px; text-align: justify">
<legend align="center"><B>EDITAR USUARIO</B><br /><br /></legend>
<form action="#" method="post" name="edituser"  id="Formulario">
         
         

			        <table align="center" cellpadding="3px" cellspacing="3px">
                    <tr>  
			        
					<td><font color="red">*</font> Usuario:</td>
					<td><input name="user" value="<?php echo $user;?>" onKeyPress="return permite(event, 'num_car')" type="text"/>
                    <button  type="submit" value="Buscar" name="boton"><img src="imagenes/buscar.png" title="Buscar"/></button>
                    </td>
                    </tr>
					
                    <tr>
					<td><font color="red">*</font> Nombre:</td>
					<td><input name="nombreuser" value="<?php echo $nombreuser;?>" onKeyPress="return permite(event, 'car')" id="nombre"  type="text" /></td>
					</tr>
                    </div>
                    
                    <div>
                    <tr>
					<td><font color="red">*</font> Apellido</td>
					<td><input  name="apellidouser" value="<?php echo $apellidouser;?>" onKeyPress="return permite(event, 'car')" id="apellido" type="text" /></td>
                    </tr>
                    
                    <?php include("funciones/telefonos.php");?>
                    <tr>

<td ><font color="red">*</font> Direcci&oacute;n:</td><td colspan="3">
<textarea cols="21" name="direccion"  onKeyPress="return permite(event, 'num_car')"><?php echo $direccion;?></textarea></td></tr>
<tr>
					</div>
					
                             		       
                    <div>
                    <tr>
				  	<td><font color="red">*</font> Nivel:</td>
				 	<td><select name="niveluser">
                    <option></option>
<option value="1" <?php if($niveluser=='1'){echo 'selected';}?>>Administrador</option>
<option value="2" <?php if($niveluser=='2'){echo 'selected';}?>>Colaborador</option></select></td>
                   <tr>			
                    </div>
				<br />
                 </table>
                <center><font color="red" style="font-style:italic;">* Campos Obligatorios</font></center>
                <br />
                
<center>

<button  type="submit" value="Editar" name="boton" onClick="valida_envia4()"><img src="imagenes/editar.png" title="Editar"/></button>
<button  type="submit" value="Eliminar" name="boton"><img src="imagenes/eliminar.png" title="Eliminar"/></button>
<button  type="submit" value="Limpiar" name="boton"><img src="imagenes/limpiar.png" title="Limpiar"/></button>


</center>
		</form>
  </fieldset>

<?php } else { ?> 
<script>
alert("Debes Iniciar Sesion");
location.href='index.php';
</script>

<?php } ?> 
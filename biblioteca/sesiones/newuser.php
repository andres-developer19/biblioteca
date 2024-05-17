<?php 
include ('funciones/fsesion.php');

if($usuario!="")
{
extract($_POST);

switch($boton){
case Guardar:

include ('funciones/funcionclave.php');

break;

case Limpiar:

	?><script>window.location.href='index.php?pag=10';</script><?php
break;
}

?>
<fieldset id="Formulario" style="border: 2px solid #649DC8; width:800px; height:450px; text-align:justify">

<legend style="text-align:center"><B>REGISTRAR USUARIO</B><br /><br /></legend>
<form action="#" method="post" name="usuario" id="Formulario">


         
                   <table align="center" cellpadding="3px" cellspacing="3px" >
                   <tr>
                   
					<td><font color="red">*</font> Cedula:</td>
					<td><input name="cedulauser" maxlength="8" value="<?php echo $cedulauser;?>" onKeyPress="return permite(event, 'num')" id="cedulauser"  type="text" /></td>
					</tr>
                   
                    
			        
                    <tr>
			        
					<td><font color="red">*</font> Nombre:</td>
					<td><input name="nombreuser" value="<?php echo $nombreuser;?>" onKeyPress="return permite(event, 'car')" id="nombre"  type="text" /></td>
					</tr>
                   
                
                    
                    
                    
                   
                    <tr>
					<td><font color="red">*</font> Apellido:</td>
					<td><input  name="apellidouser" value="<?php echo $apellidouser;?>" onKeyPress="return permite(event, 'car')" id="apellido" type="text" /></td>
                    </tr>
					
					
                  <?php include("funciones/telefonos.php");?>
         		 	
                    
                    <tr>

<td ><font color="red">*</font> Direcci&oacute;n:</td><td colspan="3">
<textarea cols="21" name="direccion"  onKeyPress="return permite(event, 'num_car')"><?php echo $direccion;?></textarea></td></tr>
<tr>

                    <tr>
					<td><font color="red">*</font> Usuario:</td>
					<td><input name="usuario1" value="<?php echo $usuario1;?>"  onKeyPress="return permite(event, 'num_car')" id="usuario" type="text" /></td>
				
                    <tr>
					<td><font color="red">*</font> Clave:</td>
					<td><input name="clave" value="<?php echo $clave;?>" id="pass1" type="password"maxlength='10' /></td>
					</tr>		
              
                    <tr>
				  	<td><font color="red">*</font> Confirme Clave:</td>
				 	<td><input name="clave2"value="<?php echo $clave2;?>" id="pass2" type="password" onpaste="return false" /></td>
				 	</tr>		
               
                    <tr>
				  	<td><font color="red">*</font> Nivel:</td>
				 	<td><select name="niveluser">
                    <option></option>
<option value="1" <?php if($niveluser=='1'){echo 'selected';}?>>Administrador</option>
<option value="2" <?php if($niveluser=='2'){echo 'selected';}?>>Colaborador</option></select>	</td>
                    </tr>		
                  
                    </table>
				<br />
<center>
<button  type="submit" value="Guardar" name="boton" onClick="valida_envia3()" ><img src="imagenes/guardar.png" title="Guardar"/></button>
<button  type="submit" value="Limpiar" name="boton" ><img src="imagenes/limpiar.png" title="Limpiar"/></button>
</center>
		</form>
  </fieldset>

<?php } else { ?> 
<script>
alert("Debes Iniciar Sesion");
location.href='index.php';
</script>
<?php } ?>
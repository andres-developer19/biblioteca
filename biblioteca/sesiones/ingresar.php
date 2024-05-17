<script>

function validarEntero(valor){ 
      
     valor = parseInt(valor) //convertir un numero a entero 

      //Se comprueba si no es un valor numerico  ()
      if (isNaN(valor)) { //La funci�n isNaN eval�a un argumento para determinar si �ste no es un n�mero (isNaN [not a number]). 
            //si no es un numero retorna el valor cadena vacia 
            return "" 
      }else{ 
            //en caso de ser numero retorno el valor 
            return valor 
      } 
} 

function valida_envia(){
	//se valida que no este la cja de texto vacia
	if (document.fvalida.usuario.value.length==0){
		alert("Introduzca su nombre de usuario por favor")
		document.fvalida.usuario.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
		if (document.fvalida.clave.value.length==0){
		alert("Introduzca su clave por favor")
		document.fvalida.clave.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
	//si llega aqui es por que todo esta lleno y ha pasado la validacion
	//alert("Los datos estan validados");
	document.fvalida.submit();
}

</script>
<div class="ingresar">

		<?php if ($_GET['errorusuario']=="si"){ ?>

<div class="error">
<b><font color="#FF0000">Usuario y/o clave Invalidos </font></b><br />
<center><img src="imagenes/No_pase.png" width="107" height="124"></center>								  
</div>

		<?php }elseif ($_GET['errorusuario']=="no"){ ?>
        
      <script>
	  alert ("Bienvenido al Sistema");
	  location.href='index.php?pag=001';
      </script> 
			
		<?php }else{ ?>
										
<center><p>Para Ingresar al Sistema <br> Ingresar su Usuario y Contrase&ntilde;a</p></center>

		<?php } ?>   
         


<form action="control.php" method="post" name="fvalida">

<table>
<tr>
<td>Usuario: </td><td><input type="text" name="usuario" value="<?php echo $usuario;?>" ></td>
</tr>
<tr><td>Contrase&ntilde;a: </td><td><input type="password" name="clave" value="<?php echo $clave;?>"></td></tr>
<tr><td colspan="2" align="center">&nbsp;<br /></td>
</tr>
</table>
<center>
<button type="submit" name="boton" value="ENTRAR" onClick="valida_envia()"><img src="imagenes/acceso.png" height="32" title="Ingresar" align="center"/></button></center>

</form>
<div>
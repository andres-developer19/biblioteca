<?php include ('funciones/fsesion.php');
if($usuario!="")
{
	
	include("funciones/conexion.php");
	include("funciones/cambiarformatofecha.php");
	$hoy = date('d/m/Y',time() - 3600*date('I'));
	$ci_est=$_GET['ci']; 
	extract($_POST);

	
	switch($boton){
		
	case 'Buscar Documento':
	
	 if($buscar=='cota_doc'){
		 $sql2="SELECT * from lib_doc, documento where lib_doc.cota=documento.cota_doc and cota like  '%".$valor."-%' and lib_doc.status='DISPONIBLE'";}
 	 else{
		 $sql2="SELECT DISTINCT * FROM lib_doc,documento where  lib_doc.cota=documento.cota_doc and $buscar='$valor' and lib_doc.status='DISPONIBLE'";
		 }
	  //$sql2="SELECT * FROM lib_doc, documento WHERE $buscar='$valor'";
  	$resultado2=mysql_db_query($bd,$sql2);
  	echo mysql_error();
	$nroregistros2=mysql_num_rows($resultado2);
  	$mostrar_listado='si';
   

	
	break;
	

	case Guardar:
	
	$fecha_actual=cambiarFormatoFecha($fecha2);
	$fecha_devolucion=cambiarFormatoFecha($fecha3);
	
	$sql="INSERT INTO prestamo VALUES ('','$ci_est','$fecha_actual','$fecha_devolucion','')";
 	$resultado=mysql_db_query($bd,$sql);
	
	$sql="insert into relacion (id_p,id) values ((select max(id_p) from prestamo),'$seleccion')";
 	$resultado=mysql_db_query($bd,$sql);

	$registros=mysql_query("update lib_doc set status='NO DISPONIBLE' where id='$seleccion'",$conexion);

?>
			<script>
			alert("El Préstamos ha sido realizado con exito");
			location.href='index.php?pag=4';
			</script>
<?php
	break;
	
	case Limpiar:
	
	?><script>window.location.href='index.php?pag=6';</script><?php

    break;
  
	
}
?>
<fieldset id="Formulario" style="border: 2px solid #649DC8; width:800px; text-align:justify">
<legend style="text-align:center"><B>PRESTAMO DE DOCUMENTO</B><br /></legend>
<form action="#" method="post" name="busqueda">
<input type="hidden" name="ci_est" value="<?php echo $ci_est;?>" />
<center>
<table class="busqueda" align="center">
<tr><td>
<select name="buscar" onchange="this.form.submit();">
<option>Buscar por:</option>
<option value="cota_doc"  <?php if($buscar=='cota_doc'){echo 'selected';}?>>Codigo</option>
<option value="nombre" <?php if($buscar=='nombre'){echo 'selected';}?>>Titulo</option>
<option value="tipo_doc" <?php if($buscar=='tipo_doc'){echo 'selected';}?>>Tipo</option>
<option value="area" <?php if($buscar=='area'){echo 'selected';}?>>Area</option>
</select>
<input type="text" name="valor" id="valor" list="valores" value='<?php //echo $valor;?>'>
<datalist id="valores">
<?php
include("funciones/conexion.php");

  if($buscar=='cota_doc'){$sql="SELECT DISTINCT SUBSTR(cota,1,3) as lista from lib_doc where tipo='DOCUMENTO'";}
  else{$sql="SELECT DISTINCT $buscar as lista FROM lib_doc,documento where lib_doc.cota=documento.cota_doc";}
  $resultado=mysql_db_query($bd,$sql);
  echo mysql_error();

   $nroregistros=mysql_num_rows($resultado);
   for ($i=1; $i<=$nroregistros; $i++){
   $contenido=mysql_fetch_array($resultado);
		//$contenido ['lista'];

?>
   
<option value="<?php echo $contenido ['lista'];?>" />


<?php
}

?>
</datalist> 

<button  type="submit" value="Buscar Documento" name="boton" onClick="valida_envia()"><img src="imagenes/buscar.png" title="Buscar"/></button>
</td>
</tr>
</table>

<fieldset style="height:240px">
<legend>Listado</legend>
   <table cellpadding="3" cellspacing="3" border="0" id="table">
       <thead>
            <tr>      
            	<th></th>         
                <th align="center">Cota</th>
                <th align="center">T&iacute;tulo</th>
                <th align="center">Tipo</th>
                <th align="center">Area</th>
                <th align="center">Estatus</th>
            </tr>
 </thead>
        <tbody>
        <?php
  if($mostrar_listado=='si'){

   
 
   for ($i=1; $i<=$nroregistros2; $i++){
   $contenido2=mysql_fetch_array($resultado2);
  
		?>
 <tr>
   		<td>  
     <input type="radio" value=" <?php echo $contenido2 ['id'];?>" name="seleccion">
    
     </td>
     <td align="center">
      <?php echo $contenido2 ['cota'];?>
     </td>
     <td align="center">
      <?php echo $contenido2 ['nombre'];?>
     </td>
     <td align="center">
      <?php echo $contenido2 ['tipo_doc'];?>
     </td>
     <td align="center">
      <?php echo $contenido2 ['area'];?>
     </td>
     <td align="center">
      <?php echo $contenido2 ['status'];?>
     </td>
   
  </tr>
<?php
}
}
?>  </tbody>
  </table>
  
  <br />
 	<div id="controls">
        
		<div id="navigation">
       
			<img src="imagenes/first.gif" width="16" height="16" title="Primera P&aacute;gina" onClick="sorter.move(-1,true)">
			<img src="imagenes/previous.gif" width="16" height="16" title="P&aacute;gina Anterior" onClick="sorter.move(-1)" />
			<img src="imagenes/next.gif" width="16" height="16" title="P&aacute;gina Siguiente" onClick="sorter.move(1)" />
			<img src="imagenes/last.gif" width="16" height="16" title="&Uacute;ltima P&aacute;gina" onClick="sorter.move(1,true)" />
		</div>
		<div id="text">P&aacute;gina <span id="currentpage"></span> de <span id="pagelimit"></span></div>
	</div>
	<script type="text/javascript" src="jsp/script2.js"></script>
	<script type="text/javascript">
  var sorter = new TINY.table.sorter("sorter");
	sorter.head = "head";
	sorter.asc = "asc";
	sorter.desc = "desc";
	sorter.even = "evenrow";
	sorter.odd = "oddrow";
	sorter.evensel = "evenselected";
	sorter.oddsel = "oddselected";
	sorter.paginate = true;
	sorter.currentid = "currentpage";
	sorter.limitid = "pagelimit";
	sorter.init("table",1);
  </script>



</fieldset>
<fieldset>

<legend>Préstamo</legend>
<table>
<tr><td>

Fecha Actual: 

<input name="fecha2" type="text" maxlength="10" size="10" onKeyPress="return permite(event, 'fecha')" value='<?php echo $hoy;?>'><a href="javascript:showCal('Calendar2')" title="Calendario">
	<img src="imagenes/calendario.png" title="Calendario"></a>

&nbsp;&nbsp;Fecha a Devolver: 

<input name="fecha3" type="text" maxlength="10" size="10" onKeyPress="return permite(event, 'fecha')" value="<?php echo $fecha3;?>"><a href="javascript:showCal('Calendar3')" title="Calendario">
	<img src="imagenes/calendario.png" title="Calendario">

</td></tr>
<tr><td align="center" colspan="2">
<br />
<button  type="submit" value="Guardar" name="boton" onClick="valida_envia()"><img src="imagenes/guardar.png" title="Registrar Préstamo"/></button>
<button  type="submit" value="Limpiar" name="boton"><img src="imagenes/limpiar.png" title="Limpiar"/></button>
</td></tr>
</table>


</div>

</form>
 </fieldset>
<?php } else { ?> 
<script>
alert("Debes Iniciar Sesion");
location.href='index.php';
</script>
<?php } ?>

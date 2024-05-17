<div align="center">
<link rel="stylesheet" href="css/hoja.css" />
<table width="750" border="0" cellpadding="6" cellspacing="0" >
  <tbody><tr>
    <td align="center" bgcolor="#306090" valign="middle" height="20">
    <div align="right" class="pdf"><a href="pdf/estudiantes.php" target="_blank"><img src="imagenes/pdf.png" ></a></div>
    <big style="color: rgb(255, 255, 255);"><b> <p style="font-family:Agent Orange;"> LISTA DE ESTUDIANTES</p> </b></big></td>
    
  </tr>
  </table>

   <table cellpadding="0" cellspacing="0" border="0" id="table" class="sortable">
        <thead>
            <tr>
               
                <th width="50"><h3>Cedula</h3></th>
                <th width="80"><h3>Nombre</h3></th>
                <th width="80"><h3>Apellido</h3></th>
                <th width="80"><h3>Grado</h3></th>
                <th width="80"><h3>Seccion</h3></th>
            </tr>
        </thead>
        <tbody>
<?php
  $conectar=mysql_connect("localhost:3306","root","");
  $bd="biblioteca";
  $sql="SELECT * FROM persona, estudiante WHERE persona.ci=estudiante.ci_est and tipo='Estudiante'";
  $resultado=mysql_db_query($bd,$sql);
  echo mysql_error();

   $nroregistros=mysql_num_rows($resultado);
   for ($i=1; $i<=$nroregistros; $i++){
   $contenido=mysql_fetch_array($resultado);
?>
    <tr >
     <td>
      <?php echo $contenido ['ci_est'];?>
     </td>
     <td>
      <?php echo $contenido ['nombre'];?>
     </td>
     <td>
      <?php echo $contenido ['apellido'];?>
     </td>
     <td>
      <?php echo $contenido ['grado'];?>
     </td>
    
     <td>
      <?php echo $contenido ['seccion'];?>
     </td>
     
  </tr>
<?php
}
?>
        </tbody>
  </table><br /><center>
 	<div id="controls">
		<div id="perpage">
        	
			<select onChange="sorter.size(this.value)">
          <option value="" selected="selected">Cantidad a Mostrar</option>
			<option value="5">5</option>
				<option value="10" >10</option>
				<option value="20">20</option>
				<option value="50">50</option>
				<option value="100">100</option>
			</select>
		
		</div>
        
		<div id="navigation">
       
			<img src="imagenes/first.gif" width="16" height="16" title="Primera P&aacute;gina" onClick="sorter.move(-1,true)">
			<img src="imagenes/previous.gif" width="16" height="16" title="P&aacute;gina Anterior" onClick="sorter.move(-1)" />
			<img src="imagenes/next.gif" width="16" height="16" title="P&aacute;gina Siguiente" onClick="sorter.move(1)" />
			<img src="imagenes/last.gif" width="16" height="16" title="&Uacute;ltima P&aacute;gina" onClick="sorter.move(1,true)" />
		</div>
		<div id="text">P&aacute;gina <span id="currentpage"></span> de <span id="pagelimit"></span></div>
	</div>
	<script type="text/javascript" src="jsp/script.js"></script>
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
</center>







</div>

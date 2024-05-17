<div align="center">
<link rel="stylesheet" href="style.css" />
<table width="630" border="0" cellpadding="6" cellspacing="0" style="margin-top:12px;">
  <tbody><tr>
    <td align="center" bgcolor="#306090" valign="middle" height="30"><big style="color: rgb(255, 255, 255);"><b> <p> LISTA DE CONSEJOS COMUNALES</p> </b></big></td>
    
  </tr>
  </table>
<br>
   <table cellpadding="0" cellspacing="0" border="0" id="table" class="sortable">
        <thead>
            <tr>
               <th width="30"><h3>Nombre</h3></th>
                <th width="60"><h3>Estado</h3></th>
                <th width="30"><h3>Municipio</h3></th>
                <th><h3>Parroquia</h3></th>
                <th><h3>Sector</h3></th>
                <th><h3>Direccion</h3></th>
            </tr>
        </thead>
        <tbody>
<?php
  $conectar=mysql_connect("localhost:3306","root","");
  $bd="portachuelo";
  $sql="SELECT * FROM ccomunal";
  $resultado=mysql_db_query($bd,$sql);
  echo mysql_error();

   $nroregistros=mysql_num_rows($resultado);
   for ($i=1; $i<=$nroregistros; $i++){
   $contenido=mysql_fetch_array($resultado);
?>
    <tr >
     <td>
      <?php echo $contenido ['nombre'];?>
     </td>
     <td>
      <?php echo $contenido ['estado'];?>
     </td>
     <td>
      <?php echo $contenido ['municipio'];?>
     </td>
     <td>
      <?php echo $contenido ['parroquia'];?>
     </td>
    
     <td>
      <?php echo $contenido ['sector'];?>
     </td>
     
     <td>
      <?php echo $contenido ['direccion'];?>
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
       
			<img src="img/first.gif" width="16" height="16" title="Primera P&aacute;gina" onClick="sorter.move(-1,true)" />
			<img src="img/previous.gif" width="16" height="16" title="P&aacute;gina Anterior" onClick="sorter.move(-1)" />
			<img src="img/next.gif" width="16" height="16" title="P&aacute;gina Siguiente" onClick="sorter.move(1)" />
			<img src="img/last.gif" width="16" height="16" title="&Uacute;ltima P&aacute;gina" onClick="sorter.move(1,true)" />
		</div>
		<div id="text">P&aacute;gina <span id="currentpage"></span> de <span id="pagelimit"></span></div>
	</div>
	<script type="text/javascript" src="script.js"></script>
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

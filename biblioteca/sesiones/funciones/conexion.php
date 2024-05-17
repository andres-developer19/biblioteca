<?php
$conexion=mysql_connect("localhost","root","");
$bd="biblioteca";
mysql_select_db($bd,$conexion) or die ("Problemas con la seleccion de la base de datos");
?>
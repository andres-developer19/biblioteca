<?php 
function cambiarFormatoFecha($fecha){ 
    list($dia,$mes,$anio)=explode("/",$fecha); 
    return $anio."-".$mes."-".$dia; 
}  
?>
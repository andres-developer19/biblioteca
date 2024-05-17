<?php 
 include ('../funciones/fsesion.php');
date_default_timezone_set("America/Caracas" ) ; 
if($usuario!="")
{
	
require_once("class.ezpdf.php");
$pdf =& new Cezpdf('letter','landscape');
$pdf->selectFont('fonts/courier.afm');
$pdf->ezImage("../imagenes/membrete.jpg", 0, 700, '', 'center');
$pdf->ezSetCmMargins(1,1,1.5,1.5);
require("../funciones/conexion.php");
mysql_select_db($bd, $conexion);
$queEmp = "SELECT * FROM persona, estudiante WHERE persona.ci=estudiante.ci_est and tipo='Estudiante'";
$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
				'ci_est'=>'<b> Cedula </b>',
				'nombre'=>'<b> Nombre</b>',
				'apellido'=>'<b> Apellido </b>',
				'grado'=>'<b> Grado </b>',
				'seccion'=>'<b> Sección </b>',
								

				
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>650
			);

$pdf->ezText("\n\n\n", 8);
$pdf->ezText($txttitle, 12);
$pdf->ezTable($data, $titles, "ESTUDIANTES", $options);
$pdf->ezText("\n\n\n", 10);
 $pdf->ezText("\n");
$pdf->ezText("\n\n\n", 10);

$pdf->ezStream();

} else { ?> 
<script>
alert("Debes Iniciar Sesion");
location.href='../index.php';
</script>
<?php }
?>



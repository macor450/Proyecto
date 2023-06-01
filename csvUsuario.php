<?php 
header("Content-Type: application/csv");    
header("Content-Disposition: attachment; filename=Reporte1_exportado_" . date('Y:m:d:m:s').".csv");
?>
<?php
$output=fopen("php://output", "w");
fputcsv($output, array('Nombre','Clave','email'));
include("model/conexion.php");
$SELECT = "SELECT * FROM Usuario";
$datos= mysqli_query ($con,$SELECT);
while ($fila = mysqli_fetch_assoc($datos))
{
  fputcsv($output,$fila);  
}
fclose($output);
?>
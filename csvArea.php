<?php 
header("Content-Type: application/csv");    
header("Content-Disposition: attachment; filename=Reporte1_exportado_" . date('Y:m:d:m:s').".csv");
?>
<?php
$output=fopen("php://output", "w");
fputcsv($output, array('Empleado','Codigo','Nombre','estatus'));
include("model/conexion.php");
$SELECT = "SELECT * FROM Area";
$datos= mysqli_query ($con,$SELECT);
while ($fila = mysqli_fetch_assoc($datos))
{
  fputcsv($output,$fila);  
}
fclose($output);
?>
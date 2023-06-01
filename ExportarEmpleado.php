<?php 
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=Venta_exportado_" . date('Y:m:d:m:s').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");

include("model/conexion.php");
$SELECT = "SELECT idEmpleado, Nombre , RFC, Venta.nombre, estatus = 1";
$datos= mysqli_query ($con,$SELECT);
echo '<table class="table table-striped table-hover table-bordered"align="center">
<th align="center" class="table-primary">idEmpleado</th>
<th align="center" class="table-primary">Nombre</th>
<th align="center" class="table-primary">RFC</th>
<th align="center" class="table-primary">Email</th>';


while ($fila = mysqli_fetch_array($datos))
{echo '<tr align="center"> <td>'. $fila ["idEmpleado"].'</td>
        <td >'. $fila ["Nombre"].'</td>
        <td>'. $fila ["RFC"].'</td>
        <td>'. $fila ["Email"].'</td>';
}
?>
</table>
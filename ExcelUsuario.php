<?php 
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=idUsuario_exportado_" . date('Y:m:d:m:s').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");

include("model/conexion.php");
$SELECT = "SELECT idEmpleado, Nombre , RFC, FROM Usuario WHERE estatus = 1";
$datos= mysqli_query ($con,$SELECT);
echo '<table class="table table-striped table-hover table-bordered"align="center">
<th align="center" class="table-primary">idUsuario</th>
<th align="center" class="table-primary">Nombre</th>
<th align="center" class="table-primary">clave</th>
<th align="center" class="table-primary">Email</th>';


while ($fila = mysqli_fetch_array($datos))
{echo '<tr align="center"> <td>'. $fila ["idUsuario"].'</td>
        <td >'. $fila ["Nombre"].'</td>
        <td>'. $fila ["Clave"].'</td>
        <td>'. $fila ["Email"].'</td>';
}
?>
</table>
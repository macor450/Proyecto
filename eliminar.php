<?php
  if(!isset($_GET['idEmpleado'])){
    header('Location: index.php?mensaje=error');
    exit();
  }

  include 'model/conexion.php';
  $codigo = $_GET['idEmpleado'];

  $sentencia = $bd-> prepare("DELETE FROM empleado where idEmpleado =?;");
  $resultado = $sentencia->execute([$codigo]);

  if ($resultado === TRUE){
    header('Location: index.php?mensaje=eliminado');
  } else {
    header('Location: index.php?mensaje=Error');

}
?>
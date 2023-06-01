<?php
  if(!isset($_GET['idProovedor'])){
    header('Location: indexProveedor.php?mensaje=error');
    exit();
  }

  include 'model/conexion.php';
  $proovedor = $_GET['idProovedor'];

  $sentencia = $bd-> prepare("DELETE FROM proovedor where idProovedor =?;");
  $resultado = $sentencia->execute([$proveedor]);

  if ($resultado === TRUE){
    header('Location: index.php?mensaje=eliminado');
  } else {
    header('Location: index.php?mensaje=Error');

}
?>
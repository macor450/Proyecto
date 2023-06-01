<?php
  if(!isset($_GET['idProducto'])){
    header('Location: indexProducto.php?mensaje=error');
    exit();
  }

  include 'model/conexion.php';
  $codigo = $_GET['idProducto'];

  $sentencia = $bd-> prepare("DELETE FROM producto where idProducto =?;");
  $resultado = $sentencia->execute([$codigo]);

  if ($resultado === TRUE){
    header('Location: indexProducto.php?mensaje=eliminado');
  } else {
    header('Location: indexProducto.php?mensaje=Error');

}
?>
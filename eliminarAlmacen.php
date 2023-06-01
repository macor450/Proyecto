<?php
  if(!isset($_GET['idProducto'])){
    header('Location: indexalmacen.php?mensaje=error');
    exit();
  }

  include 'model/conexion.php';
  $codigo = $_GET['idAlmacen'];

  $sentencia = $bd-> prepare("DELETE FROM Almacen where idAlmacen =?;");
  $resultado = $sentencia->execute([$Almacen]);

  if ($resultado === TRUE){
    header('Location: indexAlmacen.php?mensaje=eliminado');
  } else {
    header('Location: indexAlmacen.php?mensaje=Error');

}
?>
<?php
  if(!isset($_GET['idUsuario'])){
    header('Location: indexUsuario.php?mensaje=error');
    exit();
  }

  include 'model/conexion.php';
  $codigo = $_GET['idUsuario'];

  $sentencia = $bd-> prepare("DELETE FROM usuario where idUsuario =?;");
  $resultado = $sentencia->execute([$codigo]);

  if ($resultado === TRUE){
    header('Location: indexUsuario.php?mensaje=eliminado');
  } else {
    header('Location: indexUsuario.php?mensaje=Error');

}
?>
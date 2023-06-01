<?php
  if(!isset($_GET['idArea'])){
    header('Location: indexArea.php?mensaje=error');
    exit();
  }

  include 'model/conexion.php';
  $codigo = $_GET['idArea'];

  $sentencia = $bd-> prepare("DELETE FROM area where idArea =?;");
  $resultado = $sentencia->execute([$Area]);

  if ($resultado === TRUE){
    header('Location: indexArea.php?mensaje=eliminado');
  } else {
    header('Location: indexArea.php?mensaje=Error');

}
?>
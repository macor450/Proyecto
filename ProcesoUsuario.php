<?php
  print_r($_POST);
  if(!isset($_POST['codigo'])){
   header('Location: indexUsuario.php?mensaje=error');
  }

  include 'model/conexion.php';
  $id = $_POST['idUsuario'];
  $nombre = $_POST['txtNombre'];
  $Clave = $_POST['txtClave'];
  $Email = $_POST['txtEmail'];

  $sentencia = $bd->prepare("UPDATE empleado, SET nombre = ?, RFC = ?, email where idUsuario = ?;");
  $resultado = $sentencia->execute([$nombre, $Clave, $Email, $id]);

  if ($resultado == TRUE) {
    echo  "OK";
  } else {
    echo  "ERROR";
  }
  
?>
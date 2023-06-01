<?php
  print_r($_POST);
  if(!isset($_POST['codigo'])){
   header('Location: index.php?mensaje=error');
  }

  include 'model/conexion.php';
  $id = $_POST['idEmpleado'];
  $nombre = $_POST['txtNombre'];
  $RFC = $_POST['txtRFC'];
  $Email = $_POST['txtEmail'];

  $sentencia = $bd->prepare("UPDATE empleado, SET nombre = ?, RFC = ?, email where idEmpleado = ?;");
  $resultado = $sentencia->execute([$nombre, $RFC, $Email, $id]);

  if ($resultado == TRUE) {
    echo  "OK";
  } else {
    echo  "ERROR";
  }
  
?>
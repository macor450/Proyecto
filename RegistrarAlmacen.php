<?php
//print_r($_POST);
 if(empty($_POST["txtNombre"]) || empty($_POST["txtMatricula"]))
 {
    header('Location: indexAlmacen.php?mensaje=falta');
    exit();
 }
 include_once 'model/conexion.php';
 $Almacen = $_POST["txtNombre"];
 $Nombre = $_POST["txtMatricula"];

 $Sentencia = $bd->prepare("INSERT INTO area(Nombre, Matricula) VALUES(?,?,?);");
 $resultado = $Sentencia->execute([$Nombre, $Matricula]);
 
 if($resultado === TRUE) {
    header('location: indexAlmacen.php?mensaje=registrado');
} else {
    header('location: indexAlmacen.php?mensaje=error');
    exit();
 }
?>
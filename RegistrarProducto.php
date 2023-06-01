<?php
//print_r($_POST);
 if(empty($_POST["txtNombre"]) || empty($_POST["txtCodigo"]) || empty($_POST
 ["txtPrecio"]))
 {
    header('Location: indexProducto.php?mensaje=falta');
    exit();
 }
 include_once 'model/conexion.php';
 $Empleados = $_POST["txtNombre"];
 $Codigo = $_POST["txtCodigo"];
 $Nombre = $_POST["txtPrecio"];
 

 $Sentencia = $bd->prepare("INSERT INTO area(Empleados,Codigo,Nombre) VALUES(?,?,?);");
 $resultado = $Sentencia->execute([$Empleados,$Codigo,$Nombre]);
 
 if($resultado === TRUE) {
    header('location: indexProducto.php?mensaje=registrado');
} else {
    header('location: indexProducto.php?mensaje=error');
    exit();
 }
?>
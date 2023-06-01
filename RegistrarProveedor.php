<?php
//print_r($_POST);
 if(empty($_POST["txtCodigo"]) || empty($_POST["txtEmail"]) || empty($_POST
 ["txtNombre"]))
 {
    header('Location: indexProveedor.php?mensaje=falta');
    exit();
 }
 include_once 'model/conexion.php';
 $Empleados = $_POST["txtCodigo"];
 $Codigo = $_POST["txtEmpleado"];
 $Nombre = $_POST["txtNombre"];

 $Sentencia = $bd->prepare("INSERT INTO area(Codigo,Empleado,Nombre) VALUES(?,?,?);");
 $resultado = $Sentencia->execute([$Empleados,$Codigo,$Nombre]);
 
 if($resultado === TRUE) {
    header('location: indexArea.php?mensaje=registrado');
} else {
    header('location: indexArea.php?mensaje=error');
    exit();
 }
?>
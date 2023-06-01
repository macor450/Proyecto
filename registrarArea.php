<?php
//print_r($_POST);
 if(empty($_POST["txtEmpleados"]) || empty($_POST["txtCodigo"]) || empty($_POST
 ["txtNombre"]))
 {
    header('Location: indexArea.php?mensaje=falta');
    exit();
 }
 include_once 'model/conexion.php';
 $Empleados = $_POST["txtEmpleados"];
 $Codigo = $_POST["txtCodigo"];
 $Nombre = $_POST["txtNombre"];

 $Sentencia = $bd->prepare("INSERT INTO area(Empleados,Codigo,Nombre) VALUES(?,?,?);");
 $resultado = $Sentencia->execute([$Empleados,$Codigo,$Nombre]);
 
 if($resultado === TRUE) {
    header('location: indexArea.php?mensaje=registrado');
} else {
    header('location: indexArea.php?mensaje=error');
    exit();
 }
?>
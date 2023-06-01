<?php
//print_r($_POST);
 if(empty($_POST["txtNombre"]) || empty($_POST["txtRFC"]) || empty($_POST
 ["txtEmail"]))
 {
    header('Location: index.php?mensaje=falta');
    exit();
 }
 include_once 'model/conexion.php';
 $Nombre = $_POST["txtNombre"];
 $RFC = $_POST["txtRFC"];
 $Email = $_POST["txtEmail"];

 $Sentencia = $bd->prepare("INSERT INTO empleado(nombre,rfc,email) VALUES(?,?,?);");
 $resultado = $Sentencia->execute([$Nombre,$RFC,$Email]);
 
 if($resultado === TRUE) {
    header('location: index.php?mensaje=registrado');
} else {
    header('location: index.php?mensaje=error');
    exit();
 }
?>



  
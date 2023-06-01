<?php
//print_r($_POST);
 if(empty($_POST["txtNombre"]) || empty($_POST["txtClave"]) || empty($_POST
 ["txtEmail"]))
 {
    header('Location: indexUsuario.php?mensaje=falta');
    exit();
 }
 include_once 'model/conexion.php';
 $Nombres = $_POST["txtNombre"];
 $Clave = $_POST["txtClave"];
 $Emai = $_POST["txtEmail"];

 $Sentencia = $bd->prepare("INSERT INTO area(nombre,clave,email) VALUES(?,?,?);");
 $resultado = $Sentencia->execute([$Nombres,$Clave,$Emai]);
 
 if($resultado === TRUE) {
    header('location: indexUsuario.php?mensaje=registrado');
} else {
    header('location: indexUsuario.php?mensaje=error');
    exit();
 }
?>
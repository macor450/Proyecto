<?php include 'template/header.php'?>

<?php
if(!isset($_GET['idProducto'])){
    header('Location: indexProducto.php?mensaje=error');
    exit();
}
include_once 'model/conexion.php';
$idArea = $_GET['idArea'];

$sentencia = $bd->prepare("select * from producto where idProducto = ?;");
$sentencia->execute([$idProducto]);
$idProducto = $sentencia->fetch(PDO::FETCH_OBJ);
//print_r($empleado);

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
        <div class="card">
        <div class="card-header">
          Modificacion de datos requeridos:
        </div>
        <form class="p-4" method="POST" action="editarProceso.php">
          <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="txtNombre" required >
          </div>
          <div class="mb-3">
            <label class="form-label">Codigo:</label>
            <input type="text" class="form-control" name="txtCodigo"autofocous required >

          </div>
          <div class="mb-3">
            <label class="form-label">Precio:</label>
            <input type="text" class="form-control" name="txtPrecio"autofocous required 
>
          </div>
          <div class="d-grid">
            <input type="hidden" name="idProducto" value="<?php echo $empleado->idProducto;?>">
            <input type="submit" class="btn btn-primary" value="Modificar">
          </div>
        </form> 
    </div>     
        </div>
    </div>
</div>
<?php include 'template/footer.php'?>

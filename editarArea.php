<?php include 'template/header.php'?>

<?php
if(!isset($_GET['idArea'])){
    header('Location: indexArea.php?mensaje=error');
    exit();
}
include_once 'model/conexion.php';
$idArea = $_GET['idArea'];

$sentencia = $bd->prepare("select * from area where idArea = ?;");
$sentencia->execute([$idArea]);
$empleado = $sentencia->fetch(PDO::FETCH_OBJ);
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
            <label class="form-label">Empleados:</label>
            <input type="text" class="form-control" name="txtNombre" required >
          </div>
          <div class="mb-3">
            <label class="form-label">Codigo:</label>
            <input type="text" class="form-control" name="txtRFC"autofocous required >

          </div>
          <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="txtEmail"autofocous required 
>
          </div>
          <div class="d-grid">
            <input type="hidden" name="idArea" value="<?php echo $empleado->idArea;?>">
            <input type="submit" class="btn btn-primary" value="Modificar">
          </div>
        </form> 
    </div>     
        </div>
    </div>
</div>
<?php include 'template/footer.php'?>

<?php include 'template/header.php'?>
<?php
include_once "model/conexion.php";
$sentencia = $bd -> query("select * from producto");
$Producto = $sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($empleados);
?>
 

<div class="container mt-5">
  <div class="row justify-content-center">
     <div class="col-md-7">
      <!--inicio alerta -->
      <?php
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){ 
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong>Rellena los datos.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
    </div>
<?php
      }
?>

<?php
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){ 
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Registrado</strong>los datos se agrgaron de manera exitosa.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
      }
?>

<?php
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){ 
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong>vuelve a intentarlo.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
      }
?>      

<?php
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'modificar'){ 
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Cambiado!</strong>los datos fueron actualizados.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
      }
?>      

<?php
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){ 
      ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Listo </strong>los datos han sido eliminados.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
      }
?>   
      <!--fin alerta -->
        <div class="card">
          <div class="card-header">
            Lista de Productos
          </div> 
          <div class="p-2">
            <div class="table-responsive">
              <table class="table align-middle">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Precio</th>
                    <th scope="col"></th>
                    <th scope="col" colspan="2">Opciones </th>
                  </tr>
                </thead>
                <tbody>

                <?php
                foreach($Producto as $dato){
                  ?>
                  <tr>
                    <td scope="row"><?php echo $dato->idProducto; ?></td>
                    <td><?php echo $dato->Nombre; ?></td>
                    <td><?php echo $dato->Codigo; ?></td>
                    <td><?php echo $dato->Precio; ?></td>
                    <td ><a class="text-success" href="editar.php?idProducto=<?php echo $dato->idProducto; ?>"><i class="bi bi-pencil"></i></a></td>
                    <td  ><a class="text-danger" href="eliminar.php?idProducto=<?php echo $dato->idProducto; ?>"><i class="bi bi-trash3"></i></a></td>
 
                  </tr>
                  <?php
                }
                ?>

                </tbody>
              </table>
            </div>
            
          </div> 
        </div>
        
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          Ingresa los datos requeridos:
        </div>
        <form class="p-4" method="POST" action="registrar.php">
          <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="txtNombre"autofocous required>
          </div>
          <div class="mb-3">
            <label class="form-label">Codigo:</label>
            <input type="text" class="form-control" name="txtCodigo"autofocous required>
          </div>
          <div class="mb-3">
            <label class="form-label">Precio:</label>
            <input type="text" class="form-control" name="txtPrecio"autofocous required>
          </div>
          <div class="d-grid">
            <input type="hidden" name="oculto" value="1">
            <input type="submit" class="btn btn--primary" value="Añadir">
          </div>
        </form> 
    </div>       
    </div>
  </div>
</div>
<?php include 'template/footer.php'?>
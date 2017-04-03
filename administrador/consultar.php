<?php 
  session_start();
  $page = 'gestionar_empleados';
  require "../../php/conexion.php";
  if ($_GET) {
    $id    = $_GET['id'];
    $sql   = mysqli_query($con,"SELECT * FROM empleados WHERE id_empleado = $id");
    $row   = mysqli_fetch_array($sql);
  }
  include '../../layouts/header.php';
  include '../../layouts/navbar.php' 
?>
  <div class="content">
    <div class="container-fluid">
      <a class="btn btn-primary" href="index.php">Volver</a>
      <div class="table-fluid">
        <table class="table">
          <tr>
            <th>Nombre</th>
            <td><?php echo $row['nombre']; ?></td>
          </tr>
          <tr>
            <th>Apellido1</th>
            <td><?php echo $row['apellido1']; ?></td>
          </tr>
          <tr>
            <th>Apellido2</th>
            <td><?php echo $row['apellido2']; ?></td>
          </tr>
          <tr>
            <th>Sexo</th>
            <td><?php echo $row['sexo']; ?></td>
          </tr>
          <tr>
            <th>Teléfono</th>
            <td><?php echo $row['telefono']; ?></td>
          </tr>
          <tr>
            <th>Tipo documento</th>
            <td><?php echo $row['tipo_documento']; ?></td>
          </tr>
          <tr>
            <th>Numero documento</th>
            <td><?php echo $row['numero_documento']; ?></td>
          </tr>
          <tr>
            <th>Correo</th>
            <td><?php echo $row['correo']; ?></td>
          </tr>
          <tr>
            <th>Contraseña</th>
            <td><?php echo $row['contrasena']; ?></td>
          </tr>   
          <tr>
            <th>Cargo</th>
            <td><?php echo $row['cargo']; ?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
<?php include '../../layouts/footer.php' ?>
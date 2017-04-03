<?php 
  require "../config/conexion.php";
  require "../config/app.php";
  if ($_GET) {
    $id    = $_GET['id'];
    $sql   = mysqli_query($con,"SELECT * FROM aprendices WHERE id_aprendices = $id");
    $row   = mysqli_fetch_array($sql);
  }
  include '../templates/header.inc';
  include '../templates/navbar.inc';
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
            <th>Apellido</th>
            <td><?php echo $row['apellido']; ?></td>
          </tr>
          <tr>
            <th>tipo de documento</th>
            <td><?php echo $row['tipo_documento']; ?></td>
          </tr>
          <tr>
            <th>numero de documento</th>
            <td><?php echo $row['numero_documento']; ?></td>
          </tr>
          <tr>
            <th>especialidad</th>
            <td class="especialidad"><?php echo $row['especialidad']; ?></td>
          </tr>
          <tr>
            <th>ficha</th>
            <td><?php echo $row['ficha']; ?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
<?php include '../templates/footer.inc'; ?>
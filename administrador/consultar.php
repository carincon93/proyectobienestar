<?php 
    require "../config/conexion.php";
    require "../config/app.php";
    if ($_GET) {
        $id    = $_GET['id'];
        $sql   = mysqli_query($con, "SELECT * FROM aprendices WHERE id_aprendices = $id");
        $row   = mysqli_fetch_array($sql);
    }
    include '../templates/header.inc';
    include '../templates/navbar.inc';
?>
<main>
    <ol class="breadcrumb">
      <li><a href="index.php">Inicio</a></li>
      <li class="active">Consultar Aprendiz</li>
    </ol>
    <div class="content dashboard">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <a class="btn btn-primary" href="index.php">Volver</a>
                    <div class="table-fluid">
                        <table class="table">
                            <tr>
                                <th>Nombre</th>
                                <td><?php echo $row['nombres']; ?></td>
                            </tr>
                            <tr>
                                <th>Apellido</th>
                                <td><?php echo $row['apellidos']; ?></td>
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
                            <label for="">¿El estudiante recibira Suplemento Alimenticio?</label>
                             <button class="btn btn-info si" data-id="<?=$row['id_aprendices']?>">Si</button>
                             <button class="btn btn-danger no" data-id="<?=$row['id_aprendices']?>">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include '../templates/footer.inc'; ?>

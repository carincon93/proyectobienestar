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
                            <td><?php echo $row['nombre_completo']; ?></td>
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
                            <th>direccion</th>
                            <td><?php echo $row['direccion']; ?></td>
                          </tr>
                          <tr>
                            <th>barrio</th>
                            <td><?php echo $row['barrio']; ?></td>
                          </tr>
                          <tr>
                            <th>estrato</th>
                            <td><?php echo $row['estrato']; ?></td>
                          </tr>
                          <tr>
                            <th>telefono</th>
                            <td><?php echo $row['telefono']; ?></td>
                          </tr>
                          <tr>
                            <th>programa formacion</th>
                            <td class="programa_formacion"><?php echo $row['programa_formacion']; ?></td>
                          </tr>
                          <tr>
                            <th>numero ficha</th>
                            <td><?php echo $row['numero_ficha']; ?></td>
                          </tr>
                          <tr>
                            <th>jornada</th>
                            <td><?php echo $row['jornada']; ?></td>
                          </tr>
                          <tr>
                            <th>persona de la cual depende</th>
                            <td><?php echo $row['dep1']; ?></td>
                          </tr>
                          <tr>
                            <th>oficio que realiza de quien depende</th>
                            <td><?php echo $row['dep2']; ?></td>
                          </tr>
                          <tr>
                            <th>tiene personas que dependan de usted</th>
                            <td><?php echo $row['dep3']; ?></td>
                          </tr>
                          <tr>
                            <th>beneficiario de algun apoyo</th>
                            <td><?php echo $row['apoyo']; ?></td>
                          </tr>
                          <tr>
                            <th>compromiso del aprendiz</th>
                            <td><?php echo $row['compromiso']; ?></td>
                          </tr>
                          <tr>
                            <th>explicacion del por que requiere el suplemento</th>
                            <td><?php echo $row['especificacion_suplemento']; ?></td>
                          </tr>
                          <tr>
                            <th>codigo del aprendiz</th>
                            <td><?php echo $row['cod_aprendiz']; ?></td>
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
<?php 
    require "../config/conexion.php";
    require "../config/app.php";
    if ($_GET) {
        $id    = $_GET['id'];
        $sql   = mysqli_query($con, "SELECT * FROM aprendices WHERE id_aprendices = $id");
        $row   = mysqli_fetch_array($sql);

        $query_historial = mysqli_query($con, "SELECT * FROM historial WHERE aprendiz_cod = '$row[cod_aprendiz]' ORDER BY id DESC");

    }
    include '../templates/header.inc';
    include '../templates/navbar.inc';
?>
<main>
    <ol class="breadcrumb">
      <li><a href="index.php">Inicio</a></li>
      <li class="active">Ver solicitud</li>
    </ol>
    <div class="content dashboard">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <a class="btn btn-primary" href="index.php">Volver</a>
                    <div class="name"><h3><?= $row['nombre_completo'] ?><strong class="text-uppercase tex-bold"> - <?= $row['programa_formacion'].' ('.$row['numero_ficha'].')'; ?></strong></h3></div>
                    <div class="panel panel-default panel-selection">
                        <!-- Default panel contents -->
                        <?php if ($row['estado'] == 0): ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-1 text-center">
                                    <i class="fa fa-info-circle"></i>
                                </div>
                                <div class="col-md-11">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At enim nulla aut, consequatur, a sed id architecto est laboriosam, nisi mollitia illum minima officia! Nesciunt similique magni autem incidunt nulla ratione aliquam maxime magnam est dolorum eos doloremque laborum ex at distinctio iusto quo rerum quis pariatur vero doloribus, id?</p>
                                    <h3>¿El aprendiz califica para recibir el suplemento alimenticio?</h3>
                                    
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#myModal" data-href="aprobar_seleccion.php?id=<?= $row['id_aprendices'] ?>">Si</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalCancel" data-href="reprobar_seleccion.php?id=<?= $row['id_aprendices'] ?>">No</button>

                                    <!-- Modal Confirmación -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class='material-icons'>clear</i></button>
                                            <h4 class="modal-title" id="myModalLabel">Confirmación</h4>
                                          </div>
                                          <div class="modal-body">
                                            <p>Por favor confirma si quieres que este aprendiz sea beneficiario del suplemento alimenticio</p>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cerrar</button>
                                                    <a class="btn btn-info btn-simple btn-ok">Confirmar</a>
                                                </div>
                                          </div>                                          
                                        </div>
                                      </div>
                                    </div>

                                    <!-- Modal Anulación -->
                                    <div class="modal fade" id="modalCancel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class='material-icons'>clear</i></button>
                                            <h4 class="modal-title" id="myModalLabel">Anulación</h4>
                                          </div>
                                          <div class="modal-body">
                                            <p>Por favor confirma si quieres que este aprendiz <strong>NO</strong> sea beneficiario del suplemento alimenticio</p>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cerrar</button>
                                                    <a class="btn btn-info btn-simple btn-cancel">Confirmar</a>
                                                </div>
                                          </div>                                          
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <?php else: ?>
                        <div class="alert alert-success">
                            <div class="container-fluid">
                                <div class="alert-icon">
                                    <i class="material-icons">check</i>
                                </div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                </button>
                                <b>Alerta:</b><h3 class="title-success">El aprendiz ha sido seleccionado para recibir el suplemento alimenticio</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At enim nulla aut, consequatur, a sed id architecto est laboriosam, nisi mollitia illum minima officia! Nesciunt similique magni autem incidunt nulla ratione aliquam maxime magnam est dolorum eos doloremque laborum ex at distinctio iusto quo rerum quis pariatur vero doloribus, id?</p>
                                <?php if (mysqli_num_rows($query_historial) > 0): ?>
                                    <button class="btn btn-historial" data-toggle="modal" data-target="#historial">Ver historial</button>                                    
                                <?php endif ?>

                            </div>
                        </div>
                        <!-- Modal Historial -->
                        <div class="modal fade" id="historial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class='material-icons'>clear</i></button>
                                        <h4 class="modal-title" id="myModalLabel">Historial - <?= $row['nombre_completo'] ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum obcaecati voluptas eum tempora, inventore fuga magni beatae excepturi numquam amet!</p>
                                        <ol>
                                            <?php $count = 0; ?>
                                            <?php foreach ($query_historial as $key => $row_historial): ?>                                            
                                            <li><strong><?= ++$count ?></strong>&nbsp<?= $row_historial['fecha'] ?></li>
                                            <?php endforeach ?>
                                        </ol>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-info btn-simple" data-dismiss="modal">Confirmar</button>
                                        </div>
                                    </div>                                          
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>



                        <!-- List group -->
                        <ul class="list-group">
                            <li class="list-group-item"><span>Tipo de documento: </span><?= $row['tipo_documento']; ?></li>
                            <li class="list-group-item"><span>Número de documento: </span><?= $row['numero_documento']; ?></li>
                            <li class="list-group-item"><span>Dirección de residencia: </span><?= $row['direccion']; ?></li>
                            <li class="list-group-item"><span>Barrio: </span><?= $row['barrio']; ?></li>
                            <li class="list-group-item"><span>Estrato: </span><?= $row['estrato']; ?></li>
                            <li class="list-group-item"><span>Teléfono: </span><?= $row['telefono']; ?></li>
                            <li class="list-group-item"><span>Programa de formación: </span><?= $row['programa_formacion']; ?></li>
                            <li class="list-group-item"><span>Número de ficha: </span><?= $row['numero_ficha']; ?></li>
                            <li class="list-group-item"><span>Jornada: </span><?= $row['jornada']; ?></li>
                            <li class="list-group-item"><span>Persona de la cual depende: </span><?= $row['dep1']; ?></li>
                            <li class="list-group-item"><span>Oficio que realiza de quien depende: </span><?= $row['dep2']; ?></li>
                            <li class="list-group-item"><span>Tiene personas que dependan de usted? </span><?= $row['dep3']; ?></li>
                            <li class="list-group-item"><span>Beneficiario de algun apoyo? </span><?= $row['apoyo']; ?></li>
                            <li class="list-group-item"><span>Compromiso del aprendiz: </span><?= $row['compromiso']; ?></li>
                            <li class="list-group-item"><span>Explicación del por que requiere el suplemento  </span><?= $row['especificacion_suplemento']; ?></li>
                            <li class="list-group-item"><span>Código del aprendiz  </span><?= $row['cod_aprendiz']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include '../templates/footer.inc'; ?>
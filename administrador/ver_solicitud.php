<?php  
require '../config/app.php';
require '../config/database.php';
include '../templates/header.inc';
include '../templates/navbar.inc';
$page = null;
$id_aprendiz = $_GET['id_aprendiz'];
?>
    <main>
        <ol class="breadcrumb">
            <li class=><a href="importar_bd.php"></a>Inicio</li>
            <li class="active">Ver solicitud</li>
        </ol>
        <div class="container">
            <div class="row">
                <?php include '../templates/asidenav.inc'; ?>
                <div class="col-md-10">
                    <a class="btn btn-default" href="index.php">Volver</a>

                    <?php $data = verSolicitud($con, $id_aprendiz); ?>
                    <!-- ------ -->
                    <?php if ($data): ?>
                        <?php foreach ($data as $key => $value): ?>
                            <?php if ($value['estado'] == 0): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3><strong>Nombre del aprendiz: </strong><span class="text-capitalize"><?= $value['nombre_completo'] ?></span></h3></div>
                                </div>
                                <h3>¿El aprendiz califica para recibir el suplemento alimenticio?</h3>
                                
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalConfirm" data-href="aprobar_solicitud.php?id=<?= $value['id_aprendiz'] ?>">Si</button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalCancel" data-href="reprobar_solicitud.php?id=<?= $value['id_aprendiz'] ?>">No</button>

                                <!-- Modal Confirmación -->
                                <div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                <?php else: ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="title-solicitud text-capitalize"><?= $value['nombre_completo'] ?></h3>
                                    </div>
                                </div>
                                <h3>El aprendiz es beneficiario del suplemento alimenticio</h3>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalHistorial">Ver historial</button>


                                <!-- Modal Historial -->
                                <div class="modal fade" id="modalHistorial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class='material-icons'>clear</i></button>
                                                <h4 class="modal-title" id="myModalLabel">Historial</h4>
                                            </div>
                                            <div class="modal-body">
                                                    <?php $cod_aprendiz = $value['cod_aprendiz'] ?>
                                                    <?php $dHistorial = listarHistorial($con, $cod_aprendiz); ?>
                                                    <?php if ($dHistorial): ?>
                                                        <?php foreach ($dHistorial as $key => $hValue): ?>
                                                        <p>Estas son las fechas en las que el aprendiz ha recibido el suplemento</p>
                                                        <ol>
                                                            <li><?= $hValue['fecha']?></li>
                                                        </ol>
                                                        <?php endforeach ?>
                                                    <?php endif ?>
                                                    <?php if (empty(listarHistorial($con, $cod_aprendiz))): ?>
                                                        <h4>El aprendiz no tiene historial</h4>
                                                    <?php endif ?>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cerrar</button>
                                                    <button type="button" class="btn btn-info btn-simple" data-dismiss="modal">Confirmar</button>
                                                </div>
                                            </div>                                          
                                        </div>
                                    </div>
                                </div>

                            <?php endif ?>
                            
                                    <div class="">
                                        <h2>Información Personal</h2>
                                        <hr>
                                        <h6><strong>Tipo de documento</strong></h6>
                                        <p class="text-uppercase"><?= $value['tipo_documento'] ?></p>
                                        <h6><strong>Número de documento</strong></h6>
                                        <p><?= $value['numero_documento'] ?></p>
                                        <h6><strong>Dirección</strong></h6>
                                        <p class="text-capitalize"><?= $value['direccion'] ?></p>
                                        <h6><strong>Barrio</strong></h6>
                                        <p class="text-capitalize"><?= $value['barrio'] ?></p>
                                        <h6><strong>Estrato</strong></h6>
                                        <p><?= $value['estrato'] ?></p>
                                        <h6><strong>Teléfono</strong></h6>
                                        <p><?= $value['telefono'] ?></p>
                                        <h6><strong>Email</strong></h6>
                                        <p><?= $value['email'] ?></p>
                                    </div>
                                    <div class="">
                                        <h2>Información Académica</h2>
                                        <hr>
                                        <h6><strong>Programa de formación</strong></h6>
                                        <p class="text-capitalize"><?= $value['programa_formacion'] ?></p>
                                        <h6><strong>Número de ficha</strong></h6>
                                        <p><?= $value['numero_ficha'] ?></p>
                                        <h6><strong>Jornada</strong></h6>
                                        <p class="text-capitalize"><?= $value['jornada'] ?></p>
                                    </div>
                                    <div class="">
                                        <h2>Información de solicitud</h2>
                                        <hr>
                                        <h6><strong>De quién depende usted?</strong></h6>
                                        <p class="text-capitalize"><?= $value['pregunta1'] ?></p>
                                        <h6><strong>Oficio que realiza de quien depende</strong></h6>
                                        <p class="text-capitalize"><?= $value['pregunta2'] ?></p>
                                        <h6><strong>Tiene personas que dependan de usted?</strong></h6>
                                        <p class="text-capitalize"><?= $value['pregunta3'] ?></p>
                                        <h6><strong>Es usted beneficiario de algún tipo de apoyo</strong></h6>
                                        <p class="text-capitalize"><?= $value['otro_apoyo'] ?></p>
                                        <h6><strong> Se compromete a informar en la oficina de Bienestar al Aprendiz el momento en que usted reciba contrato de aprendizaje, consiguió empleo, o cualquier otro beneficio del Gobierno o del SENA (Monitorias, FIC, Apoyos de sostenimiento, entre otros).</strong></h6>
                                        <p class="text-capitalize"><?= $value['compromiso_informar'] ?></p>
                                        <h6><strong> Se compromete acatar las normas sobre el manejo adecuado del suplemento.</strong></h6>
                                        <p class="text-capitalize"><?= $value['compromiso_normas'] ?></p>
                                        <h6><strong>Explíque a profundidad por que requiere el suplemento</strong></h6>
                                        <p class="text-capitalize"><?= $value['justificacion_suplemento'] ?></p>

                                    </div>
                               


                       
                        
                        <?php endforeach ?>      
                    <?php endif ?>
                </div>
            <!-- ------ -->

            <?php if (isset($_SESSION['message_action'])): ?>
              <h2><b>:( </b><?= $_SESSION['message_action'] ?></h2>
              <?php unset($_SESSION['message_action']); ?>
            <?php endif ?>
            </div>
        </div>
    </main>
<?php include '../templates/footer.inc'; ?>
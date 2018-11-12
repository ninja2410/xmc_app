<?php
require_once('../../Negocio/ClassLesionJugador.php');
require_once('../../Negocio/ClassTratamiento.php');
$tratamiento=new Tratamiento();
$lesion=new LesionJugador();
$data_lesion=$lesion->select($_GET['id']);
$data_tratamiento=$tratamiento->select($_GET['id']);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lesión - Actualizar</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '../layoults/barnavLogged.php'; ?>
    <div class="main main-raised">
    <div class="content">

        <div class="card col-md-12">
          <div class="card-header card-header-danger">
            <h3 class="card-title">Ver detalles de  lesión del jugador</h3>
            <p class="card-category">Registro de lesión por jugador</p>
          </div>
          <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class=""><b> Fecha Inicio: </b></label>
                    <label for=""><?php echo date('d/m/Y', strtotime($data_lesion['fecha_inicio'])); ?></label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class=""> <b> Fecha de recuperación:</b></label>
                    <label for="">
                    <?php
                    if ($data_lesion['fecha_final']==$data_lesion['fecha_inicio']) {
                      echo "Lesión activa";
                    }
                    else{
                      echo date('d/m/Y',strtotime($data_lesion['fecha_final']));
                    }
                     ?>
                     </label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class=""><b> Lesión: </b></label>
                    <label for=""><?php echo $data_lesion['nombre']; ?></label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class=""><b> Médico: </b></label>
                    <label for=""><?php echo $data_lesion['medico']; ?></label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class=""><b>Jugador: </b></label>
                    <label for=""><?php echo $data_lesion['JUGADOR']; ?></label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class=""><b>Costo: </b></label>
                    <label for=""><?php echo $data_lesion['costo']; ?></label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class=""><b>Motivo: </b></label>
                    <label for=""><?php echo $data_lesion['motivo']; ?></label>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label class=""><b>Observaciones: </b></label>
                    <label for=""><?php echo $data_lesion['observacion']; ?></label>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <h3>Tratamiento utilizado</h3>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="table-responsive">
                    <table class="table" id="agregados">
                      <thead class=" text-muted">
                        <th>
                          Cantidad
                        </th>
                        <th>
                          Medicamento
                        </th>
                        <th>
                          Prescripción
                        </th>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($data_tratamiento as $key => $val) {
                          ?>
                          <tr>
                            <td><?php echo $val['cantidad']; ?></td>
                            <td><?php echo $val['medicamento']; ?></td>
                            <td><?php echo $val['prescripcion']; ?></td>
                          </tr>
                          <?php
                        }
                         ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <a href="javascript:history.back(-1);"> <button type="button" class="btn btn-info pull-right btn-round"><i class="fas fa-undo-alt fa-lg"></i> Regresar</button></a>
              </div>
              <div class="clearfix"></div>
          </div>
        </div>
    </div>
    </div>
    <?php include '../layoults/footer.php'; ?>
    <?php include '../layoults/scripts2.php'; ?>
  </body>
</html>

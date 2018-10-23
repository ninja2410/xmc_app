<?php
require_once('..\..\Negocio/ClassDatoPartido.php');
require_once('..\..\Negocio/ClassJugador.php');
require_once('..\..\Negocio/ClassEstadisticaJugador.php');
$datoPartido=new DatoPartido();
$dato=$datoPartido->select(-1);
$jugadorC=new Jugador();
$jugadoresL=$jugadorC->selectPartido($_GET['partido']);
$estadistica=new EstadisticaJugador();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Estadísticas por jugador - Editar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '..\layoults\barnav.php';
    ?>
    <div class="main main-raised">
    <div class="content">
      <div class="container-fluid">
        <input type="hidden" id="mensaje" name="secret" value="<?php if ($_SESSION['mensaje']!="") {
              echo $_SESSION['mensaje'];
              $_SESSION['mensaje']="";
            } ?>">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-danger">
                <div class="col-lg-10" style="float:left;">
                  <h2 class="card-title ">ESTADÍSTICAS</h4>
                  <p class="card-category"> Información de estadísticas de jugador</p>
                </div>
                <div class="col-lg-1" style="float:left">
                  <a href="..\..\vista\estadisticaJugador/insert.php" title="Agregar nueva estadistica">
                    <div class="card-header card-header-success card-header-icon" style="float:right">
                      <div class="card-icon">
                        <i class="material-icons">add</i>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-info">
                      <th>
                        ID
                      </th>
                      <th>
                        Nombre
                      </th>
                      <?php
                      foreach ($dato as $key => $value) {
                        ?>
                        <th style="text-align:center;"> <?php echo $value['nombre']; ?> </th>
                        <?php
                      }
                       ?>

                    </thead>
                    <tbody>
                      <?php
                      foreach ($jugadoresL as $key => $value) {
                        ?>
                        <tr>
                          <td><?php echo $value['id_jugador']; ?></td>
                          <td><?php echo $value['nombre'] ?></td>
                          <?php
                          foreach ($dato as $key => $dt) {
                            $row=$estadistica->buscarDato($dt['id_dato_partido'], $_GET['partido'], $value['id_jugador']);
                            $result=$row['valor'];
                            ?>
                            <!-- MODAL DE EDICIÓN -->
                            <!-- Modal -->
                            <div class="modal fade" id="<?php echo "loginModal".$key.$row['id_dato_partido'].$value['id_jugador']; ?>" tabindex="-1" role="">
                              <div class="modal-dialog modal-login" role="document">
                                  <div class="modal-content">
                                      <div class="card card-signup card-plain">
                                          <div class="modal-header">
                                              <div class="card-header card-header-primary text-center">
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                                                  <h4 class="card-title">Edición de <?php echo $dt['nombre']; ?></h4>
                                              </div>
                                          </div>
                                          <div class="modal-body">
                                              <form class="form" method="POST" action="store.php" id="<?php echo "frm".$key.$row['id_dato_partido'].$value['id_jugador']; ?>">
                                                <input type="hidden" name="estadistica" value="<?php echo $row['id_estadistica_jugador']; ?>">
                                                <input type="hidden" name="dato" value="<?php echo $dt['id_dato_partido']; ?>">
                                                <input type="hidden" name="jugador" value="<?php echo $value['id_jugador']; ?>">
                                                <input type="hidden" name="partido" value="<?php echo $_GET['partido']; ?>">
                                                <input type="hidden" name="operation" value="<?php if($row['id_estadistica_jugador']==''){echo "5";} else{echo "4";} ?>">
                                                  <p class="description text-center">Indique los nuevos valores</p>
                                                  <div class="card-body">
                                                      <div class="form-group bmd-form-group">
                                                          <div class="input-group">
                                                              <span class="input-group-addon">
                                                                  <i class="material-icons">check_circle</i>
                                                              </span>
                                                              <input type="text" class="form-control" name="valor" placeholder="Valor" value=" <?php
                                                              echo $result;
                                                              ?>">
                                                          </div>
                                                      </div>
                                                      <div class="form-group bmd-form-group">
                                                          <div class="input-group">
                                                              <span class="input-group-addon">
                                                                  <i class="material-icons">alarm</i>
                                                              </span>
                                                              <input type="number" class="form-control" name="minuto" value="<?php echo $row['minuto']; ?>" placeholder="Minuto">
                                                          </div>
                                                      </div>
                                                  </div>

                                          </div>
                                          <div class="modal-footer justify-content-center">
                                            <button onclick="enviarDatos('<?php echo "frm".$row['id_estadistica_jugador'];?>', '<?php echo "loginModal".$key.$row['id_dato_partido'].$value['id_jugador']; ?>')" type="submit" class="btn btn-success pull-right btn-round"><i class="fas fa-check fa-lg"></i> Aceptar</button>
                                          </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                            </div>
                          <!--Fin del modal-->
                            <td style="text-align:center;" data-toggle="modal" data-target="<?php echo "#loginModal".$key.$row['id_dato_partido'].$value['id_jugador']; ?>" data-backdrop="false"
                              <?php
                            ?>
                            <?php if ($result!=''): ?>
                              rel="tooltip" title="Min:<?php echo $row['minuto']; ?>"
                            <?php endif; ?>
                            <?php
                             ?> >
                             <?php
                            if ($result=='') {
                              echo "0";
                            }
                            else{
                              echo $result;
                            }
                            ?>
                            </td>
                            <?php
                          }
                           ?>
                        </tr>
                        <?php
                      }
                       ?>
                    </tbody>
                  </table>
                  <a href="index.php?partido=<?php echo $_GET['partido']; ?>"> <button type="button" class="btn btn-danger pull-right btn-round"><i class="fas fa-undo-alt fa-lg"></i> Regresar</button></a>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    </div>
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
    <script type="text/javascript">
    $(document).ready(function(){
      if ($('#mensaje').val()!="") {
        alertify.success($('#mensaje').val());
      }
    });
      // function enviarDatos(id_formulario, id_modal){
      //
      //   var url = "store.php";
      //   $.ajax({
      //      type: "POST",
      //      url: url,
      //      data: $("#"+id_formulario).serialize(),
      //      success: function(data)
      //      {
      //      }
      // });
      // $('#'+id_modal).hide();
      // location.reload();
    </script>
  </body>
</html>

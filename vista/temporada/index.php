<?php
require_once('../../Negocio/ClassTemporada.php');
$temporada=new Temporada();
$data=$temporada->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Temporadas - Listar</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '../layoults/barnavLogged.php';
    ?>
    <input type="hidden" id="mensaje" name="secret" value="<?php if ($_SESSION['mensaje']!="") {
      echo $_SESSION['mensaje'];
      $_SESSION['mensaje']="";
    } ?>">
    <div class="main main-raised">
    <div class="content">
            <div class="card col-md-12">
      <div class="container-fluid">
              <div class="card-header card-header-danger row">
                <div class="col-md-11">
                  <h3 class="card-title ">Temporadas</h4>
                  <p class="category">Listado de temporadas</p>
                </div>
                <div class="col-md-1 text-right">
                <a href="../../vista/temporada/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar temporada">
                    <i class="material-icons">add</i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table1">
                    <thead>
                      <th>
                        ID
                      </th>
                      <th>
                        Descripción
                      </th>
                      <th>
                        Fecha de inicio
                      </th>
                      <th>
                        Finalización
                      </th>
                      <th >
                        Estadísticas
                      </th>
                      <th>
                        Acciones
                      </th>
                      <th>
                        Estado
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                      <tr>
                        <td>
                          <?php echo $row['id_temporada']; ?>
                        </td>
                        <td>
                          <?php echo $row['descripcion']; ?>
                        </td>
                        <td>
                          <?php echo $row['fecha_inicio']; ?>
                        </td>
                        <td>
                          <?php echo $row['fecha_final']; ?>
                        </td>
                        <td class="text-center">
                          <a href="../../vista/temporada/partidos.php?id=<?php echo $row['id_temporada']; ?>">
                          <button class="btn btn-warning btn-round btn-sm"><i class="fas fa-futbol fa-lg"> </i>  Resumen</button>

                          <a href="..\..\vista\temporada/estadistica_jugador.php?temporada=<?php echo $row['id_temporada']; ?>">
                          <button class="btn btn-info btn-round btn-sm"><i class="material-icons">accessibility_new</i>  Jugadores</button>
                        </td>
                        <td class="td-actions text-left">
                            <div style="float:left">
                              <a href="..\..\vista\temporada/update.php?id=<?php echo $row['id_temporada']; ?>">
                                <button type="button" rel="tooltip" title="Editar temporada" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="..\..\vista\temporada/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_temporada']; ?>">
                                <!-- Inicio de modal -->
                                <button type="button" data-toggle="modal" data-target="<?php echo '#Confirmacion'.$row['id_temporada']; ?>" rel="tooltip" title="Eliminar temporada" class="btn btn-danger btn-link btn-sm">
                                  <i class="material-icons">close</i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="<?php echo 'Confirmacion'.$row['id_temporada']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="false">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                                      </div>
                                      <div class="modal-body">
                                      ¿Está seguro que desea eliminar esta temporada?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Eliminar</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!--  -->
                              </form>
                            </div>
                        </td>
                        <td class="text-center">
                        <?php if($row['estado']==1)
                        {
                        ?>
                          <a>
                              <!-- <button class="btn btn-success btn-round btn-sm"><i class="fas fa-futbol fa-lg"> </i> </button> -->
                              <span class="badge badge-pill badge-success">En curso</span>
                          </a>
                        <?php
                        }
                        ?>
                          <?php if($row['estado']==0)
                        {
                        ?>
                          <a>
                          <!-- <button class="btn btn-danger btn-round btn-sm"><i class="fas fa-futbol fa-lg"> </i>  </button> -->
                          <span class="badge badge-pill badge-danger">Finalizado</span>
                          </a>
                        <?php
                        }
                        ?>
                        </td>
                        <?php
                      } ?>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
      </div>
      </div>
    </div>
    <?php include '../layoults/footer.php'; ?>
    <?php include '../layoults/scripts2.php'; ?>
    <script type="text/javascript">
    $(document).ready(function(){

      if ($('#mensaje').val()!="") {
        alertify.success($('#mensaje').val());
      }

   $('#table1').DataTable({
       dom: 'Bfrtip',
"language": {
  "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
 },
       buttons: [
         {
           extend:'copy',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de temporadas',
           exportOptions:{
             columns:[0,1,2,3]
           }
         },
         {
           extend:'csv',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de temporadas',
           exportOptions:{
             columns:[0,1,2,3]
           }
         },
         {
           extend:'excel',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de temporadas',
           exportOptions:{
             columns:[0,1,2,3]
           }
         },
         {
           extend:'pdf',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de temporadas',
           exportOptions:{
             columns:[0,1,2,3]
           }
         },
         {
           extend:'print',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de temporadas',
           exportOptions:{
             columns:[0,1,2,3]
           }
         }
       ]
   }) ;
});
    </script>
  </body>
</html>

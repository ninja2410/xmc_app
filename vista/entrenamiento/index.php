<?php
require_once('../../Negocio/ClassEntrenamiento.php');
$entreno=new Entrenamiento();
$data=$entreno->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Entrenos - Listar</title>
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
                  <h3 class="card-title ">Entrenamientos</h3>
                  <p class="card-category"> Listado de entrenos</p>
                </div>
                <div class="col-md-1 text-right">
                <a href="../../vista/entrenamiento/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar entrenamiento">
                    <i class="material-icons">add</i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table1">
                    <thead >
                      <th>
                        Fecha y hora
                      </th>
                      <th>
                        Temporada
                      </th>
                      <th>
                        Categoría
                      </th>
                      <th>
                        Asistencia
                      </th>
                      <th>
                        Editar/Suspender
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
                        <?php echo $row['fecha']; ?>
                        </td>
                        <td>
                          <?php echo $row['descripcion']; ?>
                        </td>
                        <td>
                          <?php echo $row['categoria']; ?>
                        </td>
                        <td>
                          <a href="../../vista/asistencia/index.php?id=<?php echo $row['id_entrenamiento']; ?>">
                          <button class="btn btn-success btn-round btn-sm"> <i class="far fa-eye fa-lg"></i> Ver asistencia</button>
                        </td>
                        <td class="td-actions text-lefht">
                            <div style="float:left">
                              <a href="../../vista/entrenamiento/update.php?id=<?php echo $row['id_entrenamiento']; ?>">
                                <button type="button" rel="tooltip" title="Editar Entreno" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="../../vista/entrenamiento/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_entrenamiento']; ?>">
                                <!-- Inicio de modal -->
                                <button type="button" data-toggle="modal" data-target="<?php echo '#Confirmacion'.$row['id_entrenamiento']; ?>" rel="tooltip" title="Suspender" class="btn btn-danger btn-link btn-sm">
                                  <i class="material-icons">close</i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="<?php echo 'Confirmacion'.$row['id_entrenamiento']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="false">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                                      </div>
                                      <div class="modal-body">
                                      ¿Está seguro que desea suspender el entreno?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Suspender</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!--  -->
                              </form>
                            </div>
                        </td>
                        <td>
                        <?php if($row['estado']==1)
                        {
                        ?>
                          <a>
                              <!-- <button class="btn btn-success btn-round btn-sm"><i class="fas fa-futbol fa-lg"> </i> </button> -->
                              <span class="badge badge-pill badge-success">Ejecutado</span>
                          </a>
                        <?php
                        }
                        ?>
                          <?php if($row['estado']==0)
                        {
                        ?>
                          <a>
                          <!-- <button class="btn btn-danger btn-round btn-sm"><i class="fas fa-futbol fa-lg"> </i>  </button> -->
                          <span class="badge badge-pill badge-danger">Suspendido</span>
                          </a>
                        <?php
                        }
                        ?>
                        <?php if($row['estado']==3)
                        {
                        ?>
                          <a>
                          <!-- <button class="btn btn-danger btn-round btn-sm"><i class="fas fa-futbol fa-lg"> </i>  </button> -->
                          <span class="badge badge-pill badge-warning">Pendiente</span>
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
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de entrenamientos',
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         },
         {
           extend:'csv',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de entrenamientos',
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         },
         {
           extend:'excel',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de entrenamientos',
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         },
         {
           extend:'pdf',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de entrenamientos',
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         },
         {
           extend:'print',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de entrenamientos',
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         }
       ],
   }) ;
});
    </script>
  </body>
</html>

<?php
require_once('../../Negocio/ClassPrensa.php');
$prensa=new Prensa();
$data=$prensa->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Prensa - Listar</title>
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
                  <h3 class="card-title">Prensa</h3>
                  <p class="category">Listado de prensa</p>
                </div>
                <div class="col-md-1 text-right">
                <a href="../../vista/prensa/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar prensa">
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
                        Nombre
                      </th>
                      <th>
                        Teléfono
                      </th>
                      <th>
                        Empresa
                      </th>
                      <th>
                        Documentos
                      </th>
                      <th>
                        Acciones
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                      <tr>
                        <td>
                          <?php echo $row['id_prensa']; ?>
                        </td>
                        <td>
                        <?php echo $row['nombre']." ".$row['apellido']; ?>
                        </td>
                        <td>
                          <?php echo $row['telefono']; ?>
                        </td>
                        <td>
                          <?php echo $row['empresa']; ?>
                        </td>
                        <td class="td-actions text-left">
                        <div style="float:left"> 
                        <a href="../../vista/prensa/documentos.php?id=<?php echo $row['id_prensa']; ?>">
                          <button class="btn btn-info btn-round btn-sm"><i class="far fa-file-text fa-lg"></i> Documentos</button>
                          </div>
                            </td>
                            <td class="td-actions text-left">
                            <div style="float:left">
                              <a href="../../vista/prensa/update.php?id=<?php echo $row['id_prensa']; ?>">
                                <button type="button" rel="tooltip" title="Editar prensa" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            
                            
                            <div style="float:left">
                              <form class="" action="../../vista/prensa/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_prensa']; ?>">
                                <!-- Inicio de modal -->
                            <button type="button" data-toggle="modal" data-target="<?php echo '#Confirmacion'.$row['id_prensa']; ?>" rel="tooltip" title="Eliminar prensa" class="btn btn-danger btn-link btn-sm">
                                  <i class="material-icons">close</i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="<?php echo 'Confirmacion'.$row['id_prensa']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="false">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                                      </div>
                                      <div class="modal-body">
                                      ¿Está seguro que desea eliminar a este reportero?
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
                        <?php
                      } ?>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <a href="prensa_partidos.php"> <button type="button" class="btn btn-warning pull-right"> <i class="fas fa-chart-bar"></i>Partidos</button></a>
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
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de prensa',
           exportOptions:{
             columns:[0,1,2,3,4]
           }
         },
         {
           extend:'csv',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de prensa',
           exportOptions:{
             columns:[0,1,2,3,4]
           }
         },
         {
           extend:'excel',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de prensa',
           exportOptions:{
             columns:[0,1,2,3,4]
           }
         },
         {
           extend:'pdf',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de prensa',
           exportOptions:{
             columns:[0,1,2,3,4]
           }
         },
         {
           extend:'print',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de prensa',
           exportOptions:{
             columns:[0,1,2,3,4]
           }
         }
       ],
   }) ;
});
    </script>
  </body>
</html>

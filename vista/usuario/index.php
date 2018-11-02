<?php
require_once('../../Negocio/ClassUsuario.php');
$usuario=new Usuario();
$data=$usuario->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Usuarios - Listar</title>
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
                <div class="col-md-10">
                  <h2 class="card-title">Usuarios</h2>
                  <p class="category">Usuarios registrados</p>
                </div>
                <div class="col-md-2 text-right">
                  <a href="../../vista/usuario/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" rel="tooltip" title="Agregar usuario" aria-disabled="true">
                    <i class="material-icons">add</i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered" id="table1">
                    <thead>
                      <th style="text-align:center">
                        ID
                      </th>
                      <th style="text-align:center">
                        Usuario
                      </th>
                      <th style="text-align:center">
                        Nombre
                      </th>
                      <th >
                        Acciones
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                      <tr>
                        <td style="text-align:center">
                          <?php echo $row['id_usuario']; ?>
                        </td>
                        <td style="text-align:center">
                          <?php echo $row['nombre_usuario']; ?>
                        </td>
                        <td style="text-align:center">
                        <?php echo $row['nombre']." ".$row['apellido']; ?>
                        </td>
                        <td class="td-actions">
                            <div style="float:left">
                              <a href="../../vista/usuario/update.php?id=<?php echo $row['id_usuario']; ?>">
                                <button type="button" rel="tooltip" title="Editar Usuario" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="../../vista/usuario/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_usuario']; ?>">
                                <!-- Inicio de modal -->
                                <button type="button" data-toggle="modal" data-target="<?php echo '#Confirmacion'.$row['id_usuario']; ?>" rel="tooltip" title="Eliminar usuario" class="btn btn-danger btn-link btn-sm">
                                  <i class="material-icons">close</i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="<?php echo 'Confirmacion'.$row['id_usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="false">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                                      </div>
                                      <div class="modal-body">
                                      ¿Está seguro que desea eliminar este usuario?
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
           title:'Listado de usuarios',
           exportOptions:{
             columns:[0,1]
           }
         },
         {
           extend:'csv',
           title:'Listado de usuarios',
           exportOptions:{
             columns:[0,1]
           }
         },
         {
           extend:'excel',
           title:'Listado de usuarios',
           exportOptions:{
             columns:[0,1]
           }
         },
         {
           extend:'pdf',
           title:'Listado de usuarios',
           exportOptions:{
             columns:[0,1]
           }
         },
         {
           extend:'print',
           title:'Listado de usuarios',
           exportOptions:{
             columns:[0,1]
           }
         }
       ],
   }) ;
});
    </script>
  </body>
</html>

<?php
require_once('..\..\Negocio/ClassUsuario.php');
$usuario=new Usuario();
$data=$usuario->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Usuarios - Listar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '..\layoults\barnavLogged.php';
    ?>
    <input type="hidden" id="mensaje" name="secret" value="<?php if ($_SESSION['mensaje']!="") {
      echo $_SESSION['mensaje'];
      $_SESSION['mensaje']="";
    } ?>">
    
    <div class="main main-raised">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-danger row">
                <div class="col-md-10">
                  <h3 class="card-title">Usuarios</h3>
                  <p class="category">Usuarios registrados</p>
                </div>
                <div class="col-md-2 text-right">
                  <a href="..\..\vista\usuario/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true">
                    <i class="material-icons">add</i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table " id="table1">
                    <thead class=" text-primary">
                      <th>
                        ID
                      </th>
                      <th>
                        Usuario
                      </th>
                      <th>

                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                      <tr>
                        <td>
                          <?php echo $row['id_usuario']; ?>
                        </td>
                        <td>
                          <?php echo $row['nombre_usuario']; ?>
                        </td>
                        <td class="td-actions text-lefht">
                            <div style="float:left">
                              <a href="..\..\vista\usuario/update.php?id=<?php echo $row['id_usuario']; ?>">
                                <button type="button" rel="tooltip" title="Editar Usuario" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="..\..\vista\usuario/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_usuario']; ?>">
                                <button type="submit" rel="tooltip" title="Eliminar Usuario" class="btn btn-danger btn-link btn-sm">
                                  <i class="material-icons">close</i>
                                </button>
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
    </div>
    </div>
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
    <script type="text/javascript">
    $(document).ready(function(){
      if ($('#mensaje').val()!="") {
        alertify.success($('#mensaje').val());
      }
   $('#table1').DataTable({
       dom: 'Bfrtip',
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

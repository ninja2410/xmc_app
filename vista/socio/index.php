<?php
require_once('../../Negocio/ClassSocio.php');
$socio=new Socio();
$data=$socio->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Socios - Listar</title>
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
                  <h3 class="card-title ">Socios</h3>
                  <p class="card-category">Listado de socios del club Xelajú MC</p>
                </div>
                <div class="col-md-1 text-right">
                <a href="../../vista/socio/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar socio">
                    <i class="material-icons">add</i>
                  </a>
                </div>
              </div>
              <div class="card-body text-center">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table1">
                    <thead>
                      <th>
                        ID
                      </th>
                      <th>
                        Nombre
                      </th>
                      <?php 
                        if($DDoc==1)
                        {
                        ?>
                      <th>
                        Documentos
                      </th>
                        <?php } ?>
                      <th>
                        Detalles del socio
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
                          <?php echo $row['id_socio']; ?>
                        </td>
                        <td>
                        <?php echo $row['nombre']." ".$row['apellido']; ?>
                        </td>

                        <?php 
                        if($DDoc==1)
                        {
                        ?>
                        <td>

                          <a href="../../vista/socio/documentos.php?id=<?php echo $row['id_socio']; ?>">
                          <button class="btn btn-info btn-round btn-sm"><i class="far fa-file-text fa-lg"></i> Documentos</button>
                          <?php 
                        }
                        ?>
                          </td>
                          <td >

                          <a href="../../vista/socio/detalles.php?id=<?php echo $row['id_socio']; ?>">
                          <button class="btn btn-success btn-round btn-sm"><i class="far fa-eye fa-lg"></i> Ver detalles</button>

                          </td>
                          <td >
                            <div style="float:left">
                              <a href="../../vista/socio/update.php?id=<?php echo $row['id_socio']; ?>">
                                <button type="button" rel="tooltip" title="Editar socio" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="../../vista/socio/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_socio']; ?>">
                                <!-- Inicio de modal -->
                                <button type="button" data-toggle="modal" data-target="<?php echo '#Confirmacion'.$row['id_socio']; ?>" rel="tooltip" title="Eliminar socio" class="btn btn-danger btn-link btn-sm">
                                  <i class="material-icons">close</i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="<?php echo 'Confirmacion'.$row['id_socio']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="false">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                                      </div>
                                      <div class="modal-body">
                                      ¿Está seguro que desea eliminar este socio?
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
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de socios',
           exportOptions:{
             columns:[0,1,2]
           }
         },
         {
           extend:'csv',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de socios',
           exportOptions:{
             columns:[0,1,2]
           }
         },
         {
           extend:'excel',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de socios',
           exportOptions:{
             columns:[0,1,2]
           }
         },
         {
           extend:'pdf',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de socios',
           exportOptions:{
             columns:[0,1,2]
           }
         },
         {
           extend:'print',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de socios',
           exportOptions:{
             columns:[0,1,2]
           }
         }
       ],
   }) ;
});
    </script>
  </body>
</html>

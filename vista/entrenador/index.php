<?php
require_once('..\..\Negocio/ClassEntrenador.php');
$entrenador=new Entrenador();
$data=$entrenador->select(-1);
 ?>

 <?php
require_once('..\..\Negocio/ClassAsignacionEntrenador.php');
$asignacion=new AsignacionEntrenador();
$data2=$asignacion->select(-1);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Entrenador - Listar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '..\layoults\barnav.php';
    ?>
    <input type="hidden" id="mensaje" name="secret" value="<?php if ($_SESSION['mensaje']!="") {
      echo $_SESSION['mensaje'];
      $_SESSION['mensaje']="";
    } ?>">
    <div class="main main-raised">
    <div class="content">
            <div class="card">
      <div class="container-fluid">

          <div class="col-md-13">
              <div class="card-header card-header-danger row">
              <div class="col-md-11">
                  <h3 class="card-title">Entrenador</h3>
                  <p class="category">Listado de entrenadores</p>
                </div>
                <div class="col-md-1 text-right">
                <a href="..\..\vista\entrenador/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar entrenador">
                    <i class="material-icons">add</i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table1">
                    <thead  >
                      <th>
                        ID
                      </th>
                      <th>
                        Nombre
                      </th>
                      <th>
                        Categoría
                      </th>
                      <th>
                        Foto
                      </th>
                      <th>
                        Documentos
                      </th>
                      <th>
                        Detalles
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
                          <?php echo $row['id_entrenador']; ?>
                        </td>
                        <td>
                        <?php echo $row['nombre']." ".$row['apellido']; ?>
                        </td>
                        <td>
                        <?php echo $row['CATEGORIA']; ?>
                        </td>
                        <td>
                        <?php
                         echo '<img style="height:40px;width:40px"  src="../imagenes/'.$row['foto'].'"  alt="Circle Image" class="img-raised rounded-circle img-fluid">';
                        ?>
                        </td>
                        <td class="td-actions text-left">
                        <div style="float:left"> 
                        <a href="..\..\vista\entrenador/documentos.php?id=<?php echo $row['id_entrenador']; ?>">
                          <button class="btn btn-info btn-round btn-sm"><i class="far fa-file-text fa-lg"></i> Documentos</button>
                          </div>
                            </td>
                            <td class="td-actions text-left">
                            <div style="float:left">
                            <a href="..\..\vista\entrenador/detalle.php?id=<?php echo $row['id_entrenador']; ?>">
                          <button class="btn btn-success btn-round btn-sm"><i class="far fa-eye fa-lg"></i> Ver detalles</button>
                          </div>
                            </td>
                            <td class="td-actions text-left">
                            <div style="float:left">
                              <a href="..\..\vista\entrenador/update.php?id=<?php echo $row['id_entrenador']; ?>">
                                <button type="button" rel="tooltip" title="Editar entrenador" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="..\..\vista\entrenador/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_entrenador']; ?>">
                                <!-- Inicio de modal -->
                                <button type="button" data-toggle="modal" data-target="<?php echo '#Confirmacion'.$row['id_entrenador']; ?>" rel="tooltip" title="Eliminar entrenador" class="btn btn-danger btn-link btn-sm">
                                  <i class="material-icons">close</i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="<?php echo 'Confirmacion'.$row['id_entrenador']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="false">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                                      </div>
                                      <div class="modal-body">
                                      ¿Está seguro que desea eliminar este entrenador?
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
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
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
                 title:'Listado de entrenadores',
                 exportOptions:{
                   columns:[0,1,2]
                 }
               },
               {
                 extend:'csv',
                 title:'Listado de entrenadores',
                 exportOptions:{
                   columns:[0,1,2]
                 }
               },
               {
                 extend:'excel',
                 title:'Listado de entrenadores',
                 exportOptions:{
                   columns:[0,1,2]
                 }
               },
               {
                 extend:'pdf',
                 title:'Listado de entrenadores',
                 exportOptions:{
                   columns:[0,1,2]
                 }
               },
               {
                 extend:'print',
                 title:'Listado de entrenadores',
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

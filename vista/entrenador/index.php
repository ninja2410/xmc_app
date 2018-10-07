<?php
require_once('..\..\Negocio/ClassEntrenador.php');
$entrenador=new Entrenador();
$data=$entrenador->select(-1);
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
    <div class="main main-raised">
    <div class="content">
      <div class="container-fluid">

          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-danger">
                <div class="col-lg-10" style="float:left;">
                  <h2 class="card-title ">Entrenador</h4>
                  <p class="card-category"> Listado de entrenadores</p>
                </div>
                <div class="col-lg-1" style="float:left">
                  <a href="..\..\vista\entrenador/insert.php" title="Agregar nuevo Entrenador">
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
                  <table class="table" id="table1">
                    <thead class=" text-info">
                      <th>
                        ID
                      </th>
                      <th>
                        Nombre
                      </th>
                      <th>
                        Apellido
                      </th>
                      <th>
                        Fecha Nacimiento
                      </th>
                      <th>
                        Fecha Inicio
                      </th>
                      <th>
                        Fecha Final
                      </th>
                      <th>
                        Dirección
                      </th>
                      <th>
                        Teléfono
                      </th>
                      <th>
                        Tipo de Entrenador
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
                          <?php echo $row['nombre']; ?>
                        </td>
                        <td>
                          <?php echo $row['apellido']; ?>
                        </td>
                        <td>
                          <?php echo $row['fecha_nacimiento']; ?>
                        </td>
                        <td>
                          <?php echo $row['fecha_inicio']; ?>
                        </td>
                        <td>
                          <?php echo $row['fecha_fin']; ?>
                        </td>
                        <td>
                          <?php echo $row['direccion']; ?>
                        </td>
                        <td>
                          <?php echo $row['telefono']; ?>
                        </td>
                        <td>
                          <?php echo $row['descripcion']; ?>
                        </td>
                        <td class="td-actions text-left">
                            <div style="float:left">
                              <a href="..\..\vista\entrenador/update.php?id=<?php echo $row['id_entrenador']; ?>">
                                <button type="button" rel="tooltip" title="Editar Entrenador" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="..\..\vista\entrenador/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_entrenador']; ?>">
                                <button type="submit" rel="tooltip" title="Eliminar Entrenador" class="btn btn-danger btn-link btn-sm">
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
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
    <script type="text/javascript">
    $(document).ready(function(){
$('#table1').DataTable({
   dom: 'Bfrtip',
   buttons: [
     {
       extend:'copy',
       title:'Listado de entrenadores',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     },
     {
       extend:'csv',
       title:'Listado de entrenadores',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     },
     {
       extend:'excel',
       title:'Listado de entrenadores',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     },
     {
       extend:'pdf',
       title:'Listado de entrenadores',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     },
     {
       extend:'print',
       title:'Listado de entrenadores',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     }
   ],
}) ;
});
    </script>
  </body>
</html>

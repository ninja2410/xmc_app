<?php
require_once('../../Negocio/ClassPartido.php');
$partido=new Partido();
$data=$partido->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Partidos - Listar</title>
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
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <div class="col-lg-10" style="float:left;">
                  <h2 class="card-title ">Partidos</h4>
                  <p class="card-category"> Listado de partidos</p>
                </div>
                <div class="col-lg-1" style="float:left">
                  <a href="../../vista/partido/insert.php" title="Agregar nuevo partido">
                    <div class="card-header card-header-success card-header-icon" style="float:left">
                      <div class="card-icon">
                        <i class="material-icons">add</i>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table1">
                    <thead class=" text-primary">
                      <th>
                        ID
                      </th>
                      <th>
                        Fecha
                      </th>
                      <th>
                        Inicio 1
                      </th>
                      <th>
                        Categoría
                      </th>
                      <th>
                        Estadio
                      </th>
                      <th>
                        Goles a favor
                      </th>
                      <th>
                        Goles en contra
                      </th>
                      <th>
                        Equipo
                      </th>
                      <th>
                        Temporada
                      </th>
                      <th>
                        Inicio 2
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
                          <?php echo $row['id_partido']; ?>
                        </td>
                        <td>
                          <?php echo $row['fecha']; ?>
                        </td>
                        <td>
                          <?php echo $row['hora_inicio1']; ?>
                        </td>
                        <td>
                          <?php echo $row['id_categoria']; ?>
                        </td>
                        <td>
                          <?php echo $row['id_estadio']; ?>
                        </td>
                        <td>
                          <?php echo $row['goles_favor']; ?>
                        </td>
                        <td>
                          <?php echo $row['goles_contra']; ?>
                        </td>
                        <td>
                          <?php echo $row['id_equipo']; ?>
                        </td>
                        <td>
                          <?php echo $row['id_temporada']; ?>
                        </td>
                        <td>
                          <?php echo $row['hora_inicio2']; ?>
                        </td>
                        <td>
                          <?php echo $row['id_estado_partido']; ?>
                        </td>
                        <td class="td-actions text-lefht">
                            <div style="float:left">
                              <a href="../../vista/partido/update.php?id=<?php echo $row['id_partido']; ?>">
                                <button type="button" rel="tooltip" title="Editar partido" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="../../vista/partido/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_partido']; ?>">
                                <button type="submit" rel="tooltip" title="Eliminar partido" class="btn btn-danger btn-link btn-sm">
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
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de estadisticas',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8,9,10]
       }
     },
     {
       extend:'csv',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de estadisticas',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8,9,10]
       }
     },
     {
       extend:'excel',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de estadisticas',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8,9,10]
       }
     },
     {
       extend:'pdf',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de estadisticas',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8,9,10]
       }
     },
     {
       extend:'print',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de estadisticas',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8,9,10]
       }
     }
   ],
}) ;
});
    </script>
  </body>
</html>

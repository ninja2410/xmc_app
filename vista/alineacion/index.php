<?php
require_once('..\..\Negocio/ClassAlineacion.php');
$alineacion=new Alineacion();
$data=$alineacion->select(-1);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alineaciones - Listar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
  <?php include '..\layoults\barnav.php'; ?>
    <div class="main main-raised">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <div class="col-lg-10" style="float:left;">
                  <h2 class="card-title ">Alineaciones</h4>
                  <p class="card-category"> Listado de alineaciones</p>
                </div>
                <div class="col-lg-1" style="float:left">
                  <a href="..\..\vista\alineacion/insert.php" title="Agregar nuevo alineacion">
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
                  <table class="table" id="table1">
                    <thead class=" text-primary">
                      <th>
                        Jugador
                      </th>
                      <th>
                        Partido
                      </th>
                      <th>
                        Posición
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                      <tr>
                        <td>
                          <?php echo $row['id_jugador']; ?>
                        </td>
                        <td>
                          <?php echo $row['id_partido']; ?>
                        </td>
                        <td>
                          <?php echo $row['id_posicion']; ?>
                        </td>
                        <td class="td-actions text-lefht">
                            <div style="float:left">
                              <a href="..\..\vista\alineacion/update.php?id=<?php echo $row['id_alineacion']; ?>">
                                <button type="button" rel="tooltip" title="Editar alineacion" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="..\..\vista\alineacion/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_alineacion']; ?>">
                                <button type="submit" rel="tooltip" title="Eliminar alineacion" class="btn btn-danger btn-link btn-sm">
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
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
    <script type="text/javascript">
    $(document).ready(function(){
$('#table1').DataTable({
   dom: 'Bfrtip',
   buttons: [
     {
       extend:'copy',
       title:'Listado de Alineacion',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     },
     {
       extend:'csv',
       title:'Listado de Alineacion',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     },
     {
       extend:'excel',
       title:'Listado de Alineacion',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     },
     {
       extend:'pdf',
       title:'Listado de Alineacion',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     },
     {
       extend:'print',
       title:'Listado de Alineacion',
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

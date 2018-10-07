<?php
require_once('..\..\Negocio/ClassArbitro.php');
$arbitro=new Arbitro();
$data=$arbitro->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Arbitro - Listar</title>
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
              <div class="card-header card-header-danger row">
              <div class="col-md-11">
                  <h3 class="card-title">Árbitros</h3>
                  <p class="category">Listado de árbitros</p>
                </div>
                <div class="col-md-1 text-right">
                <a href="..\..\vista\arbitro/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar árbitro">
                    <i class="material-icons">add</i>
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
                      <!-- <th>
                        Tipo árbitro
                      </th> -->
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                      <tr>
                        <td>
                          <?php echo $row['id_arbitro']; ?>
                        </td>
                        <td>
                          <?php echo $row['nombre']; ?>
                        </td>

                        <td class="td-actions text-lefht">
                            <div style="float:left">
                              <a href="..\..\vista\arbitro/update.php?id=<?php echo $row['id_arbitro']; ?>">
                                <button type="button" rel="tooltip" title="Editar árbitro" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="..\..\vista\arbitro/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_arbitro']; ?>">
                                <button type="submit" rel="tooltip" title="Eliminar árbitro" class="btn btn-danger btn-link btn-sm">
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
       title:'Listado de arbitros',
       exportOptions:{
         columns:[0,1]
       }
     },
     {
       extend:'csv',
       title:'Listado de arbitros',
       exportOptions:{
         columns:[0,1]
       }
     },
     {
       extend:'excel',
       title:'Listado de arbitros',
       exportOptions:{
         columns:[0,1]
       }
     },
     {
       extend:'pdf',
       title:'Listado de arbitros',
       exportOptions:{
         columns:[0,1]
       }
     },
     {
       extend:'print',
       title:'Listado de arbitros',
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

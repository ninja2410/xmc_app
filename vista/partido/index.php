<?php
require_once('..\..\Negocio/ClassPartido.php');
$partido=new Partido();
$data=$partido->select(-1);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Partidos - Listar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '..\layoults\barnavLogged.php';
    ?>
    <div class="main main-raised">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <div class="card">
              <div class="card-header card-header-danger row">
                <div class="col-md-10">
                  <h3 class="card-title">Jugadores</h3>
                  <p class="category">Listado de jugadores.</p>
                </div>
                <div class="col-md-2 text-right">
                  <a href="..\..\vista\partido/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true">
                    <i class="material-icons">add</i>
                  </a>
                </div>
              </div>
                <div class="table-responsive">
                  <table class="table" id="table1">
                    <thead class=" text-primary">
                      <th>
                        ID
                      </th>
                      <th>
                        Fecha
                      </th>
                      <th>
                        Categoria
                      </th>
                      <th>
                        Estadio
                      </th>
                      <th>
                        Contrincante
                      </th>
                      <th>
                        Temporada
                      </th>
                      <th>
                        Observaciones
                      </th>
                      <th>
                        Alineación
                      </th>
                      <th>
                        Resultados
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
                          <?php echo $row['id_partido']; ?>
                        </td>
                        <td>
                          <?php echo $row['fecha']; ?>
                        </td>
                        <td>
                          <?php echo $row['categoria']; ?>
                        </td>
                        <td>
                          <?php echo $row['estadio']; ?>
                        </td>
                        <td>
                          <?php echo $row['equipo']; ?>
                        </td>
                        <td>
                          <?php echo $row['temporada']; ?>
                        </td>
                        <td>
                          <?php echo $row['observaciones']; ?>
                        </td>
                        <td>
                          <a href="..\..\vista\alineacion/alineacion.php?id=<?php echo $row['id_partido']; ?>">
                          <button class="btn btn-primary btn-round btn-sm">Alineacion</button>
                        </td>
                        <td>
                          <a href="..\..\vista\detalle_partido/index.php?id=<?php echo $row['id_partido']; ?>&id2=<?php echo $row['id_equipo']; ?>">
                          <button class="btn btn-primary btn-round btn-sm">Ver detalles</button>
                        </td>
                        <td class="td-actions text-lefht">
                            <div style="float:left">
                              <a href="..\..\vista\partido/update.php?id=<?php echo $row['id_partido']; ?>">
                                <button type="button" rel="tooltip" title="Editar partido" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="..\..\vista\partido/store.php" method="post">
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
           title:'Listado de partidos',
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         },
         {
           extend:'csv',
           title:'Listado de partidos',
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         },
         {
           extend:'excel',
           title:'Listado de partidos',
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         },
         {
           extend:'pdf',
           title:'Listado de partidos',
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         },
         {
           extend:'print',
           title:'Listado de partidos',
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
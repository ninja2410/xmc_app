<?php
require_once('../../Negocio/ClassDetallePartido.php');
$partido=new Detalle();
$data=$partido->selectResultados(-1);
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
    <div class="main main-raised">
    <div class="content">
          <div class="card col-md-12">
      <div class="container-fluid">
        
          
              <div class="card-header card-header-danger row">
                <div class="col-md-11">
                  <h3 class="card-title">Resultados de Xelajú MC por temporada</h3>
                  <p class="category">Resultados</p>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover" id="table1">
                    <thead class="table-primary">
                      <th>
                        Temporada
                      </th>
                      <th>
                        Faltas
                      </th>
                      <th>
                        Esquinas
                      </th>
                      <th>
                        Asistencias
                      </th>
                      <th>
                        Tiros
                      </th>
                      <th>
                        Tiros a puerta
                      </th>
                      <th>
                        Tarjetas amarillas
                      </th>
                      <th>
                        Tarjetas rojas
                      </th>
                      <th>
                        Fueras de juego
                      </th>
                      <th>
                        Cambios
                      </th>
                      <th>
                        Goles
                      </th>
                      <th>
                        Expulsiones
                      </th>
                      
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                      <tr>
                        <td >
                          <?php echo $row['descripcion']; ?>
                        </td>
                        <td>
                          <?php echo $row['faltas']; ?>
                        </td>
                        <td>
                          <?php echo $row['esquinas']; ?>
                        </td>
                        <td>
                          <?php echo $row['asistencias']; ?>
                        </td>
                        <td>
                          <?php echo $row['tiros']; ?>
                        </td>
                        <td>
                          <?php echo $row['tiros_puerta']; ?>
                        </td>
                        <td>
                          <?php echo $row['ta']; ?>
                        </td>
                        <td>
                          <?php echo $row['tr']; ?>
                        </td>
                        <td>
                          <?php echo $row['fj']; ?>
                        </td>
                        <td>
                          <?php echo $row['cam']; ?>
                        </td>
                        <td>
                          <?php echo $row['gol']; ?>
                        </td>
                        <td>
                          <?php echo $row['exp']; ?>
                        </td>
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

<?php
require_once('../../Negocio/ClassLesionJugador.php');
$lesion=new LesionJugador();
$data=$lesion->detalle();

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lesiones de jugador - Reporte</title>
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
                  <h3 class="card-title ">Lesiones</h3>
                  <p class="card-category">Listado de lesiones a jugadores</p>
                </div>
                <div class="col-md-1 text-right">
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table1">
                    <thead>
                      <th>
                        ID
                      </th>
                      <th>
                        Lesión
                      </th>
                      <th>
                        Jugador
                      </th>
                      <th>
                        Fecha inicio
                      </th>
                      <th>
                        Costo
                      </th>
                      <th>
                        Motivo
                      </th>
                      <th>
                        Observaciones
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                      <tr>
                        <td>
                          <?php echo $row['ID']; ?>
                        </td>
                        <td>
                          <?php echo $row['LESION']; ?>
                        </td>
                        <td>
                          <?php echo $row['JUGADOR']; ?>
                        </td>
                        <td>
                          <?php echo $row['FECHA']; ?>
                        </td>
                        <td>
                          Q<?php echo number_format($row['COSTO'], 2); ?>
                        </td>
                        <td>
                          <?php echo $row['MOTIVO']; ?>
                        </td>
                        <td>
                          <?php echo $row['observacion']; ?>
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
           title:'Listado de lesiones de jugadores',
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         },
         {
           extend:'csv',
           title:'Listado de lesiones de jugadores',
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         },
         {
           extend:'excel',
           title:'Listado de lesiones de jugadores',
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         },
         {
           extend:'pdf',
           title:'Listado de lesiones de jugadores',
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         },
         {
           extend:'print',
           title:'Listado de lesiones de jugadores',
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

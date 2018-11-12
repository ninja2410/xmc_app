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
    <div class="main main-raised">
    <div class="content">
            <div class="card col-md-12">
      <div class="container-fluid">

         
              <div class="card-header card-header-danger row">
                <div class="col-md-11">
                  <h3 class="card-title">Partidos</h3>
                  <p class="category">Listado de partidos</p>
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
                        Fecha
                      </th>
                      <th>
                        Categoría
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
                        Asignación
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {

                        $fecha_actual = strtotime(date("Y-m-d"));
                        $fecha_entrada = strtotime($row['fecha']);
                       ?>
                      <tr>
                        <td>
                          <?php echo $row['id_partido']; ?>
                        </td>
                        <td class="text-center">
                        <?php if($fecha_entrada>$fecha_actual)
                        {
                        ?>
                          <a>
                              <!-- <button class="btn btn-success btn-round btn-sm"><i class="fas fa-futbol fa-lg"> </i> </button> -->
                              <span class="badge badge-pill badge-success">Proximo </span>
                              <?php echo $row['fecha']?>
                          </a>
                        <?php
                        }
                        ?>
                          <?php if($fecha_entrada<$fecha_actual)
                        {
                        ?>
                          <a>
                          <!-- <button class="btn btn-danger btn-round btn-sm"><i class="fas fa-futbol fa-lg"> </i>  </button> -->
                          <span class="badge badge-pill badge-danger">Jugado </span>
                          <?php echo $row['fecha']?>
                          </a>
                        <?php
                        }
                        ?>
                        <?php if($fecha_entrada==$fecha_actual)
                        {
                        ?>
                          <a>
                          <!-- <button class="btn btn-danger btn-round btn-sm"><i class="fas fa-futbol fa-lg"> </i>  </button> -->
                          <span class="badge badge-pill badge-succes">HOY</span>
                          <?php echo $row['fecha']?>
                          </a>
                        <?php
                        }
                        ?>
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
                          <a href="../../vista/prensa/prensa.php?id=<?php echo $row['id_partido']; ?>">
                          <button class="btn btn-warning btn-round btn-sm"> <i class="far fa-eye fa-lg"></i> Prensa</button>
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
           title:'<img src="../assets/img/bg.jpg" style="top:0; left:0;" /> <br> <h3>Reporte de partidos</h3>',
           messageTop:'Club social y deportivo Xelaju Mc.',
           customize: function ( win ) {
            $(win.document.body)
                .css( 'font-size', '12pt' )
                .prepend(
                    '<img src="../assets/img/bg.jpg" style="top:0; left:0;" />'
                );
            },
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

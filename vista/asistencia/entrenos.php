<?php
require_once('../../Negocio/ClassEntrenamiento.php');
$detalle_entrenamiento=new Entrenamiento();
$dataAsis=$detalle_entrenamiento->selectAsistenciaTotal($_GET['id']);
$data = $detalle_entrenamiento->selectAsistenciaDetalle($_GET['id']);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Entrenos</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '../layoults/barnavLogged.php';
    ?>
    <div class="main main-raised">
    <br>
    <div class="container text-center">
        <h1>Entrenos <?php echo $dataAsis['Nombre']?></h1>
    </div>
    <br>
    <div class="container">
    <div class="row" >
        <div class="col-md-4">
            <div class="table-responsive ">
                <table class="table table-sm text-center" >
                    <tbody >
                        <tr >
                            <td>
                            <h4><b>Ejecutados </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $dataAsis['ejecutados']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><b>Permisos </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $dataAsis['permisos']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><b>Atrasos </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $dataAsis['atrasos']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><b>Retiros </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $dataAsis['retiros']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><b>Falta</b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $dataAsis['faltas']?></h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
            <br>
            <div class="col-md-8">
            <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table1">
                    <thead >
                      <th>
                        Fecha
                      </th>
                      <th>
                        Asistencia
                      </th>
                      <th>
                        Observacion/Motivo
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) 
                      {

                       ?>
                      <tr>
                        <td>
                          <?php echo $row['fecha']; ?>
                        </td>
                        <td>
                        <?php if($row['ejecutado']==1)
                        {
                        ?>
                          <a>
                              <!-- <button class="btn btn-success btn-round btn-sm"><i class="fas fa-futbol fa-lg"> </i> </button> -->
                              <span class="badge badge-pill badge-success">Ejecutado</span>
                          </a>
                        <?php
                        }
                        ?>
                        <?php 
                        if($row['permiso']==1)
                        {
                        ?>
                          <a>
                          <!-- <button class="btn btn-danger btn-round btn-sm"><i class="fas fa-futbol fa-lg"> </i>  </button> -->
                          <span class="badge badge-pill badge-warning">Permiso</span>
                          </a>
                        <?php
                        }
                        ?>
                        <?php 
                        if($row['atraso']==1)
                        {
                        ?>
                          <a>
                          <!-- <button class="btn btn-danger btn-round btn-sm"><i class="fas fa-futbol fa-lg"> </i>  </button> -->
                          <span class="badge badge-pill badge-warning">Atrasado</span>
                          </a>
                        <?php
                        }
                        ?>
                        <?php 
                        if($row['retiro']==1)
                        {
                        ?>
                          <a>
                          <!-- <button class="btn btn-danger btn-round btn-sm"><i class="fas fa-futbol fa-lg"> </i>  </button> -->
                          <span class="badge badge-pill badge-warning">Retiro</span>
                          </a>
                        <?php
                        }
                        ?>
                        <?php 
                        if($row['falta']==1)
                        {
                        ?>
                          <a>
                          <!-- <button class="btn btn-danger btn-round btn-sm"><i class="fas fa-futbol fa-lg"> </i>  </button> -->
                          <span class="badge badge-pill badge-danger">Falto</span>
                          </a>
                        <?php
                        }
                        ?>
                        </td>
                        <td>
                          <?php echo $row['motivo']; ?>
                        </td>
                        <?php
                        } 
                        ?>
                      </tr>
                    </tbody>
                  </table>
                  
                </div>
                <br>
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
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de entrenamientos',
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         },
         {
           extend:'csv',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de entrenamientos',
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         },
         {
           extend:'excel',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de entrenamientos',
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         },
         {
           extend:'pdf',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de entrenamientos',
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         },
         {
           extend:'print',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de entrenamientos',
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

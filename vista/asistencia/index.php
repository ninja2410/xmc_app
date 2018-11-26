<?php
require_once('../../Negocio/ClassEntrenamiento.php');
$entreno=new Entrenamiento();
$data=$entreno->selectAsistencia($_GET['id']);
$result = mysqli_num_rows($data);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Entrenos - Listar</title>
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
                  <h3 class="card-title ">Entrenamientos</h3>
                  <p class="card-category"> Asistencia</p>
                </div>
                <div class="col-md-1 text-right">
                <a href="../../vista/asistencia/jugadores.php?id= <?php echo $_GET['id']; ?>" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar entrenamiento">
                    <i class="material-icons">add</i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table1">
                    <thead >
                      <th>
                        Nombre
                      </th>
                      <th>
                        Asistencia
                      </th>
                      <th>
                        Observacion/Motivo
                      </th>
                      <th>
                        Multas
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) 
                      {

                       ?>
                      <tr>
                        <td>
                          <?php echo $row['Nombre']; ?>
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
                        <td>
                          <a href="../../vista/fallas/index.php?id=<?php echo $row['id_jugador']; ?>">
                          <button class="btn btn-danger btn-round btn-sm"> <i class="far fa-eye fa-lg"></i> multa</button>
                        </td>
                        <?php
                        } 
                        ?>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <a href="../../vista/fallas/index.php">
              <button class="btn btn-danger btn-round btn-sm"> <i class="far fa-eye fa-lg"></i> Multas</button></a>
              
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

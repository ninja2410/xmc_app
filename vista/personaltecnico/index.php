<?php
require_once('..\..\Negocio/ClassPersonalTecnico.php');
$personal=new PersonalTecnico();
$data=$personal->select(-1);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Personal Tecnico</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
  <?php include '..\layoults\barnavLogged.php'; ?>
  <input type="hidden" id="mensaje" name="secret" value="<?php if ($_SESSION['mensaje']!="") {
      echo $_SESSION['mensaje'];
      $_SESSION['mensaje']="";
    } ?>">
    <div class="main main-raised">
    <div class="content">
      <div class="container-fluid">
            <div class="card col-md-12">
              <div class="card-header card-header-danger row">
                <div class="col-md-11">
                  <h2 class="card-title ">Personal Técnico</h4>
                  <p class="card-category">Listado del personal</p>
                </div>
              </div>
              <div class="card-body col-md-12">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table1">
                    <thead>
                      <th>
                        Partido
                      </th>
                      <th>
                        Cargo
                      </th>
                      <th>
                        Nombre
                      </th>
                      <th>
                        Nombre
                      </th>

                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                      <tr>
                        <td>
                        <?php echo $row['fecha']; ?>
                        </td>
                        <td>
                          <?php echo $row['cargo']; ?>
                        </td>
                        <td>
                          <?php echo $row['nombre']; ?>
                        </td>
                        <td>
                          <a href="..\..\vista\detalle_partido/index.php?id=<?php echo $row['id_partido']; ?>&id2=<?php echo $row['id_equipo']; ?>">
                          <button class="btn btn-success btn-round btn-sm"> <i class="far fa-eye"></i> Ver detalles</button>
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
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
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
       title:'Listado de alineación',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     },
     {
       extend:'csv',
       title:'Listado de alineación',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     },
     {
       extend:'excel',
       title:'Listado de alineación',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     },
     {
       extend:'pdf',
       title:'Listado de alineación',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     },
     {
       extend:'print',
       title:'Listado de alineación',
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

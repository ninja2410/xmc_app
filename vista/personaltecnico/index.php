<?php
require_once('..\..\Negocio/ClassPersonalTecnico.php');
$personal=new PersonalTecnico();
$data=$personal->select($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Personal Tecnico - Xelaju </title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '..\layoults\barnav.php';
    ?>
    <div class="main main-raised">
        <div class="container">
            <div class="row" style="padding:20px">
                <div class="col-md-7">
                    <h3 class="title">Xelaju</h3>
                    <?php
                    while ($row=mysqli_fetch_array($data))
                    {
                    ?>
                    <h4><b><?php echo $row['cargo']?>: </b> <?php echo $row['nombre']?></h4>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-md-3">
                    <div>
                        <a href="..\..\vista\personaltecnico/update.php?id=<?php echo $_GET['id']?>">
                        <button class="btn btn-info btn-round"><i class="fas fa-notes-medical fa-lg"></i>Modificar resultados</button>
                    </div>
                    <div>
                        <a href="..\..\vista\partido/index.php">
                        <button class="btn btn-default btn-round"><i class="fas fa-undo-alt fa-lg"></i> Regresar</button>
                    </div>
<<<<<<< HEAD
=======
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="table1">
                    <thead class=" text-primary">
                      <th>
                        ID
                      </th>
                      <th>
                        Descripcion
                      </th>
                      <th>
                        Fecha de inicio
                      </th>
                      <th>
                        Fecha que finaliza
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                      <tr>
                        <td>
                          <?php echo $row['id_temporada']; ?>
                        </td>
                        <td>
                          <?php echo $row['descripcion']; ?>
                        </td>
                        <td>
                          <?php echo $row['fecha_inicio']; ?>
                        </td>
                        <td>
                          <?php echo $row['fecha_final']; ?>
                        </td>
                        <td class="td-actions text-lefht">
                            <div style="float:left">
                              <a href="..\..\vista\temporada/update.php?id=<?php echo $row['id_temporada']; ?>">
                                <button type="button" rel="tooltip" title="Editar temporada" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="..\..\vista\temporada/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_temporada']; ?>">
                                <button type="submit" rel="tooltip" title="Eliminar temporada" class="btn btn-danger btn-link btn-sm">
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
>>>>>>> aa35c89b15a7f855162516669cd69703f418455a
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
           title:'Listado de personal tecnico',
           exportOptions:{
             columns:[0,1,2,3]
           }
         },
         {
           extend:'csv',
           title:'Listado de personal tecnico',
           exportOptions:{
             columns:[0,1,2,3]
           }
         },
         {
           extend:'excel',
           title:'Listado de personal tecnico',
           exportOptions:{
             columns:[0,1,2,3]
           }
         },
         {
           extend:'pdf',
           title:'Listado de personal tecnico',
           exportOptions:{
             columns:[0,1,2,3]
           }
         },
         {
           extend:'print',
           title:'Listado de personal tecnico',
           exportOptions:{
             columns:[0,1,2,3]
           }
         }
       ],
   }) ;
});
    </script>
  </body>
</html>

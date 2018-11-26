<?php
require_once('../../Negocio/ClassNoticias.php');
$noticia=new Noticia();
$data=$noticia->select(-1);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Noticias - Listar</title>
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
        <div class="card">
        <div class="container-fluid">
            <div class="col-md-12">
            
              <div class="card-header card-header-danger row">
                <div class="col-md-10">
                  <h3 class="card-title">Noticias</h3>
                  <p class="category">Listado de noticias publicadas</p>
                </div>
                <div class="col-md-2 text-right">
                    <a href="../../vista/noticia/insertNoticia.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar noticia">
                    <i class="material-icons">add</i>
                  </a>
                </div>
              </div>
              <div class="card-body text-center table-responsive">
                <table class="table table-striped table-bordered" id="table1">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Titulo</th>
                      <th>Fecha</th>
                      <th>Ver noticia</th>
                      <th>Editar</th>
                      <th>Desactivar</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      while ($row=mysqli_fetch_array($data)) {
                      ?>
                      <tr>
                        <td>
                          <?php echo $row['id_noticia']; ?>
                        </td>
                        <td>
                          <?php echo $row['titulo'];?>
                        </td>
                        <td>
                          <?php echo $row['fecha'];?>
                        </td>
                        <td>
                          <a href="../../vernoticia.php?id=<?php echo $row['id_noticia']; ?>">
                          <button class="btn btn-success btn-round btn-sm"><i class="far fa-eye fa-lg"></i> Ver noticia</button>
                        </td>
                        <td>
                          <a href="../../vista/noticia/updateNoticia.php?id=<?php echo $row['id_noticia']; ?>">
                          <button class="btn btn-info btn-round btn-sm"><i class="far fa-edit fa-lg"></i> Editar noticia</button>
                        </td>
                        <td>
                          <form class="" action="../../vista/noticia/store.php" method="post">
                              <input type="hidden" name="operation" value="3">
                              <input type="hidden" name="id" value="<?php echo $row['id_noticia']; ?>">
                              
                              <!-- Inicio de modal -->
                            <button type="button" data-toggle="modal" data-target="<?php echo '#Confirmacion'.$row['id_noticia']; ?>"  class="btn btn-danger btn-round btn-sm">
                            <i class="material-icons">delete</i> Desactivar</button>
                              </button>
                              <!-- Modal -->
                              <div class="modal fade" id="<?php echo 'Confirmacion'.$row['id_noticia']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="false">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                                    </div>
                                    <div class="modal-body">
                                    ¿Está seguro que desea desactivar esta noticia?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                      <button type="submit" class="btn btn-primary">Eliminar</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!--  -->
                          </form>  
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
      "order": [[ 0, "desc" ]],
      dom: 'Bfrtip',
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
    },
    
      buttons: [
        {
          extend:'copy',
          title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de jugadores',
          exportOptions:{
            columns:[0,1,2]
          }
        },
        {
          extend:'csv',
          title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de jugadores',
          exportOptions:{
            columns:[0,1,2]
          }
        },
        {
          extend:'excel',
          title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de jugadores',
          exportOptions:{
            columns:[0,1,2]
          }
        },
        {
          extend:'pdf',
          title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de jugadores',
          exportOptions:{
            columns:[0,1,2]
          }
        },
        {
          extend:'print',
          title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de jugadores',
          exportOptions:{
            columns:[0,1,2]
          }
        }
      ],
    }) ;
    });
    </script>
  </body>
</html>

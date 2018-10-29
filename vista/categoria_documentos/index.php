<?php
require_once('..\..\Negocio/ClassCategoriaDocumentos.php');
$cat_documentos=new CatDocumentos();
$data=$cat_documentos->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Categoría documentos - Listar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body>
    <?php
    include '..\layoults\barnavLogged.php';
    ?>
    <div class="content">
      <input type="hidden" id="mensaje" name="secret" value="<?php if ($_SESSION['mensaje']!="") {
      echo $_SESSION['mensaje'];
      $_SESSION['mensaje']="";
    } ?>">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-danger">
                  <h4 class="card-title">Categoría de los documentos</h4>
                  <p class="category">Listado de las categorías de los documentos</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        while ($row=mysqli_fetch_array($data)) {
                        ?>
                        <tr>
                          <td>
                            <?php echo $row['id_categoria_documentos']; ?>
                          </td>
                          <td>
                            <?php echo $row['nombre']; ?>
                          </td>

                          <td class="td-actions text-lefht">
                              <div style="float:left">
                                <a href="..\..\vista\categoria_documentos/insert.php">
                                  <button type="button" rel="tooltip" title="Nueva parte" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">add</i>
                                  </button>
                                </a>
                              </div>
                              <div style="float:left">
                                <a href="..\..\vista\categoria_documentos/update.php?id=<?php echo $row['id_categoria_documentos']; ?>">
                                  <button type="button" rel="tooltip" title="Editar parte" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button>
                                </a>
                              </div>
                              <div  style="float:left">
                                <form class="" action="..\..\vista\categoria_documentos/store.php" method="post">
                                  <input type="hidden" name="operation" value="3">
                                  <input type="hidden" name="id" value="<?php echo $row['id_categoria_documentos']; ?>">
                                  <button type="submit" rel="tooltip" title="Eliminar parte" class="btn btn-danger btn-link btn-sm">
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
        if ($('#mensaje').val()!="") {
        alertify.success($('#mensaje').val());
      }
      });
    </script>
  </body>
</html>

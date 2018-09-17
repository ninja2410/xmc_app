<?php
require_once('..\..\Negocio/ClassUsuario.php');
$usuario=new Usuario();
$data=$usuario->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Usuarios - Listar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body>
    <?php
    include '..\layoults\barnav.php';
    ?>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <div class="col-lg-10" style="float:left;">
                  <h2 class="card-title ">Usuarios</h4>
                  <p class="card-category"> Listado de Usuarios</p>
                </div>
                <div class="col-lg-1" style="float:left">
                  <a href="..\..\vista\usuario/insert.php" title="Agregar nuevo usuario">
                    <div class="card-header card-header-success card-header-icon" style="float:left">
                      <div class="card-icon">
                        <i class="material-icons">add</i>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        ID
                      </th>
                      <th>
                        Usuario
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                      <tr>
                        <td>
                          <?php echo $row['idusuario']; ?>
                        </td>
                        <td>
                          <?php echo $row['nombreusuario']; ?>
                        </td>
                        <td class="td-actions text-lefht">
                            <div style="float:left">
                              <a href="..\..\vista\usuario/update.php?id=<?php echo $row['idusuario']; ?>">
                                <button type="button" rel="tooltip" title="Editar Usuario" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="..\..\vista\usuario/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['idusuario']; ?>">
                                <button type="submit" rel="tooltip" title="Eliminar Usuario" class="btn btn-danger btn-link btn-sm">
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
  </body>
</html>

<?php
require_once('..\..\Negocio/ClassParteCuerpo.php');
$partecuerpo=new ParteCuerpo();
$data=$partecuerpo->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Partes del cuerpo - Listar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body>
    <?php
    include '..\layoults\barnavLogged.php';
    ?>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-danger">
                  <h4 class="card-title">Partes del cuerpo</h4>
                  <p class="category">Listado de partes del cuerpo.</p>
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
                            <?php echo $row['id_parte']; ?>
                          </td>
                          <td>
                            <?php echo $row['nombre']; ?>
                          </td>

                          <td class="td-actions text-lefht">
                              <div style="float:left">
                                <a href="..\..\vista\parte_cuerpo/insert.php">
                                  <button type="button" rel="tooltip" title="Nueva parte" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">add</i>
                                  </button>
                                </a>
                              </div>
                              <div style="float:left">
                                <a href="..\..\vista\parte_cuerpo/update.php?id=<?php echo $row['id_parte']; ?>">
                                  <button type="button" rel="tooltip" title="Editar parte" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button>
                                </a>
                              </div>
                              <div  style="float:left">
                                <form class="" action="..\..\vista\parte_cuerpo/store.php" method="post">
                                  <input type="hidden" name="operation" value="3">
                                  <input type="hidden" name="id" value="<?php echo $row['id_parte']; ?>">
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
  </body>
</html>

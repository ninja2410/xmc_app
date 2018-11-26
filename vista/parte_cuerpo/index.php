<?php
require_once('../../Negocio/ClassParteCuerpo.php');
$partecuerpo=new ParteCuerpo();
$data=$partecuerpo->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Partes del cuerpo - Listar</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '../layoults/barnavLogged.php';
    ?>
    <div class="main main-raised">
      <div class="content">
        <div class="card col-md-12">
          <div class="container-fluid">
              <div class="card-header card-header-danger row">
                <div class="col-md-10">
                  <h3 class="card-title">Detalles de ficha médica</h3>
                  <p class="category">Listado de examenes que se pueden incluir en ficha medica</p>
                </div>
                <div class="col-md-2 text-right">
                    <a href="../../vista/parte_cuerpo/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar detalle">
                    <i class="material-icons">add</i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
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
                            <?php echo utf8_encode($row['nombre']); ?>
                          </td>
                          <td class="td-actions text-lefht">
                              <div style="float:left">
                                <a href="../../vista/parte_cuerpo/update.php?id=<?php echo $row['id_parte']; ?>">
                                  <button type="button" rel="tooltip" title="Editar parte" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button>
                                </a>
                              </div>
                              <div  style="float:left">
                                <form class="" action="../../vista/parte_cuerpo/store.php" method="post">
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
    <?php include '../layoults/footer.php'; ?>
    <?php include '../layoults/scripts2.php'; ?>
  </body>
</html>

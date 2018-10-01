<?php
require_once('..\..\Negocio/ClassFichaMedica.php');
$fichamedica=new FichaMedica();
$data=$fichamedica->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Fichas Medicas - Listar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body>
    <?php
    include '..\layoults\barnav.php';
    ?>
    <div class="content main main-raised">
      <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-danger row">
                <div class="col-md-10">
                  <h3 class="card-title">Fichas medicas</h3>
                  <p class="category">Listado de fichas medicas de los jugadores.</p>
                </div>
                <div class="col-md-2 text-right">
                  <a href="..\..\vista\ficha_medica/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true">
                    <i class="material-icons">add</i>
                  </a>
                </div>
              </div>
              <div class="card-body text-center table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Jugador</th>
                        <th>Grasa</th>
                        <th>Peso</th>
                        <th>Talla</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        while ($row=mysqli_fetch_array($data)) {
                        ?>
                        <tr>
                          <td>
                            <?php echo $row['id_ficha']; ?>
                          </td>
                          <td>
                            <?php echo $row['fecha']; ?>
                          </td>
                          <td>
                            <?php echo $row['Nombre']; ?>
                          </td>
                          <td>
                            <?php echo $row['grasa']; ?>
                          </td>
                          <td>
                            <?php echo $row['peso']; ?>
                          </td>
                          <td>
                            <?php echo $row['talla']; ?>
                          </td>
                          <td class="td-actions text-lefht">
                              <div style="float:left">
                                <a href="..\..\vista\ficha_medica/update.php?id=<?php echo $row['id_ficha']; ?>">
                                  <button type="button" rel="tooltip" title="Editar Ficha" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button>
                                </a>
                              </div>
                              <div  style="float:left">
                                <form class="" action="..\..\vista\ficha_medica/store.php" method="post">
                                  <input type="hidden" name="operation" value="3">
                                  <input type="hidden" name="id" value="<?php echo $row['id_ficha']; ?>">
                                  <button type="submit" rel="tooltip" title="Eliminar Ficha" class="btn btn-danger btn-link btn-sm">
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
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
  </body>
</html>

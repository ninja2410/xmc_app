<?php
require_once('..\..\Negocio/ClassTemporada.php');
$temporada=new Temporada();
$data=$temporada->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Temporadas - Listar</title>
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
                  <h2 class="card-title ">Temporadas</h4>
                  <p class="card-category"> Listado de temporadas</p>
                </div>
                <div class="col-lg-1" style="float:left">
                  <a href="..\..\vista\temporada/insert.php" title="Agregar nuevo temporada">
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
                          <?php echo $row['idtemporada']; ?>
                        </td>
                        <td>
                          <?php echo $row['fecha_inicio']; ?>
                        </td>
                        <td>
                          <?php echo $row['fecha_final']; ?>
                        </td>
                        <td class="td-actions text-lefht">
                            <div style="float:left">
                              <a href="..\..\vista\temporada/update.php?id=<?php echo $row['idtemporada']; ?>">
                                <button type="button" rel="tooltip" title="Editar temporada" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="..\..\vista\temporada/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['idtemporada']; ?>">
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
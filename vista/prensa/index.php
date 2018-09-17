<?php
require_once('..\..\Negocio/ClassPrensa.php');
$prensa=new Prensa();
$data=$prensa->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Prensa - Listar</title>
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
                  <h2 class="card-title ">Prensa</h4>
                  <p class="card-category">Listado de Prensa</p>
                </div>
                <div class="col-lg-1" style="float:left">
                  <a href="..\..\vista\prensa/insert.php" title="Agregar prensa">
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
                        Nombre
                      </th>
                      <th>
                        Apellido
                      </th>
                      <th>
                        Teléfono
                      </th>
                      <th>
                        Empresa
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                      <tr>
                        <td>
                          <?php echo $row['idprensa']; ?>
                        </td>
                        <td>
                          <?php echo $row['nombre']; ?>
                        </td>
                        <td>
                          <?php echo $row['apellido']; ?>
                        </td>
                        <td>
                          <?php echo $row['telefono']; ?>
                        </td>
                        <td>
                          <?php echo $row['empresa']; ?>
                        </td>
                        <td class="td-actions text-lefht">
                            <div style="float:left">
                              <a href="..\..\vista\prensa/update.php?id=<?php echo $row['idprensa']; ?>">
                                <button type="button" rel="tooltip" title="Editar Prensa" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="..\..\vista\prensa/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['idprensa']; ?>">
                                <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm">
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

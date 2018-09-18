<?php
require_once('..\..\Negocio/ClassPartido.php');
$partido=new Partido();
$data=$partido->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Partidos - Listar</title>
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
                  <h2 class="card-title ">Partidos</h4>
                  <p class="card-category"> Listado de partidos</p>
                </div>
                <div class="col-lg-1" style="float:left">
                  <a href="..\..\vista\partido/insert.php" title="Agregar nuevo partido">
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
                        Fecha
                      </th>
                      <th>
                        Inicio 1
                      </th>
                      <th>
                        Categoria
                      </th>
                      <th>
                        Estadio
                      </th>
                      <th>
                        Goles a favor
                      </th>
                      <th>
                        Goles en contra
                      </th>
                      <th>
                        Equipo
                      </th>
                      <th>
                        Temporada
                      </th>
                      <th>
                        Inicio 2
                      </th>
                      <th>
                        Estado
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                      <tr>
                        <td>
                          <?php echo $row['idpartido']; ?>
                        </td>
                        <td>
                          <?php echo $row['fecha']; ?>
                        </td>
                        <td>
                          <?php echo $row['hora_inicio1']; ?>
                        </td>
                        <td>
                          <?php echo $row['idcategoria']; ?>
                        </td>
                        <td>
                          <?php echo $row['idestadio']; ?>
                        </td>
                        <td>
                          <?php echo $row['goles_favor']; ?>
                        </td>
                        <td>
                          <?php echo $row['goles_contra']; ?>
                        </td>
                        <td>
                          <?php echo $row['idequipo']; ?>
                        </td>
                        <td>
                          <?php echo $row['idtemporada']; ?>
                        </td>
                        <td>
                          <?php echo $row['hora_inicio2']; ?>
                        </td>
                        <td>
                          <?php echo $row['idestadopartido']; ?>
                        </td>
                        <td class="td-actions text-lefht">
                            <div style="float:left">
                              <a href="..\..\vista\partido/update.php?id=<?php echo $row['idpartido']; ?>">
                                <button type="button" rel="tooltip" title="Editar partido" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="..\..\vista\partido/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['idpartido']; ?>">
                                <button type="submit" rel="tooltip" title="Eliminar partido" class="btn btn-danger btn-link btn-sm">
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

<?php
require_once('..\..\Negocio/ClassEntrenador.php');
$entrenador=new Entrenador();
$data=$entrenador->select(-1);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Entrenador - Listar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '..\layoults\barnav.php';
    ?>
    <div class="main main-raised">
    <div class="content">
      <div class="container-fluid">

          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-danger row">
              <div class="col-md-11">
                  <h3 class="card-title">Entrenador</h3>
                  <p class="category">Listado de entrenadores</p>
                </div>
                <div class="col-md-1 text-right">
                <a href="..\..\vista\entrenador/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar entrenador">
                    <i class="material-icons">add</i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="table1">
                    <thead  >
                      <th>
                        ID
                      </th>
                      <th>
                        Nombre
                      </th>
                      <th>
                        Foto
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                      <tr>
                        <td>
                          <?php echo $row['id_entrenador']; ?>
                        </td>
                        <td>
                        <?php echo $row['nombre']." ".$row['apellido']; ?>
                        </td>
                        <td>
                        <?php
                         echo '<img style="height:40px;width:40px"  src="../imagenes/'.$row['foto'].'"  alt="Circle Image" class="img-raised rounded-circle img-fluid">';
                        ?>
                        </td>
                        <td class="td-actions text-left">
                            <div style="float:left">
                            <a href="..\..\vista\entrenador/detalle.php?id=<?php echo $row['id_entrenador']; ?>">
                          <button class="btn btn-success btn-round btn-sm"><i class="far fa-eye fa-lg"></i> Ver detalles</button>
                              <a href="..\..\vista\entrenador/update.php?id=<?php echo $row['id_entrenador']; ?>">
                                <button type="button" rel="tooltip" title="Editar Entrenador" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="..\..\vista\entrenador/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_entrenador']; ?>">
                                <button type="submit" rel="tooltip" title="Eliminar Entrenador" class="btn btn-danger btn-link btn-sm">
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

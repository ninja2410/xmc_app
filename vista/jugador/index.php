<?php
require_once('..\..\Negocio/ClassJugador.php');
$jugador=new Jugador();
$data=$jugador->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Jugadores - Listar</title>
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
              <div class="card-header card-header-danger">
                  <h4 class="card-title">Jugadores</h4>
                  <p class="category">Listado de jugadores.</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Fecha Nacimiento</th>
                        <th>Padre</th>
                        <th>Madre</th>
                        <th>Telefono</th>
                        <th>Procedencia</th>
                        <th>Foto</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        while ($row=mysqli_fetch_array($data)) {
                        ?>
                        <tr>
                          <td>
                            <?php echo $row['id_jugador']; ?>
                          </td>
                          <td>
                            <?php echo $row['nombre']." ".$row['apellido']; ?>
                          </td>
                          <td>
                            <?php echo $row['direccion']; ?>
                          </td>
                          <td>
                            <?php echo $row['fecha_nacimiento']; ?>
                          </td>
                          <td>
                            <?php echo $row['padre']; ?>
                          </td>
                          <td>
                            <?php echo $row['madre']; ?>
                          </td>
                          <td>
                            <?php echo $row['telefono']; ?>
                          </td>
                          <td>
                            <?php echo $row['procedencia']; ?>
                          </td>
                          <td>
                            <?php echo $row['foto']; ?>
                          </td>
                          <td class="td-actions text-lefht">
                              <div style="float:left">
                                <a href="..\..\vista\jugador/insert.php">
                                  <button type="button" rel="tooltip" title="Nueva Ficha" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">add</i>
                                  </button>
                                </a>
                              </div>
                              <div style="float:left">
                                <a href="..\..\vista\jugador/update.php?id=<?php echo $row['id_jugador']; ?>">
                                  <button type="button" rel="tooltip" title="Editar Ficha" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button>
                                </a>
                              </div>
                              <div  style="float:left">
                                <form class="" action="..\..\vista\jugador/store.php" method="post">
                                  <input type="hidden" name="operation" value="3">
                                  <input type="hidden" name="id" value="<?php echo $row['id_jugador']; ?>">
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
    </div>
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
  </body>
</html>

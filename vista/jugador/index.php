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
  <body class="profile-page sidebar-collapse">
    <?php
    include '..\layoults\barnav.php';
    ?>
    <div class="content">
      <div class="container">
      <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-danger row">
                <div class="col-md-11">
                  <h3 class="card-title">Jugadores</h3>
                  <p class="category">Listado de jugadores.</p>
                </div>
                <div class="col-md-1 text-right">
                  <a href="..\..\vista\jugador/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true">
                    <i class="material-icons">add</i>
                  </a>
                </div>
              </div>
              <div class="card-body text-center">
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
                          <?php echo $row['id_jugador']; ?>
                        </td>
                        <td>
                          <?php echo $row['nombre']." ".$row['apellido']; ?>
                        </td>
                        <td>
                          <a href="..\..\vista\jugador/detalle.php?id=<?php echo $row['id_jugador']; ?>">
                          <button class="btn btn-primary btn-round btn-sm">Ver detalles</button>
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

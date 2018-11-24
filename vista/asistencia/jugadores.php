<?php
require_once('../../Negocio/ClassJugador.php');
$jugador=new Jugador();
$data=$jugador->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Jugadores - Listar</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '../layoults/barnavLogged.php'; ?>
    <input type="hidden" id="mensaje" name="secret" value="<?php if ($_SESSION['mensaje']!="") {
      echo $_SESSION['mensaje'];
      $_SESSION['mensaje']="";
    } ?>">

    <div class="main main-raised">
      <div class="content">
            <div class="card">
        <div class="container-fluid">
          <div class="col-md-12">
              <div class="card-header card-header-danger row">
                <div class="col-md-10">
                  <h3 class="card-title">Jugadores</h3>
                  <p class="category">Listado de jugadores</p>
                </div>
                <div class="col-md-2 text-right">
                    <a href="../../vista/jugador/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar jugador">
                    <i class="material-icons">add</i>
                  </a>
                </div>
              </div>
              <div class="card-body text-center table-responsive">
                <table class="table table-striped table-bordered" id="table1">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      while ($row=mysqli_fetch_array($data)) {
                      ?>
                        <form  id="<?php echo "frm".$row['id_jugador']?>">
                        <input type="hidden" name="operation" value="5">
                        <input type="hidden" name="id" value="<?php echo $row['id_jugador']; ?>">
                      <tr>
                        <td>
                          <?php echo $row['Nombre'];?>
                        </td>
                        <td>
                          <div class="form-group">
                                  <input type="text" class="form-control text-center" name="fal2" value="<?php echo $row['id_jugador'];; ?>">
                          </div>
                        </td>
                        <td>
                          <div class="form-group">
                              <button onclick="enviarDatos(<?php echo 'frm'.$row['id_jugador']?>)" type="submit" class="btn btn-success pull-right btn-round"><i class="fas fa-check fa-lg"></i> Aceptar</button>

                          </div>
                        </td>
                      </tr>
                      </form>
                      <?php
                      } ?>
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
    <script type="text/javascript">
    $(document).ready(function(){
      
      function enviarDatos(id_formulario, id_modal){
      consle.log($("#"+id_formulario).serialize());
         }
});
    </script>
  </body>
</html>

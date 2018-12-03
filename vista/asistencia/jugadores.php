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
      <input type="hidden" id="mensaje" name="secret" value="Guardado">
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
                <table class="table table-striped table-bordered" >
                  <thead>
                    <tr>
                      <th>Jugador</th>
                      <th>Asistencia</th>
                      <th>Observacion/Motivo</th>
                      <th>Guardar</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      while ($row=mysqli_fetch_array($data)) {
                      ?>
                       
                        <input type="hidden" id="<?php echo "entreno_".$row['id_jugador']?>" value="<?php echo $_GET['id']; ?>">
                        <input type="hidden" name="operation" value="5">
                        <input type="hidden" id="<?php echo "jugador_".$row['id_jugador']?>" value="<?php echo $row['id_jugador']; ?>">
                      <tr>
                        <td>
                          <?php echo $row['Nombre'];?>
                        </td>
                        <td>
                          <div class="form-group">
                          <select  id="<?php echo "accion".$row['id_jugador']?>" class="form-control " name="temporada">
                            <option class="btn-success pull-right btn-round" value="1">Ejecutado</option>
                            <option class="btn-warning pull-right btn-round" value="2">Atrasado</option>
                            <option class="btn-warning pull-right btn-round" value="3">Permiso</option>
                            <option class="btn-danger pull-right btn-round" value="4">Falto</option>

                          </select>
                          </div>
                        </td>
                        <td>
                          <div class="form-group">
                                  <input type="text" placedhorder="Observaciones/Motivo"  class="form-control text-center "  id="<?php echo "motivo_".$row['id_jugador']?>">
                          </div>
                        </td>
                        <td>
                          <div class="form-group">
                              <button onclick="enviarDatos(<?php echo $row['id_jugador']?>)"  class="btn btn-success pull-right btn-round"><i class="fas fa-check fa-lg"></i></button>
                          </div>
                        </td>
                      </tr>
                      </form>
                      <?php
                        } 
                      ?>
                  </tbody>
                </table>
              </div>
              <a href="../../vista/fallas/insert.php?id=<?php echo $row['id_jugador']; ?>">
                          <button class="btn btn-danger pull-right  btn-round "> <i class="far fa-eye fa-lg"></i> Multar Jugador</button>
                <a href="../asistencia/index.php?id=<?php echo $_GET['id'] ?>"> <button type="button" class="btn btn-info pull-right btn-round"><i class="fas fa-undo-alt fa-lg"></i> Regresar</button></a>
            </div>
          </div>
        </div>
      </div> 
    </div>
    <?php include '../layoults/footer.php'; ?>
    <?php include '../layoults/scripts2.php'; ?>
    <script type="text/javascript">
      function enviarDatos(id)
      {
        var accion = document.getElementById('accion'+id).value;
        var id_jugador = document.getElementById('jugador_'+id).value;
        var id_entreno = document.getElementById('entreno_'+id).value;
        var motivo = document.getElementById('motivo_'+id).value;
       if(accion=='1')
       {
        var jug =[{id_entreno:id_entreno,id_jugador:id_jugador,Eje:1,Permiso:0,Atraso:0,Retiro:0, Falta:0, Motivo:motivo}] 
        console.log(jug);
       };
       if(accion=='2')
       {
        var jug =[{id_entreno:id_entreno,id_jugador:id_jugador,Eje:0,Permiso:0,Atraso:1,Retiro:0, Falta:0, Motivo:motivo}] 
        console.log(jug);
       };
       if(accion=='3')
       {
        var jug =[{id_entreno:id_entreno,id_jugador:id_jugador,Eje:0,Permiso:1,Atraso:0,Retiro:0, Falta:0, Motivo:motivo}] 
        console.log(jug);
       };
       if(accion=='4')
       {
        var jug =[{id_entreno:id_entreno,id_jugador:id_jugador,Eje:0,Permiso:0,Atraso:0,Retiro:0, Falta:1, Motivo:motivo}] 
        console.log(jug);
       };
        var url = "store.php";
        $.ajax({
           type: "POST",
           url: url,
           dataType: "json",
           data: {"jugador":jug},
           success: function(data)
           {             
             console.log(data);
             <?php $_SESSION['mensaje']="Guardado" ; ?>
             alertify.success($('#mensaje').val());

           },
           error: function(data) {
            console.log(data);
            }
      });
   
        
      }
    </script>
  </body>
</html>

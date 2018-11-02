<?php
require_once('../../Negocio/ClassEstadisticaJugador.php');
$estadistoca=new EstadisticaJugador();
$data=$estadistoca->selectCampos();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Estadísticas - Insertar</title>
    <?php include '../layoults/headers2.php'; ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  </head>
  <body class="profile-page sidebar-collapse">
    <script type="text/javascript">
      $(function(){
        $( "#autojugador" ).autocomplete(
        {
          source: 'searchJugador.php',
          minLength: 0,
          select: function(event, ui)
          {
            $("#jugador").val(ui.item.id);
          },
        }).focus(function () {
            $(this).autocomplete('search', $(this).val())
          });

          $( "#autoPartido" ).autocomplete({
            source: 'searchPartido.php',
            minLength: 0,
            select: function(event, ui) {
              $("#partido").val(ui.item.id);
          },
          }).focus(function () {
              $(this).autocomplete('search', $(this).val())
            });
      });
    </script>
    <?php include '../layoults/barnavLogged.php'; ?>
    <div class="main main-raised">
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h3 class="card-title">Insertar estadísticas de jugador</h3>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="../EstadisticaJugador/store.php" id="frm_estadisticas">
              <input type="hidden" name="operation" value="1">
              <input type="hidden" name="estadisticas" id="estadisticas">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Jugador</label>
                    <input type="hidden" id="jugador" name="jugador">
                    <input type="text" id="autojugador" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Partido</label>
                    <input type="hidden" name="partido" id="partido" >
                    <input type="text" id="autoPartido" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <label for="campo">Seleccione el dato a agregar</label>
                  <select class="form-control" name="campo" id="campo">
                    <?php foreach ($data as $key => $value): ?>
                      <option value="<?php echo $value['id_dato_partido']; ?>" class="dropdown-item"><?php echo $value['nombre']; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Minuto</label>
                    <input name="minuto" id="minuto" type="number" class="form-control" >
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Cantidad</label>
                    <input name="number" type="number" class="form-control" id="cantidad">
                  </div>
                </div>
                <div class="col-lg-1">
                  <button class="btn btn-success btn-fab btn-round" id="add" onclick="registrarValor()" type="button" data-toggle="tooltip" data-original-title="Agregar estadística">
                    <i class="material-icons">add</i>
                    <div class="ripple-container"></div>
                  </button>
                </div>
              </div>

              <div class="clearfix"></div>
              <div class="row">
                <div class="table-responsive">
                  <table class="table" id="agregados">
                    <thead class=" text-muted">
                      <th>
                        Acción
                      </th>
                      <th>
                        Minuto
                      </th>
                      <th>
                        Cantidad
                      </th>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <?php include '../layoults/botones.php'; ?>
            </form>

          </div>
        </div>
      </div>
    </div>
    </div>
    <?php include '../layoults/footer.php'; ?>
    <?php include '../layoults/scripts2.php'; ?>
    <script type="text/javascript">
    var datos=[];
      function registrarValor(){
        var campo=document.getElementById('campo');
        var cantidad=document.getElementById('cantidad');
        var minuto=document.getElementById('minuto');
        var tabla=document.getElementById('agregados');
        var selected = campo.options[campo.selectedIndex].text;
        datos.push({"campo": campo.value, "valor":cantidad.value, "minuto":minuto.value});
        $('#estadisticas').val(JSON.stringify(datos));
        var row=tabla.insertRow(1);
        var cel=row.insertCell(0);
        var cel2=row.insertCell(1);
        var cel3=row.insertCell(2);
        var tmp=document.createTextNode(selected);
        cel.appendChild(tmp);
        tmp=document.createTextNode(minuto.value);
        cel2.appendChild(tmp);
        tmp=document.createTextNode(cantidad.value);
        cel3.appendChild(tmp);
        cantidad.value='';
        minuto.value='';
      }
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#frm_lesion').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        message: 'Valor no valido',
        fields: {
            name:{
                validators:{
                    notEmpty:{
                        message:'Ingrese un nombre de lesión'
                    },
                    regexp:{
                      regexp: /^[a-zA-Z\s]*$/,
                        message: 'Solo se aceptan letras'
                    }
                }
            },
        }
    })
      });
    </script>
  </body>
</html>

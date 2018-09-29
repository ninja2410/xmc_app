<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alineacion - Insertar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  
  <body class="profile-page sidebar-collapse">
  <script type="text/javascript">
  $(function() 
  {
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
    <?php include '..\layoults\barnav.php'; ?>
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">INGRESAR UN NUEVO ALINEACION</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\alineacion\store.php" id="frm_alineacion">
              <input type="hidden" name="operation" value="1">
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
                    <label class="">Minuto de inicio</label>
                    <input type="time" name="mi" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Minuto final</label>
                    <input type="time" name="mf"  class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Partido</label>
                    <input type="hidden" name="partido" id="partido" >
                    <input type="text" id="autoPartido" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="">Goles</label>
                    <input type="text" class="form-control" name="g">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label  id="show" class="">Pases</label>
                    <input type="text" class="form-control" name="pas">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="">Tarjetas amarillas</label>
                    <input type="text" name="ta" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label  id="show" class="">Tarjetas rojas</label>
                    <input type="text" class="form-control" name="tr">
                  </div>
                </div>
              </div>
              <?php include '..\layoults\botones.php'; ?>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
    <script type="text/javascript">
      var f = new Date();
$(document).ready(function() {
    $('#frm_alineacion').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
          fecha: 
          {
                validators: 
                {
                    notEmpty: 
                    {
                      message: 'La fecha del alineacion es necesario'
                    },
                    date: 
                    {
                        message: 'El formato de la fecha no es valida',
                        format: 'YYYY/MM/DD'
                    },
                    callback: 
                    {
                        message: 'La fecha debe ser despues de la fecha actual',
                        callback: function(value, validator) {
                            var m = new moment(value, 'YYYY/MM/DD', true);
                            fi = m;
                            if (!m.isValid()) {
                                return false;
                            }
                            return m.isAfter(f);
                        }
                    }
                }
          },
          h1: 
          {
                validators: 
                {
                    notEmpty: 
                    {
                      message: 'Debe ingresar una hora valida'
                    }
            
                }
          },
          autoestadio: 
          {
                validators: 
                {
                    notEmpty: 
                    {
                      message: 'Debe seleccionar un estadio'
                    }
            
                }
          },
          autoCategoria: 
          {
                validators: 
                {
                    notEmpty: 
                    {
                      message: 'debe selecionar una categoria'
                    }
            
                }
          },
        }
    });
});


    </script>
  </body>
</html>

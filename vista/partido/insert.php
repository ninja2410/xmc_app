<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Partido - Insertar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  
  <body>
  <script type="text/javascript">
$(function() {
    $( "#buscador" ).autocomplete({
      source: 'searchEquipo.php',
      minLength: 0,
      select: function(event, ui) { 
        $("#buscador").val(ui.item.id);
    },
    }).focus(function () {
        $(this).autocomplete('search', $(this).val())
      });
  });
  </script>
    <?php include '..\layoults\barnav.php'; ?>
    <div class="content">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">INGRESAR UN NUEVO PARTIDO</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\partido\store.php" id="frm_partido">
              <input type="hidden" name="operation" value="1">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Fecha</label>
                    <input type="text" placeholder="DD/MM/YYYY" class="form-control" name="fecha">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Hora 1</label>
                    <input type="time" class="form-control" name="pass">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Hora 2</label>
                    <input type="time" class="form-control" name="pass">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Equipo</label>
                    <input type="text" id="buscador" class="form-control" name="partido">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Goles a favor</label>
                    <input type="text" class="form-control" name="pass">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label  id="show" class="">Goles en contra</label>
                    <input type="text" class="form-control" name="pass">
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
  $( "#show" ).text('prueba');
    $('#frm_partido').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            fecha: {
                validators: 
                {
                    notEmpty: 
                    {
                      message: 'La fecha del partido es necesario'
                    },
                    date: 
                    {
                        message: 'El formato de la fecha no es valida',
                        format: 'DD/MM/YYYY'
                    },
                    callback: 
                    {
                        message: 'La fecha debe ser despues de la fecha actual',
                        callback: function(value, validator) {
                            var m = new moment(value, 'DD/MM/YYYY', true);
                            if (!m.isValid()) {
                                return false;
                            }
                            return m.isAfter(f);
                        }
                    }
                }
            }
        }
    });
});


    </script>
  </body>
</html>

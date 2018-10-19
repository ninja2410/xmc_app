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
  <body class="profile-page sidebar-collapse">
  <?php include '..\layoults\barnav.php'; ?>
    <div class="main main-raised">
  <script type="text/javascript">
  $(function()
  {
    $( "#autoequipo" ).autocomplete(
    {
      source: 'searchEquipo.php',
      minLength: 2,
      autoFocus:true,
      select: function(event, ui)
      {
        $("#equi").val(ui.item.id);
        $("#autoequipo").val(ui.item.value);
        
      },
    });

      $( "#autoCategoria" ).autocomplete(
    {
      source: 'searchCategoria.php',
      minLength: 0,
      select: function(event, ui)
      {
        $("#autoCategoria").val(ui.item.value);
        $("#cat").val(ui.item.id);
      },
    }).focus(function () {
        $(this).autocomplete('search', $(this).val())
      });

    $( "#autoestadio" ).autocomplete({
      source: 'searchEstadio.php',
      minLength: 0,
      select: function(event, ui) {
        $("#estadio").val(ui.item.id);
    },
    }).focus(function ()
    {
        $(this).autocomplete('search', $(this).val())
    });

    $( "#autotemp" ).autocomplete({
      source: 'searchTemporada.php',
      minLength: 0,
      select: function(event, ui) {
        $("#temp").val(ui.item.id);
    },
    }).focus(function () {
        $(this).autocomplete('search', $(this).val())
      });
  });
  </script>
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">INGRESAR UN NUEVO PARTIDO</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\partido\store.php" id="frm_partido">
              <input type="hidden" name="operation" value="1">
              <input type="hidden" name="validator" id="validator" value="No hay resultado">
              <div class="row">
               <div class="col-md-3">
                  <div class="form-group">
                    <label class="">Equipo</label>
                    <input type="hidden" id="equi" name="equi">
                    <input type="text" id="autoequipo" name="autoequipo" class="form-control"  data-equals="foo" riquired>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="">Fecha</label>
                    <input type="text" placeholder="DD/MM/YYYY" class="form-control" name="fecha">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="">Hora</label>
                    <input type="text" placeholder="" class="form-control datetimepicker" id='datetimepicker3' name="hora">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="">Categoria</label>
                    <input type="hidden" name="cat" id="cat" >
                    <input type="text" name="autoCategoria"  class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Estadio</label>
                    <input type="hidden" name="estadio" id="estadio" >
                    <input type="text" id="autoestadio" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Temporada</label>
                    <input type="hidden" id="temp" name="temp">
                    <input type="text" id="autotemp" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="">Observaciones</label>
                    <input  id="obs" type="textarea" class="form-control" name="obs">
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
    </div>
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
    <script type="text/javascript">
      var f = new Date();

$(document).ready(function() {
          $('#frm_partido').bootstrapValidator({
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
                      message: 'La fecha del partido es necesario'
                    },
                    date:
                    {
                        message: 'El formato de la fecha no es valida',
                        format: 'YYYY/MM/DD'
                    }
                }
          },
          autoequipo:
          {
                validators:
                {
                  notEmpty: {
                        message: 'The email address is required and can\'t be empty'
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
      <!-- javascript for init -->
      $('.datetimepicker').datetimepicker({
          format:'LT',
          icons: {
              time: "fa fa-clock-o",
              date: "fa fa-calendar",
              up: "fa fa-chevron-up",
              down: "fa fa-chevron-down",
              previous: 'fa fa-chevron-left',
              next: 'fa fa-chevron-right',
              today: 'fa fa-screenshot',
              clear: 'fa fa-trash',
              close: 'fa fa-remove'
          }
      });

    </script>
  </body>
</html>
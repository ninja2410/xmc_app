<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lesion - Insertar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <body class="profile-page sidebar-collapse">
  <script type="text/javascript">


  $(function()
  {
    $( "#lesion" ).autocomplete(
    {
      source: 'searchLesion.php',
      minLength: 0,
      select: function(event, ui)
      {
        $("#les").val(ui.item.id);
      },
    }).focus(function () {
        $(this).autocomplete('search', $(this).val())
      });

      $( "#medico" ).autocomplete(
      {
        source: 'searchMedico.php',
        minLength: 0,
        select: function(event, ui)
        {
          $("#med").val(ui.item.id);
        },
      }).focus(function () {
          $(this).autocomplete('search', $(this).val())
        });

      $( "#jugador" ).autocomplete(
      {
        source: 'searchJugador.php',
        minLength: 0,
        select: function(event, ui)
        {
          $("#jug").val(ui.item.id);
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
            <h4 class="card-title">INGRESAR LESION DE JUGADOR</h4>
            <p class="card-category">Registro de lesión por jugador. </p>
          </div>
          <div class="card-body">
            <form method="post", action="..\lesion-jugador\store.php" id="frm_lesion">
              <input type="hidden" name="operation" value="1">
              <input type="hidden" name="cantidades" value="" id="cantidades">
              <input type="hidden" name="medicamentos" value="" id="medicamentos">
              <input type="hidden" name="prescripciones" value="" id="prescripciones">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Fecha Inicio</label>
                    <input type="date" placeholder="DD/MM/YYYY" class="form-control" name="fecha_inicio">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Fecha Recuperación</label>
                    <input type="date" placeholder="DD/MM/YYYY" class="form-control" name="fecha_recuperacion">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Lesion</label>
                    <input type="hidden" name="les" id="les" >
                    <input type="text" id="lesion" name="lesion"  class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="">Medico</label>
                    <input type="hidden" name="med" id="med" >
                    <input type="text" name="medico" id="medico" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="">Jugador</label>
                    <input type="hidden" name="jug" id="jug" >
                    <input type="text" name="jugador" id="jugador" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Motivo</label>
                    <input type="text" class="form-control" name="mot">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label class="">Observaciones</label>
                    <input type="text" class="form-control" name="obs">
                  </div>
                </div>
              </div>
              <hr>
              <h3>Agregar tratamiento</h3>
                <div class="row">
                  <div class="col-md-1">
                    <div class="form-group">
                      <label class="">Cantidad</label>
                      <input type="text" class="form-control" name="cantidad" id="cantidad">
                    </div>
                  </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <label class="">Medicamento</label>
                        <input type="text" class="form-control" name="medicamento" id="medicamento">
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <label class="">Pescripción</label>
                        <input type="text" class="form-control" name="prescripcion" id="prescripcion">
                      </div>
                    </div>
                    <div class="col-md-1">
                      <button class="btn btn-success btn-fab btn-round" id="add" type="button" data-toggle="tooltip" data-original-title="Agregar tratamiento">
                        <i class="material-icons">add</i>
                        <div class="ripple-container"></div>
                      </button>
                    </div>
                </div>
              <div class="row">
                <h3>Tratamiento agregado. </h3>
              </div>
              <div class="row">
                <div class="table-responsive">
                  <table class="table" id="agregados">
                    <thead class=" text-muted">
                      <th>
                        CANTIDAD
                      </th>
                      <th>
                        MEDICAMENTO
                      </th>
                      <th>
                        PRESCRIPCION
                      </th>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
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
  var cantidades=[];
  var medicamentos=[];
  var prescripciones=[];
  var orden=0;
$('#add').click(function(){
  var cant=document.getElementById('cantidad').value;
  var med=document.getElementById('medicamento').value;
  var pres=document.getElementById('prescripcion').value;
  if (cant!="" && med!="" && pres!="") {
    var tabla=document.getElementById('agregados');
    cantidades.push(cant);
    medicamentos.push(med);
    prescripciones.push(pres);
    var row=tabla.insertRow(1);
    var cel=row.insertCell(0);
    var cel2=row.insertCell(1);
    var cel3=row.insertCell(2);
    var cel4=row.insertCell(3);
    var button = '<input type="submit" id="'+orden+'" name="Numero Parrafos"/>';
    var tmp=document.createTextNode(cant);
    cel.appendChild(tmp);
    tmp=document.createTextNode(med);
    cel2.appendChild(tmp);
    tmp=document.createTextNode(pres);
    cel3.appendChild(tmp);
    document.getElementById('cantidad').value='';
    document.getElementById('medicamento').value='';
    document.getElementById('prescripcion').value='';
    document.getElementById('cantidades').value=cantidades;
    document.getElementById('medicamentos').value=medicamentos;
    document.getElementById('prescripciones').value=prescripciones;
  }
  else{
    alert('Debe llenar todos los campos.')
  }

});
//VALIDACIONES
  $('#frm_tratamiento').bootstrapValidator({
      feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        cantidad:
        {
          notEmpty:{
            message:'Debe ingresar una cantidad de medicamento válido.'
          }
        },
        medicamento:{
          notEmpty:{
            message:'Debe ingresar un nombre de medicamento'
          }
        },
        prescripcion:{
          notEmpty:{
            message:'Debe ingresar prescripción del medicamento.'
          }
        }
      }
    });

    $('#frm_lesion').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
          fecha_inicio:
          {
                validators:
                {
                    notEmpty:
                    {
                      message: 'La fecha de la lesión'
                    },
                    date:
                    {
                        message: 'El formato de la fecha no es valida',
                        format: 'YYYY/MM/DD'
                    }
                    //
                    // callback:
                    // {
                    //     message: 'La fecha debe ser despues de la fecha actual',
                    //     callback: function(value, validator) {
                    //         var m = new moment(value, 'YYYY/MM/DD', true);
                    //         fi = m;
                    //         if (!m.isValid()) {
                    //             return false;
                    //         }
                    //         return m.isAfter(f);
                    //     }
                    // }
                }
          },
          lesion:
          {
                validators:
                {
                    notEmpty:
                    {
                      message: 'Debe seleccionar una lesion'
                    }

                }
          },
          medico:
          {
                validators:
                {
                    notEmpty:
                    {
                      message: 'debe selecionar un médico.'
                    }

                }
          },
          jugador:
          {
                validators:
                {
                    notEmpty:
                    {
                      message: 'debe selecionar un jugador.'
                    }

                }
          },
          mot:
          {
                validators:
                {
                    notEmpty:
                    {
                      message: 'Debe escribir motivo de la lesión.'
                    }

                }
          }
        }
    });
});


    </script>
  </body>
</html>

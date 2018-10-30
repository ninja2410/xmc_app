<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lesión - Insertar</title>
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
    <?php include '..\layoults\barnavLogged.php'; ?>
    <div class="main main-raised">
    <div class="content">
      
        <div class="card col-md-12">
          <div class="card-header card-header-danger">
            <h3 class="card-title">Ingresar lesión del jugador</h3>
            <p class="card-category">Registro de lesión por jugador</p>
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
                    <input type="text" placeholder="DD/MM/YYYY" id="f_inicio" class="form-control datetimepicker" name="fecha_inicio">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Fecha de recuperación</label>
                    <input type="text" id="f_final" placeholder="DD/MM/YYYY" class="form-control datetimepicker" name="fecha_recuperacion">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Lesión</label>
                    <input type="hidden" name="les" id="les" >
                    <input type="text" id="lesion" name="lesion"  class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Médico</label>
                    <input type="hidden" name="med" id="med" >
                    <input type="text" name="medico" id="medico" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Jugador</label>
                    <input type="hidden" name="jug" id="jug" >
                    <input type="text" name="jugador" id="jugador" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Costo</label>
                    <input type="number" step="0.01" name="costo" class="form-control">
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
              <form class="" id="frm_tratamiento" method="post">
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
                        <label class="">Descripción</label>
                        <input type="text" class="form-control" name="prescripcion" id="prescripcion">
                      </div>
                    </div>
                    <div class="col-md-1">
                      <button class="btn btn-success btn-fab btn-round" id="add" type="button" data-toggle="tooltip" data-original-title="Agregar tratamiento">
                        <i class="material-icons">add</i>
                        <div class="ripple-container"></div>
                      </button>
                    </div>
                  </form>
                </div>
              <div class="row">
                <h3>Tratamiento agregado </h3>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="table-responsive">
                    <table class="table" id="agregados">
                      <thead class=" text-muted">
                        <th>
                          Cantidad
                        </th>
                        <th>
                          Medicamento
                        </th>
                        <th>
                          Prescripción
                        </th>
                        <th>
                          Acción
                        </th>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
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
      function eliminar(control){
        var index=ordenes.indexOf(parseInt(control.id));
        cantidades.splice(index,1);
        medicamentos.splice(index, 1);
        prescripciones.splice(index,1);
        ordenes.splice(index, 1);
        control.closest('tr').remove();
      }
      $('.datetimepicker').datetimepicker({
          format:'DD/MM/YYYY',
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
var orden=0;
var cantidades=[];
var medicamentos=[];
var prescripciones=[];
var ordenes=[];
$(document).ready(function() {
$('#add').click(function(){
  var cant=document.getElementById('cantidad').value;
  var med=document.getElementById('medicamento').value;
  var pres=document.getElementById('prescripcion').value;
  if (cant!="" && med!="" && pres!="") {
    cantidades.push(cant);
    medicamentos.push(med);
    prescripciones.push(pres);
    ordenes.push(orden);
    var tabla=document.getElementById('agregados');
    var row=tabla.insertRow(1);
    row.setAttribute("id", "r"+orden);
    var cel=row.insertCell(0);
    var cel2=row.insertCell(1);
    var cel3=row.insertCell(2);
    var cel4=row.insertCell(3);
    var tmp=document.createTextNode(cant);
    cel.appendChild(tmp);
    tmp=document.createTextNode(med);
    cel2.appendChild(tmp);
    tmp=document.createTextNode(pres);
    cel3.appendChild(tmp);
    tmp=document.createElement("button");
    tmp.setAttribute("class", "btn btn-danger pull-right btn-round");
    tmp.setAttribute("id", orden);
    tmp.innerText="Eliminar";
    tmp.setAttribute("onclick", "eliminar(this)");
    tmp.setAttribute("type", "button");
    cel4.appendChild(tmp);
    document.getElementById('cantidad').value='';
    document.getElementById('medicamento').value='';
    document.getElementById('prescripcion').value='';
    document.getElementById('cantidades').value=cantidades;
    document.getElementById('medicamentos').value=medicamentos;
    document.getElementById('prescripciones').value=prescripciones;
    orden++;
  }
  else{
    alertify.error('Debe llenar todos los campos.')
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
                        format: 'DD/MM/YYYY'
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

<?php
require_once('..\..\Negocio/ClassLesionJugador.php');
require_once('..\..\Negocio/ClassTratamiento.php');
$tratamiento=new Tratamiento();
$lesion=new LesionJugador();
$data_lesion=$lesion->select($_GET['id']);
$data_tratamiento=$tratamiento->select($_GET['id']);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lesión - Actualizar</title>
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
            <h4 class="card-title">EDITAR LESIÓN DE JUGADOR</h4>
            <p class="card-category">Registro de lesión por jugador. </p>
          </div>
          <div class="card-body">
            <form method="post", action="..\lesion-jugador\store.php" id="frm_lesion">
              <input type="hidden" name="operation" value="2">
              <input type="hidden" name="id" id="lesion_id" value="<?php echo $data_lesion['id_lesion_jugador']; ?>">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Fecha Inicio</label>
                    <input type="text" placeholder="DD/MM/YYYY" id="f_inicio" class="form-control datetimepicker" name="fecha_inicio" value="<?php echo date('d/m/Y', strtotime($data_lesion['fecha_inicio'])); ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Fecha de recuperación</label>
                    <input type="text" id="f_final" placeholder="DD/MM/YYYY" class="form-control datetimepicker" name="fecha_recuperacion" <?php
                    if ($data_lesion['fecha_final']==$data_lesion['fecha_inicio']) {
                      ?>
                      value="Lesión activa"
                      <?php
                    }
                    else{
                      ?>
                      value="<?php echo $data_lesion['fecha_final']; ?>"
                      <?php
                    }
                     ?>>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Lesión</label>
                    <input type="hidden" name="les" id="les" value="<?php echo $data_lesion['id_lesion']; ?>">
                    <input type="text" id="lesion" name="lesion"  class="form-control" value="<?php echo $data_lesion['nombre']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Médico</label>
                    <input type="hidden" name="med" id="med" value="<?php echo $data_lesion['id_medico']; ?>">
                    <input type="text" name="medico" id="medico" class="form-control" value="<?php echo $data_lesion['medico']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Jugador</label>
                    <input type="hidden" name="jug" id="jug" value="<?php echo $data_lesion['id_jugador']; ?>">
                    <input type="text" name="jugador" id="jugador" class="form-control" value="<?php echo $data_lesion['JUGADOR']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Costo</label>
                    <input type="number" step="0.01" name="costo" class="form-control" value="<?php echo $data_lesion['costo']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Motivo</label>
                    <input type="text" class="form-control" name="mot" value="<?php echo $data_lesion['motivo']; ?>">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label class="">Observaciones</label>
                    <input type="text" class="form-control" name="obs" value="<?php echo $data_lesion['observacion']; ?>">
                  </div>
                </div>
              </div>
              <hr>
              <h3>Agregar tratamiento</h3>
                <div class="row">
                  <form  id="frm_tratamiento">
                    <input type="hidden" name="operation" value="4">
                    <input type="hidden" name="id" value="<?php echo $data_lesion['id_lesion_jugador']; ?>">
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
                          CANTIDAD
                        </th>
                        <th>
                          MEDICAMENTO
                        </th>
                        <th>
                          PRESCRIPCIÓN
                        </th>
                        <th>
                          ACCION
                        </th>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($data_tratamiento as $key => $val) {
                          ?>
                          <tr>
                            <td><?php echo $val['cantidad']; ?></td>
                            <td><?php echo $val['medicamento']; ?></td>
                            <td><?php echo $val['prescripcion']; ?></td>
                            <td> <button id="<?php echo $val['id_tratamiento']; ?>" type="button" class="btn btn-danger pull-right btn-round" onclick="delet(this)" name="button">Eliminar</button> </td>
                          </tr>
                          <?php
                        }
                         ?>
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
        alert(control.id);
      }
      function delet(control){
        $.ajax({
             type: "POST",
             url: 'store.php',
             data: {
               operation:"5",
               id:control.id,
             },
             success: function(data)
             {
               alertify.success("Eliminado con éxito");
             }
        });
        location.reload();
      }

var orden=0;
$(document).ready(function() {
  var cantidades=[];
  var medicamentos=[];
  var prescripciones=[];

$('#add').click(function(){
  var cant=document.getElementById('cantidad').value;
  var med=document.getElementById('medicamento').value;
  var pres=document.getElementById('prescripcion').value;
  if (cant!="" && med!="" && pres!="") {

    $.ajax({
         type: "POST",
         url: 'store.php',
         data: {
           operation:"4",
           cantidad:cant,
           medicamento:med,
           prescripcione:pres,
           id_lesion:$('#lesion_id').val(),
         },
         success: function(data)
         {
           alertify.alert("Agregado con éxito");
         }
    });

    var tabla=document.getElementById('agregados');
    var row=tabla.insertRow(1);
    row.setAttribute("id", orden);
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
    tmp=document.createElement("button");
    tmp.setAttribute("class", "btn btn-danger pull-right btn-round");
    tmp.setAttribute("id", orden);
    tmp.innerText="Eliminar";
    tmp.setAttribute("onclick", "delet(this)");
    tmp.setAttribute("type", "button");
    cel4.appendChild(tmp);
    document.getElementById('cantidad').value='';
    document.getElementById('medicamento').value='';
    document.getElementById('prescripcion').value='';
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

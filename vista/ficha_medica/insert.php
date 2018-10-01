<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Fichas Medicas - Insertar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '..\layoults\barnav.php'; ?>
    <div class="content main main-raised">
      <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-danger">
                    <h3 class="card-title">Ficha Medica</h3>
                    <p class="category">Nueva ficha medica.</p>
              </div>
              <div class="card-body text-center">
                <ul class="nav nav-pills nav-pills-success justify-content-center">
                    <li class="nav-item"><a class="nav-link active" href="#encabezado" data-toggle="tab">Encabezado</a></li>
                    <li class="nav-item"><a class="nav-link" href="#detalle" data-toggle="tab">Detalle 1</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Detalle 2</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#signos">Signos Vitales</a>
                            <a class="dropdown-item" href="#">Criometría/Antropometria</a>
                            <a class="dropdown-item" href="#">Evaluación Rodilla</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#otro" data-toggle="tab">Otro</a></li>
                </ul>
                <div class="tab-content tab-space">
                    <div class="tab-pane active" id="encabezado">
                        <form method="post", action="..\ficha_medica\store.php" id="frm_fichaMedica">
                            <input type="hidden" name="operation" value="1">
                            <input type="hidden" name="signosVitales" id="signosVitales" >
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Fecha</label>
                                    <input name="fecha" type="date" class="form-control" >
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Jugador</label>
                                    <select class="form-control" name="jugador">
                                        <option selected>Elija un jugador...</option>
                                        <?php
                                            include_once('..\..\Negocio/ClassJugador.php');
                                            $jugador=new Jugador();
                                            $data=$jugador->select(-1);
                                            while ($row = mysqli_fetch_array($data))
                                            {
                                                $valor = $row['id_jugador'];
                                                $texto2 = $row['nombre'];
                                                $texto = $texto2.' '.$row['apellido'];
                                                echo '<option value="'.$valor.'">'.$texto.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="grasa">Grasa</label>
                                    <input type="number" class="form-control" name="grasa">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="peso">Peso</label>
                                    <input type="number" class="form-control" name="peso">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="talla">Talla</label>
                                    <input type="number" class="form-control" name="talla">
                                </div>
                            </div>
                            <?php include '..\layoults\botones.php'; ?>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    <div class="tab-pane" id="detalle">
                        <?php include 'detalle.php'?>
                    </div>
                    <div class="tab-pane" id="otro">
                        Otro
                    </div>
                    <div class="tab-pane" id="signos">
                        Signos
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
<script type="text/javascript">
var datos=[];
  function registrarValor(id){
    datos=[];
    var inputs=document.getElementById('pill1').getElementsByTagName('input');
    for (var i = 0; i < inputs.length; i++) {
      datos.push({"campo": inputs[i].name, "valor":inputs[i].value});
    }
    $('#signosVitales').val(JSON.stringify(datos));
  }
</script>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#frm_fichaMedica').bootstrapValidator({
      feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
      },
      message: 'Valor no valido',
      fields: {
          fecha:{
              validators:{
                  notEmpty:{
                      message:'Ingrese una fecha valida'
                  }
                }
            },

            grasa:{
            validators:{
                notEmpty:{
                    message:'Ingrese el valor de la grasa del jugador'
                },
                regexp:{
                    regexp: /^[0-9]*$/,
                    message: 'Solo se aceptan números'
                    }
                }
            },
            peso:{
            validators:{
                notEmpty:{
                    message:'Ingrese el valor del peso del jugador'
                },
                regexp:{
                    regexp: /^[0-9]*$/,
                    message: 'Solo se aceptan números'
                    }
                }
            },
            talla:{
            validators:{
                notEmpty:{
                    message:'Ingrese el valor de la talla del jugador'
                },
                regexp:{
                    regexp: /^[0-9]*$/,
                    message: 'Solo se aceptan números'
                    }
                }
            },
        }
      })
    });
    </script>

  </body>
</html>

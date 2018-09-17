<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Fichas Medicas - Insertar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body>
    <?php include '..\layoults\barnav.php'; ?>
    <div class="content">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Ingresar Ficha Medica</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\fichaMedica\store.php">
              <input type="hidden" name="operation" value="1">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Fecha</label>
                    <input name="fecha" type="date" class="form-control" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-check">
                    <label class="form-check-label">
                      <label class="bmd-label-floating">Estado activo</label>
                      <input class="form-check-input" type="checkbox" checked name="status">
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Jugador</label>
                        <select class="form-control" name="jugador">
                          <?php
                              include_once('..\..\Negocio/ClassJugador.php');
                              $jugador=new Jugador();
                              $data=$jugador->select(-1);	
                              while ($row = mysqli_fetch_array($data))
                              {
                                  $valor = $row['idjugador'];
                                  $texto2 = $row['nombre'];
                                  $texto = $texto2.' '.$row['apellido'];
                                  echo '<option value="'.$valor.'">'.$texto.'</option>';
                              }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Grasa</label>
                            <input name="grasa" type="number" class="form-control" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Peso</label>
                            <input name="peso" type="number" class="form-control" >
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Talla</label>
                            <input name="talla" type="number" class="form-control" >
                        </div>
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
                      message:'Seleccione una fecha'
                  }
                }
            },

            grasa:{
                validators:{
                    notEmpty:{
                        message:'Ingrese la valor de grasa'
                    }
                }
            },

            peso:{
                validators:{
                    notEmpty:{
                        message:'Ingrese la valor de peso'
                    }
                }
            },

            talla:{
                validators:{
                    notEmpty:{
                        message:'Ingrese la valor de talla'
                    }
                }
            },
        }
    })
      });
    </script>

  </body>
</html>

<?php
require_once('..\..\Negocio/ClassFichaMedica.php');
$fichamedica=new FichaMedica();
$data=$fichamedica->select($_GET['id']);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ficha Medica - Actualizar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body>
    <?php
    include '..\layoults\barnav.php';
    ?>
   <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-danger">
                  <h4 class="card-title">Actualizar Ficha Medica</h4>
                  <p class="category">Complete los campos siguientes.</p>
              </div>
              <div class="card-body">
                <form method="post", action="..\ficha_medica\store.php" id="frm_fichaMedica">
                <input type="hidden" name="operation" value="2">
                <input type="hidden" name="id" value="<?php echo $data['id_ficha'] ?>">
                    <div class="form-row"> 
                        <div class="form-group col-md-4">
                            <label>Fecha</label>
                            <input name="fecha" type="date" class="form-control" value="<?php echo $data['fecha'] ?>">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputState">Jugador</label>
                            <select class="form-control" name="jugador">
                                <option selected>Elija un jugador...</option>
                                <?php
                                    include_once('..\..\Negocio/ClassJugador.php');
                                    $jugador=new Jugador();
                                    $data2=$jugador->select(-1);	
                                    while ($row = mysqli_fetch_array($data2))
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
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="status" <?php
                                    if ($data['estado']==1){
                                        echo "checked";
                                    }
                                    ?>>
                                        Estado activo
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="grasa">Grasa</label>
                            <input type="number" class="form-control" name="grasa" value="<?php echo $data['grasa'] ?>">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="peso">Peso</label>
                            <input type="number" class="form-control" name="peso" value="<?php echo $data['peso'] ?>">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="talla">Talla</label>
                            <input type="number" class="form-control" name="talla" value="<?php echo $data['talla'] ?>">
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

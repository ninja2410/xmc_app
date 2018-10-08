<?php
require_once('..\..\Negocio/ClassEntrenador.php');
$entrenador=new Entrenador();
$data=$entrenador->select($_GET['id']);
?>

<?php
require_once('..\..\Negocio/ClassTipoEntrenador.php');
$tipoentrenador=new TipoEntrenador();
$data2=$tipoentrenador->select(-1);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Entrenador - Actualizar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '..\layoults\barnav.php'; ?>
    <div class="main main-raised" >
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title">ACTUALIZAR ENTRENADOR</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\entrenador\store.php" id="frm_estadio">
              <input type="hidden" name="operation" value="2">
              <input type="hidden" name="id" value="<?php echo $data['id_entrenador']; ?>">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $data['nombre']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Apellidos</label>
                    <input type="text" class="form-control" name="apellido" value="<?php echo $data['apellido']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label >Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo $data['fecha_nacimiento']; ?>">
                  </div>
                </div>
             </div>

                <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Dirección</label>
                    <input type="text" class="form-control" name="direccion" value="<?php echo $data['direccion']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" value="<?php echo $data['telefono']; ?>">
                  </div>
                </div>
             </div>

             <div class="row">
              <div class="col-md-4">
                  <div class="form-group">
                    <label >Fecha inicio de labores</label>
                    <input type="date" class="form-control" name="fecha_inicio" value="<?php echo $data['fecha_inicio']; ?>">
                  </div>
                </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label >Fecha final de labores</label>
                    <input type="date" class="form-control" name="fecha_fin" value="<?php echo $data['fecha_fin']; ?>">
                 </div>
            </div>  
            </div>
                
            <div class="row">
              <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Tipo de entrenador</label>
                    <select class="form-control" name="id_tipo_entrenador" >
                      <?php
                      while ($row=mysqli_fetch_array($data2)) {
                          $valor = $row['id_tipo_entrenador'];
                          $texto = $row['descripcion'];
                          echo '<option value="'.$valor.'">'.$texto.'</option>';
                      }
                        ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="estado" value="<?php echo $data['estado']; ?>">
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
    $(document).ready(function(){
      $('#frm_entrenador').bootstrapValidator({
      feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
      },
      message: 'Valor no valido',
      fields: {
          nombre:{
              validators:{
                  notEmpty:{
                      message:'Ingrese un nombre'
                  },
                  regexp:{
                    regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/,
                      message: 'Solo se aceptan letras'
                    }
                }
            },
            apellido:{
                validators:{
                    notEmpty:{
                        message:'Ingrese un apellido'
                    },
                    regexp:{
                      regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/,
                        message: 'Solo se aceptan letras'
                      }
                  }
              },
              direccion:{
                validators:{
                    notEmpty:{
                        message:'Ingrese una dirección'
                    },
                    regexp:{
                      regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ_-\s]*$/, 
                        message: 'Solo se aceptan letras, números, espacios, guión y guión bajo'
                      }
                  }
              },
                telefono:{
                    validators:{
                        notEmpty:{
                            message:'Ingrese un número'
                        },
                        regexp:{
                          regexp: /^[0-9]*$/,
                            message: 'Solo se aceptan números'
                          }
                      }
                  },
                      fecha_nacimiento:{
                          validators:{
                              notEmpty:{
                                  message:'Seleccione una fecha'
                              }
                            }
                        },
                        fecha_inicio:{
                          validators:{
                              notEmpty:{
                                  message:'Seleccione una fecha'
                              }
                            }
                        },
                        fecha_fin:{
                          validators:{
                              notEmpty:{
                                  message:'Seleccione una fecha'
                              }
                            }
                        },
        }
      })
    });
    </script>
  </body>
</html>

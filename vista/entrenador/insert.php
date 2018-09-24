<?php
require_once('..\..\Negocio/ClassTipoEntrenador.php');
$tipoentrenador=new TipoEntrenador();
$data=$tipoentrenador->select(-1);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Entrenador - Insertar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '..\layoults\barnav.php'; ?>
    <div class="main main-raised"> 
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title">INSERTAR ENTRENADOR</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\entrenador\store.php" id="frm_entrenador">
             <input type="hidden" name="operation" value="1"> 
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input type="text" class="form-control" name="nombre">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Apellidos</label>
                    <input type="text" class="form-control" name="apellido">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label >Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="fecha_nacimiento">
                  </div>
                </div>
              </div>
             <div class="row">
             <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Dirección</label>
                    <input type="text" class="form-control" name="direccion">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Teléfono</label>
                    <input type="text" class="form-control" name="telefono">
                  </div>
                </div>
             </div>

              <div class="row">
              <div class="col-md-4">
                  <div class="form-group">
                    <label >Fecha inicio de labores</label>
                    <input type="date" class="form-control" name="fecha_inicio" >
                  </div>
                </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label >Fecha final de labores</label>
                    <input type="date" class="form-control" name="fecha_fin">
                 </div>
            </div>  
            </div>
                
              

              <div class="row">
              <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Tipo de entrenador</label>
                    <select class="form-control" name="id_tipo_entrenador">
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                          $valor = $row['id_tipo_entrenador'];
                          $texto = $row['descripcion'];
                          echo '<option value="'.$valor.'">'.$texto.'</option>';
                      }
                        ?>
                    </select>
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

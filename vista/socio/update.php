<?php
require_once('..\..\Negocio/ClassSocio.php');
$socio=new Socio();
$data=$socio->select($_GET['id']);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Socios - Registro</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body>
    <?php include '..\layoults\barnav.php'; ?>
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">REGISTRAR SOCIO</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\socio\store.php" id="frm_socio">
              <input type="hidden" name="operation" value="2">
              <input type="hidden" name="id" value="<?php echo $data['id_socio']; ?>">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombres</label>
                    <input name="name" type="text" class="form-control" value="<?php echo $data['nombre']; ?>">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Apellidos</label>
                    <input name="apellidos" type="text" class="form-control" value="<?php echo $data['apellido']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Domicilio</label>
                    <input name="domicilio" type="text" class="form-control" value="<?php echo $data['direccion_domicilio']; ?>">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Teléfono</label>
                    <input name="telefono" type="phone" class="form-control" value="<?php echo $data['telefono']; ?>">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Fecha de nacimiento</label>
                    <input name="fecha_nacimiento" type="text" class="form-control" value="<?php echo $data['fecha_nacimiento']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">DPI</label>
                    <input name="dpi" type="text" class="form-control" value="<?php  echo $data['DPI']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Dirección de cobro</label>
                    <input name="dir_cobro" type="text" class="form-control" value="<?php echo $data['direccion_cobro']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Membresía</label>
                    <select class="form-control" name="">
                      <?php while ($row=mysqli_fetch_array($data)) { ?>
                      <option value="<?php echo $row['id_membresia'] ?>"><?php echo $row['nombre']?></option>
                    <?php } ?>
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
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#frm_socio').bootstrapValidator({
      feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
      },
      message: 'Valor no valido',
      fields: {
          name:{
              validators:{
                  notEmpty:{
                      message:'Ingrese un nombre'
                  },
                  regexp:{
                    regexp: /^[a-zA-Z\s]*$/,
                      message: 'Solo se aceptan letras'
                    }
                }
            },
            apellidos:{
                validators:{
                    notEmpty:{
                        message:'Ingrese un apellido'
                    },
                    regexp:{
                      regexp: /^[a-zA-Z\s]*$/,
                        message: 'Solo se aceptan letras'
                      }
                  }
              },
              domicilio:{
                  validators:{
                      notEmpty:{
                          message:'Ingrese una dirección'
                      }
                    }
                },
                telefono:{
                    validators:{
                        notEmpty:{
                            message:'Ingrese un nombre'
                        },
                        regexp:{
                          regexp: /^[0-9]*$/,
                            message: 'Solo se aceptan letras'
                          }
                      }
                  },
                  dpi:{
                      validators:{
                          notEmpty:{
                              message:'Ingrese DPI'
                          },
                          regexp:{
                            regexp: /^[0-9]*$/,
                              message: 'DPI inválido.'
                            },
                          stringLength:{
                            min:13,
                            max:13,
                            message:'El DPI debe tener 13 dígitos.'
                          }
                        }
                    },
                    dir_cobro:{
                        validators:{
                            notEmpty:{
                                message:'Ingrese una dirección.'
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
        }
      })
    });
    </script>
  </body>
</html>

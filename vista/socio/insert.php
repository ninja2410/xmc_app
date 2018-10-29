<?php
require_once('..\..\Negocio/ClassMembresia.php');
$membresia=new Membresia();
$data=$membresia->select(-1);
// INSERTAR MEMBRESÍAS
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Socios - Registro</title>
    <?php include '..\layoults\headers2.php'; ?>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
  </head>
  <body>
    <?php include '..\layoults\barnavLogged.php'; ?>
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">REGISTRAR SOCIO</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\socio\store.php" id="frm_socio" enctype="multipart/form-data">
              <input type="hidden" name="operation" value="1">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombres</label>
                    <input name="name" type="text" class="form-control" >
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Apellidos</label>
                    <input name="apellidos" type="text" class="form-control" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Domicilio</label>
                    <input name="domicilio" type="text" class="form-control" >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Teléfono</label>
                    <input name="telefono" maxlength="8" minlength="8" type="phone" class="form-control" >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="">Fecha de nacimiento</label>
                    <input name="fecha_nacimiento" id="datetimepicker" type="text" class="form-control datetimepicker" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">DPI</label>
                    <input name="dpi" type="text" class="form-control" maxlength="13" minlength="13" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Dirección de cobro</label>
                    <input name="dir_cobro" type="text" class="form-control" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Correo electrónico</label>
                    <input name="email" type="email" class="form-control" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Membresía</label>
                    <select class="form-control" name="membresia">
                      <?php while ($row=mysqli_fetch_array($data)) { ?>
                      <option value="<?php echo $row['id_membresia'] ?>"><?php echo $row['nombre']?></option>
                    <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <label>Foto</label>
                <div class="col-lg-5">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                    <div>
                      <span class="btn btn-default btn-file"><span class="fileinput-new">Buscar imagen</span><span class="fileinput-exists">Cambiar</span><input type="file" name="img"></span>
                      <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
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
                          },
                          remote: {
                        message: 'Este numero de dpi ya esta asociado, verifique el numero',
                        url: 'dpi.php'
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

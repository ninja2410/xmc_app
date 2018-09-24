<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Jugadores - Insertar</title>
    <?php include '..\layoults\headers2.php'; ?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
  </head>
  <body>
    <?php include '..\layoults\barnav.php'; ?>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-danger">
                  <h4 class="card-title">Ingresar nuevo jugador</h4>
                  <p class="category">Complete los campos siguientes.</p>
              </div>
              <div class="card-body">
                <form method="post", action="..\jugador\store.php" id="frm_jugador">
                <input type="hidden" name="operation" value="1">
                    <div class="form-row"> 
                        <div class="form-group col-md-4">
                            <label>Nombre</label>
                            <input name="nombre" type="text" class="form-control" >
                        </div>

                        <div class="form-group col-md-4">
                            <label>Apellidos</label>
                            <input name="apellidos" type="text" class="form-control" >
                        </div>

                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" checked name="status">
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
                            <label>Dirección</label>
                            <input name="direccion" type="text" class="form-control" >
                        </div>

                        <div class="form-group col-md-4">
                            <label>Fecha de nacimiento</label>
                            <input type="date" class="form-control" name="fecha_nacimiento">
                        </div>

                         <div class="form-group col-md-4">
                            <label>Telefono</label>
                            <input name="telefono" type="number" class="form-control" >
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Nombre del padre</label>
                            <input name="padre" type="text" class="form-control" >
                        </div>

                        <div class="form-group col-md-4">
                            <label>Nombre de la madre</label>
                            <input type="text" class="form-control" name="madre">
                        </div>

                         <div class="form-group col-md-4">
                            <label>Procedencia</label>
                            <input name="procedencia" type="text" class="form-control" >
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
      $('#frm_jugador').bootstrapValidator({
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
                    message:'Ingrese el nombre del jugador'
                },
                regexp:{
                    regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/,
                    message: 'Solo se aceptan letras'
                    }
                }
            },
            apellidos:{
            validators:{
                notEmpty:{
                    message:'Ingrese los apellidos del jugador'
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
                    message:'Ingrese la dirección del jugador'
                },
                regexp:{
                    regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]*$/,
                    message: 'Solo se aceptan numeros y letras'
                    }
                }
            },
            fecha_nacimiento:{
              validators:{
                  notEmpty:{
                      message:'Ingrese una fecha valida'
                  }
                }
            },
              
            telefono:{
            validators:{
                notEmpty:{
                    message:'Ingrese el numero de telefono del jugador'
                },
                regexp:{
                    regexp: /^[0-9]*$/, 
                    message: 'Solo se aceptan números'
                    }
                }
            },
            padre:{
            validators:{
                notEmpty:{
                    message:'Ingrese el nombre del padre del jugador'
                },
                regexp:{
                    regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/,
                    message: 'Solo se aceptan letras'
                    }
                }
            },
            madre:{
            validators:{
                notEmpty:{
                    message:'Ingrese el nombre de la madre del jugador'
                },
                regexp:{
                    regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/,
                    message: 'Solo se aceptan letras'
                    }
                }
            },
            procedencia:{
            validators:{
                notEmpty:{
                    message:'Ingrese la procedencia del jugador'
                },
                regexp:{
                    regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/,
                    message: 'Solo se aceptan letras'
                    }
                }
            },
        }
      })
    });
    </script>

  </body>
</html>

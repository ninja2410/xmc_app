<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Jugadores - Insertar</title>
    <?php include '../layoults/headers2.php'; ?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
  </head>
    <body class="profile-page sidebar-collapse">
    <?php include '../layoults/barnavLogged.php'; ?>
    <div class="content main main-raised">
            <div class="card col-md-12">
      <div class="container-fluid">

              <div class="card-header card-header-danger">
                  <h3 class="card-title">Ingresar nuevo jugador</h3>
                  <p class="category">Complete los campos siguientes</p>
              </div>
              <div class="card-body">
                <form method="post", action="../jugador/store.php" enctype="multipart/form-data" id="frm_jugador">
                <input type="hidden" name="operation" value="1">
                    <div>
                        <h3>Datos personales</h3>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Nombre</label>
                                <input name="nombre" type="text" class="form-control" autofocus="autofocus">
                            </div>

                            <div class="form-group col-md-4">
                                <label>Apellidos</label>
                                <input name="apellidos" type="text" class="form-control" >
                            </div>

                            <div class="form-group col-md-4">
                                <label>Fecha de nacimiento</label>
                                <input type="date" class="form-control" name="fecha_nacimiento" max="<?php echo date("Y-m-d");?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Dirección</label>
                                <input name="direccion" type="text" class="form-control" >
                            </div>

                            <div class="form-group col-md-4">
                                <label>Teléfono</label>
                                <input name="telefono" type="number" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label>Procedencia</label>
                                <input name="procedencia" type="text" class="form-control" >
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
                                <label>Tipo de sangre</label>
                                <input type="text" class="form-control" name="sangre">
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3>Datos técnicos</h3>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Posición</label>
                                <select class="form-control" name="posicion">
                                    <option selected value="0">Elija la posicion del jugador...</option>
                                    <?php
                                        include_once('../../Negocio/ClassPosicion.php');
                                        $posicion=new Posicion();
                                        $data=$posicion->select(-1);
                                        while ($row = mysqli_fetch_array($data))
                                        {
                                            $valor = $row['id_posicion'];
                                            $texto = $row['descripcion'];
                                            echo '<option value="'.$valor.'">'.$texto.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Número de camisola</label>
                                <input name="camisola" type="number" class="form-control" >
                            </div>

                            <div class="form-group col-md-4">
                                <label>Categoría</label>
                                <select class="form-control" name="categoria">
                                    <option selected value="0">Elija la categoria del jugador...</option>
                                    <?php
                                        include_once('../../Negocio/ClassCategoria.php');
                                        $categoria=new Categoria();
                                        $data=$categoria->select(-1);
                                        while ($row = mysqli_fetch_array($data))
                                        {
                                            $valor = $row['id_categoria'];
                                            $texto = $row['nombre'];
                                            echo '<option value="'.$valor.'">'.$texto.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Fecha de inicio</label>
                                <input type="date" class="form-control" name="fecha_inicio" value="<?php echo date("Y-m-d");?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label>Fecha de final</label>
                                <input type="date" class="form-control" name="fecha_final" min="<?php echo date("Y-m-d");?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                                    <div>
                                    <span class="btn btn-default btn-file"><span class="fileinput-new">Buscar fotografia del jugador</span><span class="fileinput-exists">Cambiar</span><input type="file" name="img"></span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <?php include '../layoults/botones.php'; ?>
                    </div>
                    <div class="clearfix"></div>
                </form>
              </div>
            </div>

        </div>
    </div>
    <?php include '../layoults/footer.php'; ?>
    <?php include '../layoults/scripts2.php'; ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
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
                    regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s\-]*$/,
                    message: 'Solo se aceptan numeros y letras'
                    }
                }
            },

            sangre:{
            validators:{
                notEmpty:{
                    message:'Ingrese el tipo de sangre del jugador'
                },
                regexp:{
                    regexp: /^[aAbBoO\-\+]*$/,
                    message: 'Solo se aceptan tipos validos de sangre, por ejemplo O+'
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

            camisola:{
            validators:{
                notEmpty:{
                    message:'Ingrese el numero de la camisola del jugador'
                },
                regexp:{
                    regexp: /^[0-9]*$/,
                    message: 'Solo se aceptan números'
                    }
                }
            },

            fecha_inicio:{
              validators:{
                  notEmpty:{
                      message:'Ingrese una fecha valida'
                  }
                }
            },

            fecha_final:{
              validators:{
                  notEmpty:{
                      message:'Ingrese una fecha valida'
                  }
                }
            },
        }
      })
    });
    </script>

  </body>
</html>

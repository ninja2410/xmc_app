
 <?php
require_once('..\..\Negocio/ClassEntrenador.php');
$entrenador=new Entrenador();
$data=$entrenador->select($_GET['id']);
 ?>

<!-- < ?php
require_once('..\..\Negocio/ClassContrato.php');
$contrato=new Contrato();
$data2=$contrato->select(-1);
 ?> -->


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Entrenador - Actualizar</title>
    <?php include '..\layoults\headers2.php'; ?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '..\layoults\barnav.php'; ?>
    <div class="main main-raised"> 
    <div class="content">
        <div class="card col-md-13">
          <div class="card-header card-header-danger">
            <h3 class="card-title">Actualizar entrenador</h3>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\entrenador\store.php" id="frm_entrenador" enctype="multipart/form-data">
             <input type="hidden" name="operation" value="2"> 
             <input type="hidden" name="id" value="<?php echo $data['id_entrenador']; ?>">
             <input type="hidden" name="id_AE" value="<?php echo $data['id_asignacion_entrenador'] ?>">
             
             <div>
             <h3>Datos personales</h3>
             <hr>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label >Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $data['nombre']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Apellidos</label>
                    <input type="text" class="form-control" name="apellido"  value="<?php echo $data['apellido']; ?>"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Fecha de nacimiento</label>
                    <input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo $data['fecha_nacimiento']; ?>">
                  </div>
                </div>
              </div>
             <div class="row">
             <div class="col-md-4">
                  <div class="form-group">
                    <label>País de origen</label>
                    <input type="text" class="form-control" name="nacionalidad" value="<?php echo $data['nacionalidad']; ?>">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Dirección</label>
                    <input type="text" class="form-control" name="direccion" value="<?php echo $data['direccion']; ?>">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Teléfono</label>
                    <input type="text" class="form-control" name="telefono" value="<?php echo $data['telefono']; ?>">
                  </div>
                </div>
             </div>
             </div>  

             
             <div>
             <h3>Datos técnicos</h3>
             <hr>
             
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
            <div class="col-md-3">
                <div class="form-group">
                <label>Categoría</label>
                    <select class="form-control" name="categoria">
                          <option selected value="0">Elija la categoría del entrenador...</option>
                           <?php
                                include_once('..\..\Negocio/classCategoria.php');
                                $categoria=new Categoria();
                                $data2=$categoria->select(-1);
                                while ($row = mysqli_fetch_array($data2))
                                {
                                  $valor = $row['id_categoria'];
                                  $texto = $row['nombre'];
                                  echo '<option value="'.$valor.'">'.$texto.'</option>';
                                }
                                ?>
                    </select>
                 </div>
            </div>    
            </div>
            </div>

                  <div>
                  <h3>Fotografía</h3>
                  <hr>
                         
                <div class="row">
                <div class="col-md-4">
                  <img src="..\imagenes\<?php echo $data['foto']; ?>" style="width: 200px; height: 150px;" alt="">
                  <br>
                  <label><b>Imagen actual</b></label>
                </div>
                <div class="col-md-4">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                    <div>
                      <span class="btn btn-default btn-file"><span class="fileinput-new">Buscar Nueva</span><span class="fileinput-exists">Cambiar</span><input type="file" name="img"></span>
                      <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                    </div>
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
              nacionalidad:{
                validators:{
                    notEmpty:{
                        message:'Ingrese la nacionalidad'
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
        }
      })
    });
    </script>
  </body>
</html>

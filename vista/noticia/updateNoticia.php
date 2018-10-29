<?php
require_once('..\..\Negocio/ClassNoticias.php');
$noticia=new Noticia();
$data=$noticia->select($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Actualizar noticia</title>
    <?php include '..\layoults\headers2.php'; ?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
  </head>
    <body class="profile-page sidebar-collapse">
    <?php include '..\layoults\barnavLogged.php'; ?>
    <div class="content main main-raised">
        <div class="card">
            <div class="container-fluid">
                <div class="col-md-12">
                <div class="card-header card-header-danger">
                    <h3 class="card-title">Ingresar actualización de noticia</h3>
                    <p class="category">Complete los campos siguientes</p>
                </div>
                <div class="card-body">
                    <form method="post", action="..\noticia\store.php" enctype="multipart/form-data" id="frm_noticia">
                        <input type="hidden" name="operation" value="2">
                        <input type="hidden" name="id" value="<?php echo $data['id_noticia'] ?>">
                        <input type="hidden" name="id_IMG" value="<?php echo $data['id'] ?>">
                        <input type="hidden" name="IMG" value="<?php echo $data['path'] ?>">
                        <div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Titulo de la noticia</label>
                                    <input name="titulo" type="text" class="form-control" autofocus="autofocus" value="<?php echo $data['titulo']?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Fecha de publicación</label>
                                    <input type="date" class="form-control" name="fecha" value="<?php echo $data["fecha"]?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Contenido de la noticia</label>
                                    <textarea class="form-control" name="contenido" rows="8" onKeyDown="cuenta()" onKeyUp="cuenta()"><?php echo $data['contenido']?></textarea>
                                </div>
                                <div class="form-group col-md-6 row">
                                    <div class="col-md-6">
                                        <label>Imagen actual</label>
                                        <img src="..\imagenes/noticias/<?php echo $data['path']; ?>" style="width: 200px; height: 150px;" alt="">
                                    </div>
                                    <div class="fileinput fileinput-new col-md-6" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                                        <div>
                                        <span class="btn btn-default btn-file"><span class="fileinput-new">Buscar fotografia de la noticia</span><span class="fileinput-exists">Cambiar</span><input type="file" name="img"></span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <div class="text-right">
                            <?php include '..\layoults\botones.php'; ?>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                </div>
            </div>
          </div>
    </div>
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#frm_noticia').bootstrapValidator({
      feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
      },
      message: 'Valor no valido',
      fields: {
            titulo:{
            validators:{
                notEmpty:{
                    message:'Ingrese el titulo de la noticia'
                },
                regexp:{
                    regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s\""\:\.]*$/,
                    message: 'Solo se aceptan letras'
                    }
                }
            },

            contenido:{
            validators:{
                notEmpty:{
                    message:'Ingrese el contenido de la noticia'
                },
                stringLength: {
                    max: 400,
                    message: 'El maximo de caracteres es 400'
                },
            },

            fecha:{
              validators:{
                  notEmpty:{
                      message:'Ingrese una fecha valida'
                  }
                }
            },
        }
        }
      })
    });
    </script>

  </body>
</html>


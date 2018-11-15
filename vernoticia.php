<?php
require_once('Negocio/ClassNoticias2.php');
$noticia=new Noticia();
$data=$noticia->select($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $data['titulo']?></title>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- Icono -->
    <link rel="shortcut icon" type="image/x-icon" href="vista/assets/img/logo.ico">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

    <!-- Material Kit CSS -->
    <link href="vista/assets/css/material-kit.css?v=2.0.4" rel="stylesheet" />

    <link href="vista/assets/css/xelaju.css" rel="stylesheet" />

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>

    <!-- Iconos de fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- DATATABLES -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/bootstrap.min.css"/>

  </head>
  <body class="landing-page sidebar-collapse">
    <?php
    include 'vista/layoults/barnavNoticias.php';
    ?>
   <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <h1 class="title text-center"><?php echo $data['titulo']?></h1>
                <div class="text-left">
                  <h6>Por: <?php echo $data['Autor']?> |</h6>
                  <p class="card-text"><small class="text-muted">Publicado el: <?php echo $data['fecha']?></small></p>
                  <hr>
                </div>
                <div class="text-justify">
                  <img align="left" alt="<?php echo $data['nombre']?>" class="img-fluid" style="width:50%; margin:10px" src="vista/imagenes/noticias/<?php echo $data['path']?>"/>
                  <?php echo $data['contenido']?>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card">
              <a class="twitter-timeline" href="https://twitter.com/Xelaju_Oficial" data-height="1000">Tweets de @Xelaju_Oficial</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
          </div>
        </div>
    </div>
    <?php include 'vista/layoults/footer.php'; ?>
    <?php include 'vista/layoults/scripts2.php'; ?>
  </body>
</html>

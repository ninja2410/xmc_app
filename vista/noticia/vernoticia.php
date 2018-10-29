<?php
require_once('..\..\Negocio/ClassNoticias.php');
$noticia=new Noticia();
$data=$noticia->select($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $data['titulo']?></title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="landing-page sidebar-collapse">
    <?php
    include '..\layoults\barnav3.php';
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
                  <img align="left" alt="<?php echo $data['nombre']?>" class="img-fluid" style="width:50%; margin:10px" src="../imagenes/noticias/<?php echo $data['path']?>"/>
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
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
  </body>
</html>

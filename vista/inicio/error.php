<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ERROR 404</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <style type="text/css">
    html {
        background: url(../assets/img/Pagina_404.png) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .centrado-porcentual {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    color:white;
}
  </style>
  <body>
      <div class="centrado-porcentual text-center text-white">
        La página a la que intenta acceder no fue encontrada, regrese a <a href="index.php">inicio</a>
      </div>
    <?php include '..\layoults\scripts.php'; ?>
  </body>
</html>

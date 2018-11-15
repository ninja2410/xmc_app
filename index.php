<?php
require_once('Negocio/ClassNoticias.php');
$noticia=new Noticia();
$data=$noticia->Ultimoregistro();
$data2=$noticia->LosDemas();

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Inicio</title>
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
    <style>
    #contenedor{
        position: absolute;
        bottom: 15px;
        left: 0;
        right: 0;
    }
    </style>
     <!-- Apartado de noticias -->
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <?php
                        while ($row=mysqli_fetch_array($data)) {
                    ?>
                    <div class="col-md-8">
                        <div class="card carta">
                            <img class="card-img-top" src="vista/imagenes/noticias/<?php echo $row['path']; ?>" alt="<?php echo $row['titulo']; ?>">
                            <div class="card-body">
                                <h3 class="titulo"><?php echo $row['titulo']; ?></h3>
                                <div class="text-center">
                                    <a href="vernoticia.php?id=<?php echo $row['id_noticia']; ?>" class="btn azul"><i class="far fa-newspaper"></i> Ver la noticia</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                        while ($row=mysqli_fetch_array($data2)) {
                    ?>
                    <div class="col-md-4">
                        <div class="card carta">
                            <img class="card-img-top" src="vista/imagenes/noticias/<?php echo $row['path']; ?>" alt="<?php echo $row['titulo']; ?>">
                            <div class="card-body">
                                <h3 class="titulo"><?php echo $row['titulo']; ?></h3>
                                <div id="contenedor" class="text-center">
                                <a href="vernoticia.php?id=<?php echo $row['id_noticia']; ?>" class="btn azul"><i class="far fa-newspaper"></i> Ver la noticia</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <a class="twitter-timeline" href="https://twitter.com/Xelaju_Oficial" data-height="1000">Tweets de @Xelaju_Oficial</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin de apartado de noticias -->
    <?php include 'vista/layoults/footer.php'; ?>
    <?php include 'vista/layoults/scripts2.php'; ?>
    <script>
        $(document).ready(function(){//ACCION CUANDO CARGUE LA PAGINA
            var altura_arr = [];//CREAMOS UN ARREGLO VACIO

            $('.carta').each(function(){//RECORREMOS TODOS LOS CONTENEDORES DE LAS IMAGENES, DEBEN TENER LA MISMA CLASE
                var altura = $(this).height(); //LES SACAMOS LA ALTURA
                altura_arr.push(altura);//METEMOS LA ALTURA AL ARREGLO
            });

            altura_arr.sort(function(a, b){return b-a}); //ACOMODAMOS EL ARREGLO EN ORDEN DESCENDENTE

            $('.carta').each(function(){//RECORREMOS DE NUEVO LOS CONTENEDORES
                $(this).css('height',altura_arr[0]);//LES PONEMOS A TODOS LOS CONTENEDORES EL PRIMERO ELEMENTO DE ALTURA DEL ARREGLO, QUE ES EL MAS GRANDE.
            });
        });
    </script>
</body>

</html>

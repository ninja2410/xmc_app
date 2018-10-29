<?php
require_once('..\..\Negocio/ClassNoticias.php');
$noticia=new Noticia();
$data=$noticia->Ultimoregistro();
$data2=$noticia->LosDemas();

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Inicio</title>
    <?php include '..\layoults\headers2.php'; ?>
</head>
<body class="landing-page sidebar-collapse">
    <?php
        include '..\layoults\barnav3.php';
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
                            <img class="card-img-top" src="../imagenes/noticias/<?php echo $row['path']; ?>" alt="<?php echo $row['titulo']; ?>">
                            <div class="card-body">
                                <h3 class="titulo"><?php echo $row['titulo']; ?></h3>
                                <div class="text-center">
                                    <a href="..\..\vista\noticia/vernoticia.php?id=<?php echo $row['id_noticia']; ?>" class="btn azul"><i class="far fa-newspaper"></i> Ver la noticia</a>
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
                            <img class="card-img-top" src="../imagenes/noticias/<?php echo $row['path']; ?>" alt="<?php echo $row['titulo']; ?>">
                            <div class="card-body">
                                <h3 class="titulo"><?php echo $row['titulo']; ?></h3>
                                <div id="contenedor" class="text-center">
                                <a href="..\..\vista\noticia/vernoticia.php?id=<?php echo $row['id_noticia']; ?>" class="btn azul"><i class="far fa-newspaper"></i> Ver la noticia</a>
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
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
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

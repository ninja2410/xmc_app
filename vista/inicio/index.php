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
                    <div class="col-md-8">
                        <div class="card carta">
                            <img class="card-img-top" src="https://pbs.twimg.com/media/DpA8DCtUUAAruVh.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h3 class="titulo">Nuestro plantel trabaja con la mira puesta en nuestro siguiente rival.</h3>
                                <p class="card-text">
                                    Xelajú MC vs Chiantla
                                    10/10/18
                                    20 hrs.
                                    Mario Camposeco
                                    Q40 adultos y Q10 niños 
                                    Jornada 14
                                    #VamosXelajúMC #XelajúMC #ChivosDeCorazon #Superchivos
                                </p>
                                <div class="text-center">
                                    <a href="#0" class="btn azul"><i class="far fa-newspaper"></i> Ver la noticia</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card carta">
                            <img class="card-img-top" src="https://pbs.twimg.com/media/Dos7m-oUwAAbROV.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h3 class="titulo">PARTIDO AMISTOSO</h3>
                                <p class="card-text">
                                    Hoy jugamos en San Francisco El Alto.
                                    Club Imperial 1-9 Xelajú MC
                                    Goles: 13' Alvaro Aguilar, 15' Miguel Farfán, 22' y 56' Alexis Méndez, 24' y 31' Marconi Estrada, 61' 65' y 75' Iker Rodas.
                                    #VamosXelajúMC #ChivosDeCorazon #Superchivos
                                </p>
                                <div id="contenedor" class="text-center">
                                    <a href="#0" class="btn azul"><i class="far fa-newspaper"></i> Ver la noticia</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card carta">
                            <img class="card-img-top" src="https://pbs.twimg.com/media/DomWsqBVsAER6LA.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h3 class="titulo">PARTIDO AMISTOSO</h3>
                                <p class="card-text">
                                    Este jueves 4 de octubre invitamos a todos los amigos de San Francisco El Alto a que nos acompañen en el partido amistoso en el campo municipal entre Xelajú MC y Club Imperial, a las 11 horas. ¡Los esperamos!
                                    #VamosXelajúMC #Superchivos
                                </p>
                                <div id="contenedor" class="text-center">
                                    <a href="#0" class="btn azul"><i class="far fa-newspaper"></i> Ver la noticia</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card carta">
                            <img class="card-img-top" src="https://images.unsplash.com/photo-1517303650219-83c8b1788c4c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=bd4c162d27ea317ff8c67255e955e3c8&auto=format&fit=crop&w=2691&q=80" alt="Card image cap">
                            <div class="card-body">
                                <h3 class="titulo">Copa 2018</h3>
                                <p class="card-text">
                                    Nuestro plantel cerró su preparación con miras al duelo de Copa mañana al medio día en casa.
                                    Xelajú MC vs San Pedro
                                    24/10/18
                                    12 hrs
                                    Mario Camposeco
                                    Q20 adultos y Q5 niños 
                                    PROMOCIÓN: Estudiantes con carnet 2X1
                                    8vos de final
                                </p>
                                <div id="contenedor" class="text-center">
                                    <a href="#0" class="btn azul"><i class="far fa-newspaper"></i> Ver la noticia</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card carta">
                            <img class="card-img-top" src="https://pbs.twimg.com/media/DqEWWMlU4AAzMI3.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h3 class="titulo">Apertura 2018</h3>
                                <p class="card-text">
                                    SUB 20
                                    Termina el partido en el estadio Pensativo.
                                    Antigua 0-1 Xelajú MC 
                                    Pensativo
                                    Jornada 15
                                    #VamosXelajúMC #XelajúMC #ChivosDeCorazon #Superchivos
                                </p>
                                <div id="contenedor" class="text-center">
                                    <a href="#0" class="btn azul"><i class="far fa-newspaper"></i> Ver la noticia</a>
                                </div>
                            </div>
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

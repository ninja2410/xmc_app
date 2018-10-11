<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Inicio</title>
    <?php include '..\layoults\headers2.php'; ?>
</head>
<body>
    <?php
        include '..\layoults\barnav3.php';
    ?>
    
    <style>
    html {
    -webkit-font-smoothing: antialiased;
  }
  
  .banda {
    width: 90%;
    max-width: 1240px;
    margin: 0 auto;
    
    display: grid;
    
    grid-template-columns: 1fr;
    grid-template-rows: auto;
    grid-gap: 20px;
    
  }
  
  @media only screen and (min-width: 500px) {
    .banda {
      grid-template-columns: 1fr 1fr;
    }  
    .item-1 {
    grid-column: 1/ span 2;
    }
    .item-1 h1 {
      font-size: 30px;
    }
  }
  
  @media only screen and (min-width: 850px) {
    .banda {
      grid-template-columns: 1fr 1fr 1fr 1fr;
    }
  }
  
  /* tarjetas */
  
  .tarjetas {
    min-height: 100%;
    background: white;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    display: flex;
    flex-direction: column;
    text-decoration: none;
    color: #444;
    position: relative;
    top: 0;
    transition: all .1s ease-in;
  }
  
  .tarjetas:hover {
    top: -2px;
    box-shadow: 0 4px 5px rgba(0,0,0,0.2);
  }
  
  .tarjetas article {
    padding: 20px;
    display: flex;
    
    flex: 1;
    justify-content: space-between;
    flex-direction: column;
    
  }
  .tarjetas .thumb {
    padding-bottom: 60%;
    background-size: cover;
    background-position: center center;
  }
  
  .tarjetas p { 
    flex: 1; /* make p grow to fill available space*/
    line-height: 1.4;
  }
  
  /* typography */
  h1 {
    font-size: 20px;
    margin: 0;
    color: #333;
  }
  
  .tarjetas span {
    font-size: 12px;
    font-weight: bold;
    color: #999;
    text-transform: uppercase;
    letter-spacing: .05em;
    margin: 2em 0 0 0;
  }

    </style>

    <div class="row">
        <div class="col-md-9">
            <div class="support-grid"></div>
            <div class="banda">
                <div class="item-1 tarjetas">
                    <div class="thumb" style="background-image: url(https://pbs.twimg.com/media/DpA8DCtUUAAruVh.jpg);"></div>
                    <article>
                        <h1>Nuestro plantel trabaja con la mira puesta en nuestro siguiente rival.</h1>
                        <p> 
                            Xelajú MC vs Chiantla
                            10/10/18
                            20 hrs.
                            Mario Camposeco
                            Q40 adultos y Q10 niños 
                            Jornada 14
                            #VamosXelajúMC #XelajúMC #ChivosDeCorazon #Superchivos
                        </p>
                        <a href="#0" class="btn azul"><i class="far fa-newspaper fa-lg"></i> Ver la noticia</a>
                        <span>
                            Publicado el  
                            <script>
                                document.write(new Date().toJSON().slice(0,10))
                            </script>
                        </span>
                    </article>
            </div>
            <div class="item-2 tarjetas">
                <div class="thumb" style="background-image: url(https://pbs.twimg.com/media/Dos7m-oUwAAbROV.jpg);"></div>
                <article>
                    <h1>PARTIDO AMISTOSO</h1>
                    <p>
                        Hoy jugamos en San Francisco El Alto.
                        Club Imperial 1-9 Xelajú MC
                        Goles: 13' Alvaro Aguilar, 15' Miguel Farfán, 22' y 56' Alexis Méndez, 24' y 31' Marconi Estrada, 61' 65' y 75' Iker Rodas.
                        #VamosXelajúMC #ChivosDeCorazon #Superchivos
                    </p>
                    <a href="#0" class="btn azul"><i class="far fa-newspaper fa-lg"></i> Ver la noticia</a>
                    <span>
                        Publicado el  
                        <script>
                            document.write(new Date().toJSON().slice(0,10))
                        </script>
                    </span>
                </article>
            </div>
            <div class="item-3 tarjetas">
                <div class="thumb" style="background-image: url(https://pbs.twimg.com/media/DomWsqBVsAER6LA.jpg);"></div>
                <article>
                    <h1>PARTIDO AMISTOSO</h1>
                    <p>
                        Este jueves 4 de octubre invitamos a todos los amigos de San Francisco El Alto a que nos acompañen en el partido amistoso en el campo municipal entre Xelajú MC y Club Imperial, a las 11 horas. ¡Los esperamos!
                        #VamosXelajúMC #Superchivos
                    </p> 
                    <a href="#0" class="btn azul"><i class="far fa-newspaper fa-lg"></i> Ver la noticia</a>
                    <span>
                        Publicado el  
                        <script>
                            document.write(new Date().toJSON().slice(0,10))
                        </script>
                    </span>
                </article>
                </a>
            </div>
            <div class="item-4 tarjetas">
                <div class="thumb" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/landing.png);"></div>
                <article>
                    <h1>How to Code a Scrolling “Alien Lander” Website</h1>
                    <p>We’ll be putting things together so that as you scroll down from the top of the page you’ll see an “Alien Lander” making its way to touch down.</p>
                    <a href="#0" class="btn azul"><i class="far fa-newspaper fa-lg"></i> Ver la noticia</a>
                    <span>
                        Publicado el  
                        <script>
                            document.write(new Date().toJSON().slice(0,10))
                        </script>
                    </span>
                </article>
            </div>
            <div class="item-5 tarjetas">
                <div class="thumb" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/strange.jpg);"></div>
                <article>
                    <h1>How to Create a “Stranger Things” Text Effect in Adobe Photoshop</h1>
                    <a href="#0" class="btn azul"><i class="far fa-newspaper fa-lg"></i> Ver la noticia</a>
                    <span>
                        Publicado el  
                        <script>
                            document.write(new Date().toJSON().slice(0,10))
                        </script>
                    </span>
                </article>
            </div>
            <div class="item-6 tarjetas">
                <div class="thumb" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/flor.jpg);"></div>
                <article>
                    <h1>5 Inspirational Business Portraits and How to Make Your Own</h1>
                    <a href="#0" class="btn azul"><i class="far fa-newspaper fa-lg"></i> Ver la noticia</a>
                    <span>
                        Publicado el  
                        <script>
                            document.write(new Date().toJSON().slice(0,10))
                        </script>
                    </span>
                </article>
            </div>
            <div class="item-7 tarjetas">
                <div class="thumb" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/china.png);"></div>
                <article>
                    <h1>Notes From Behind the Firewall: The State of Web Design in China</h1>
                    <a href="#0" class="btn azul"><i class="far fa-newspaper fa-lg"></i> Ver la noticia</a>
                    <span>
                        Publicado el  
                        <script>
                            document.write(new Date().toJSON().slice(0,10))
                        </script>
                    </span>
                </article>
            </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="tarjetas">
                <div>
                    <a class="twitter-timeline" href="https://twitter.com/Xelaju_Oficial" data-height="1000">Tweets de @Xelaju_Oficial</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin de apartado de noticias -->
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
</body>

</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Inicio</title>
    <?php include '..\layoults\headers2.php'; ?>
</head>
<body class="login-page sidebar-collapse">
<style>
        .fondoP {
            background-image:url(https://www.guatemala.com/fotos/201511/xelaju-808x500.jpg);
            max-width: 100%;
            height: 92%;
            position:relative;
            color: white;
            z-index:1;
        }

        .titulo{
            font-weight: 700;
            font-family: "Roboto Slab", "Times New Roman", serif;
        }

        .fondoP::after {
            content:"";
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background:rgba(0,0,0,0.6);
            z-index:-1;
        }

        .fondo {
            background-image:url(https://www.guatemala.com/fotos/201511/xelaju-808x500.jpg);
            max-width: 100%;
            height: 90%;
            position:relative;
            color: white;
            z-index:1;
        }

        .fondo::after {
            content:"";
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background:rgba(0,0,0,0.6);
            z-index:-1;
        }
        
        .rojo{
            background-color:#d82023 ;
        }

        .azul {
            background-color: #294482;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
        }
        .azul:hover {
            background-color: #294482;
            color: white;
        }
    </style>
  <div class="page-header header-filter" style="background-image: url('../assets/img/login.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="POST" action="..\login\acceso.php">
                <br>
              <div class="card-header card-header-primary text-center">
                <h3 class="card-title">Login</h3>
              </div>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-user fa-lg"></i>
                    </span>
                  </div>
                  <input type="text" name="username" class="form-control" placeholder="Nombre de usuario...">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-lock fa-lg"></i>
                    </span>
                  </div>
                  <input type="password" name="password" class="form-control" placeholder="Contraseña...">
                </div>
              </div>
              <div class="footer text-center">
                <button type="submit" class="btn azul btn-wd btn-lg" placeholder="Contraseña...">
                Ingresar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
</body>

</html>
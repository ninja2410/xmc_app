<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <?php include '..\layoults\headers2.php'; ?>
</head>
<body class="login-page sidebar-collapse">
  <div class="page-header header-filter" style="background-image: url('../assets/img/login.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="POST" action="..\login\acceso.php">
                <br>
              <div class="card-header card-header-danger text-center">
                <img src="../assets/img/logo.png" alt="Logo de Xelaju MC" class="rounded-circle img-fluid" style="height:150px; width:150px;">
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
                <button type="submit" class="btn azul btn-wd btn-lg">INICIAR SESIÓN</button>
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
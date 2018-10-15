<?php
require_once('..\..\Negocio/ClassUsuario.php');
$usuario=new Usuario();


session_start();

$username = $_POST['username'];
$password = $_POST['password'];
 

$data=$usuario->Loggin($username,$password);

$result = mysqli_num_rows($data);

if($result>0)
{
    while ($fila=mysqli_fetch_array($data))
    {
        $_SESSION['iniciado'] = true;
        $_SESSION['id'] = $fila['id_usuario'];
        $_SESSION['foto'] = $fila['foto'];
        $_SESSION['usuario'] = $username;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (15 * 60);
        $_SESSION['error'] = false;

        header('Location:/PJ_XJMC/vista/usuario/index.php');

        
    }
}else
{
    $_SESSION['error'] = true;
    header('Location:/PJ_XJMC/vista/login/login.php');
}

?>
<?php
require_once('..\..\Conexion\conexion.php');
$conexion=new conexion();
$conexion->conectar();


session_start();

$username = $_POST['username'];
$password = $_POST['password'];
 
$query = $conexion->objetoconexion->query("CALL SP_USUARIO_LOGIN('$username','$password')");

$result = mysqli_num_rows($query);
if($result>0)
{
while ($fila = $query->fetch_assoc())  
{
        $_SESSION['iniciado'] = true;
        $_SESSION['id'] = $fila['id_usuario'];
        $_SESSION['usuario'] = $username;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
    
        echo "Bienvenido! " . $_SESSION['usuario'];
        echo "<br><br><a href=../partido/index.php>Panel de Control</a>"; 

}
}else
{
    echo 'login';
}

 ?>
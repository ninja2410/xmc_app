<?php
require_once('../../Negocio/ClassUsuario.php');
$usuario=new Usuario();


$username = $_GET['usuario'];
 

$data=$usuario->nusuario($username);

$contar = mysqli_num_rows($data);


if($contar >  0){
    echo json_encode(array(
        'valid' => false,
    ));
}else{
    echo json_encode(array(
        'valid' => true,
    ));
}
?>
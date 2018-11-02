<?php
require_once('../../Negocio/ClassSocio.php');
$socio=new Socio();


$username = $_GET['dpi'];
 

$data=$socio->DPI($username);

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
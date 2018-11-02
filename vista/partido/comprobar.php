<?php

$equipo = $_GET['autoequipo'];
 

if($equipo == "No hay resultado"){
    echo json_encode(array(
        'valid' => false,
    ));
}else{
    echo json_encode(array(
        'valid' => true,
    ));
}
?>
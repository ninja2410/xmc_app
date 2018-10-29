<?php

require_once('..\..\Negocio/ClassPrensa.php');
require_once('..\..\Negocio/ClassBitacora.php');
session_start();
$bit=new Bitacora();
$lesion=new Prensa();

$prensa = $_POST['prensas'];

$array = $prensa;

$return_arr=array();


$partido;

foreach ($array as $value) 
{
    foreach ($value as $v) 
    {

    $ca_producto=array(
        "id_pre"=> $v['id_pre'],
        "id_par"=> $v['id_par']);

       $lesion->asignar($v['id_par'],$v['id_pre']);
       $_SESSION['mensaje']="El registro se ha almacenado con éxito!";

        array_push($return_arr, $ca_producto);
        $partido=$v['id_par'];

    }
}
$bit->insert('Asigno prensa al partido '.$partido, $_SESSION['id']);

echo json_encode($return_arr);


?>
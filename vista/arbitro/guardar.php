<?php

require_once('../../Negocio/ClassArbitro.php');
require_once('../../Negocio/ClassBitacora.php');
session_start();
$bit=new Bitacora();
$lesion=new Arbitro();

$arbitros = $_POST['arbitros'];

$array = $arbitros;

$return_arr=array();


$partido;

foreach ($array as $value) 
{
    foreach ($value as $v) 
    {

    $ca_producto=array(
        "id_arb"=> $v['id_arb'],
        "id_par"=> $v['id_par']);

       $lesion->asignar($v['id_arb'],$v['id_par']);
       $_SESSION['mensaje']="El registro se ha almacenado con éxito!";

        array_push($return_arr, $ca_producto);
        $partido=$v['id_par'];

    }
}
$bit->insert('Asignó árbitros al partido '.$partido, $_SESSION['id']);

echo json_encode($return_arr);


?>
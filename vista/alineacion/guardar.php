<?php

require_once('../../Negocio/ClassAlineacion.php');
require_once('../../Negocio/ClassBitacora.php');
session_start();
$bit=new Bitacora();
$lesion=new Alineacion();

$alineacion = $_POST['alineacion'];

$array = $alineacion;

$return_arr=array();


$partido;

foreach ($array as $value) 
{
    foreach ($value as $v) 
    {

    $ca_producto=array(
        "id_jug"=> $v['id_jug'],
        "id_pos"=> $v['id_pos'],
        "id_par"=> $v['id_par']);

       $lesion->insert($v['id_par'],$v['id_jug'],$v['id_pos']);
       $_SESSION['mensaje']="El registro se ha almacenado con éxito!";

        array_push($return_arr, $ca_producto);
        $partido=$v['id_par'];

    }
}
$bit->insert('Agregó a la alineación del partido '.$partido, $_SESSION['id']);

echo json_encode($return_arr);


?>
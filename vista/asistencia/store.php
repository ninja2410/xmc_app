<?php

require_once('../../Negocio/ClassEntrenamiento.php');
require_once('../../Negocio/ClassBitacora.php');
session_start();
$bit=new Bitacora();
$entreno=new Entrenamiento();

$Entrenamiento = $_POST['jugador'];

$array = $Entrenamiento;

$return_arr=array();


$partido;

foreach ($array as $v) 
{

    $ca_producto=array(
        "Atraso" => $v['Atraso'],
        "Eje" => $v['Eje'],
        "Falta" => $v['Falta'],
        "Motivo"  => $v['Motivo'],
        "Permiso"  => $v['Permiso'],
        "Retiro" => $v['Retiro'],
        "id_entreno" => $v['id_entreno'],
        "id_jugador"  => $v['id_jugador']
    );

    $data = $entreno->Asistencia($v['id_jugador'],$v['id_entreno']);
    $result = mysqli_num_rows($data);
    
    if($result<=0)
    {
       $entreno->insertAsistencia($v['id_entreno'],$v['id_jugador']
       ,$v['Eje'],$v['Permiso'],$v['Atraso'],$v['Retiro'],
       $v['Falta'],$v['Motivo']);
       $_SESSION['mensaje']="Se registro la asistencia!";
    }
    else
    {
        $entreno->updateAsistencia($v['id_entreno'],$v['id_jugador']
        ,$v['Eje'],$v['Permiso'],$v['Atraso'],$v['Retiro'],
        $v['Falta'],$v['Motivo']);
        $_SESSION['mensaje']="Se actualizo la asistencia!";
    }
        
}


echo json_encode($ca_producto);


?>
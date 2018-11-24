<?php
require_once('../../Negocio/ClassEntrenamiento.php');
require_once('../../Negocio/ClassBitacora.php');
session_start();
$bit=new Bitacora();

if(isset($_POST['operation'])){
  $operation=$_POST['operation'];
}

if(isset($_POST['fecha'])){
  $fecha=$_POST['fecha'];
}
echo json_encode($_POST);
if(isset($_POST['hora']))
{
  $hora=$_POST['hora'];
  $horayfecha = $fecha.' '.date("H:i:s",strtotime($hora));
}

$categoria=1;
echo $categoria;


if(isset($_POST['temporada'])){
  $temporada=$_POST['temporada'];
}

if (isset($_POST['id'])) 
{
  $id_entreno=$_POST['id'];
}

$lesion=new Entrenamiento();
if ($operation=="1") 
{
  $bit->insert('Agrego una nuevo entreno ', $_SESSION['id']);
  $lesion->insert($horayfecha, $categoria, $temporada);
  $_SESSION['mensaje']="El entreno se ha almacenado con éxito!";
}
elseif($operation=="2") 
{


  $bit->insert('Edito el entreno con codigo'.$id_entreno, $_SESSION['id']);
  $lesion->update($id_entreno,$fecha, $categoria, $temporada);
  $_SESSION['mensaje']="El entreno se ha modificado con éxito!";
} elseif ($operation=="3") 
{
  $lesion->delete($id_entreno);
  $_SESSION['mensaje']="El entreno se ha suspendido con éxito!";
}
header('Location:index.php');
?>

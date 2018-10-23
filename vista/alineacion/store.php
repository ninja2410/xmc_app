<?php
require_once('..\..\Negocio/ClassAlineacion.php');
require_once('..\..\Negocio/ClassBitacora.php');
session_start();
$bit=new Bitacora();

if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
echo json_encode($_POST);
if(isset($_POST['jugador'])){
  $jugador=$_POST['jugador'];
}

if(isset($_POST['partido'])){
  $partido=$_POST['partido'];
}
if(isset($_POST['posicion'])){
  $posicion=$_POST['posicion'];
}

if(isset($_POST['id'])){
  $id_alineacion=$_POST['id'];
}

$lesion=new Alineacion();

if ($operacion=="1")
{
  $bit->insert('Agrego a la aliniazion del partido '.$jugador, $_SESSION['id']);
  $lesion->insert($partido,$jugador,$posicion);
  echo 'insertado';
}elseif($operacion=="2")
{
  $bit->insert('Actualizo la alineacion del partido '.$partido, $_SESSION['id']);
  $lesion->update($id_alineacion,$partido,$jugador,$posicion);

}elseif ($operacion=="3")
{
  $bit->insert('Elimino el partido '.$partido, $_SESSION['id']);
  $lesion->delete($id_alineacion);
}
header('Location:alineacion.php?id='.$partido);
?>

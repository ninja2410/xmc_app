<?php
require_once('..\..\Negocio/ClassTemporada.php');
require_once('..\..\Negocio/ClassBitacora.php');
if(isset($_POST['operation']))
{
  $operacion=$_POST['operation'];
}

if(isset($_POST['fecha_inicio']))
{
  $fecha_inicio=$_POST['fecha_inicio'];
}

if(isset($_POST['descripcion'])){
  $descripcion=$_POST['descripcion'];
}

if(isset($_POST['fecha_final'])){
  $fecha_final=$_POST['fecha_final'];
}

if (isset($_POST['id'])) {
  $id_temporada=$_POST['id'];
}

$lesion=new Temporada();
$bit=new Bitacora();

if ($operacion=="1") 
{
  $lesion->insert($descripcion, $fecha_inicio, $fecha_final);
  $bit->insert('Agrego una nueva temporada ', '1');

}elseif($operacion=="2") 
{
  
  $lesion->update($id_temporada,$descripcion, $fecha_inicio, $fecha_final);
  $bit->insert('Actualizo la temporada '.$descripcion, '1');

}elseif ($operacion=="3") 
{
  $lesion->delete($id_temporada);
}
header('Location:index.php');
?>

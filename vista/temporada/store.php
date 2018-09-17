<?php
require_once('..\..\Negocio/ClassTemporada.php');
if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
echo json_encode($_POST);
if(isset($_POST['fecha_inicio'])){
  $fecha_inicio=$_POST['fecha_inicio'];
}

if(isset($_POST['fecha_final'])){
  $fecha_final=$_POST['fecha_final'];
}

if (isset($_POST['id'])) {
  $id_temporada=$_POST['id'];
}

$lesion=new Temporada();
if ($operacion=="1") 
{
  $lesion->insert($fecha_inicio, $fecha_final);

}elseif($operacion=="2") 
{
  
  $lesion->update($id_temporada, $fecha_inicio, $fecha_final);

}elseif ($operacion=="3") 
{
  $lesion->delete($id_temporada);
}
header('Location:index.php');
?>

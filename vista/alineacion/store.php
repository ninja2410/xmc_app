<?php
require_once('..\..\Negocio/ClassAlineacion.php');
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
  $lesion->insert($partido,$jugador,$posicion);
  echo 'insertado';
}elseif($operacion=="2")
{

  $lesion->update($id_alineacion,$partido,$jugador,$posicion);

}elseif ($operacion=="3")
{
  $lesion->delete($id_alineacion);
}
header('Location:alineacion.php?id='.$partido);
?>

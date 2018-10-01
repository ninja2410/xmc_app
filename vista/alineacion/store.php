<?php
require_once('..\..\Negocio/ClassAlineacion.php');
if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
echo json_encode($_POST);
if(isset($_POST['jugador'])){
  $jugador=$_POST['jugador'];
}

if(isset($_POST['mi'])){
  $mi=$_POST['mi'];
}
if(isset($_POST['mf'])){
  $mf=$_POST['mf'];
}
if(isset($_POST['partido'])){
  $partido=$_POST['partido'];
}
if(isset($_POST['g'])){
  $g=$_POST['g'];
}
if(isset($_POST['pas'])){
  $pas=$_POST['pas'];
}
if(isset($_POST['ta'])){
  $ta=$_POST['ta'];
}
if(isset($_POST['tr'])){
  $tr=$_POST['tr'];
}

if (isset($_POST['id'])) {
  $id_alineacion=$_POST['id'];
}

$lesion=new Alineacion();
if ($operacion=="1")
{
  $lesion->insert($g,$mi,$mf,$partido,$pas,$jugador,$ta,$tr);
  echo 'insertado';
}elseif($operacion=="2")
{

  $lesion->update($id_alineacion,$g,$mi,$mf,$partido,$pas,$jugador,$ta,$tr);

}elseif ($operacion=="3")
{
  $lesion->delete($id_alineacion);
}
header('Location:index.php');
?>

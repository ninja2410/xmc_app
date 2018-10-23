<?php
require_once('..\..\Negocio/ClassPartido.php');
if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
echo json_encode($_POST);
if(isset($_POST['fecha'])){
  $fecha=$_POST['fecha'];
}

if(isset($_POST['h1'])){
  $h1=$_POST['h1'];
}
if(isset($_POST['cat'])){
  $cat=$_POST['cat'];
}
if(isset($_POST['estadio'])){
  $estadio=$_POST['estadio'];
}
if(isset($_POST['ga'])){
  $ga=$_POST['ga'];
}
if(isset($_POST['gc'])){
  $gc=$_POST['gc'];
}
if(isset($_POST['equi'])){
  $equi=$_POST['equi'];
}
if(isset($_POST['temp'])){
  $temp=$_POST['temp'];
}

if(isset($_POST['h2'])){
  $h2=$_POST['h2'];
}

if(isset($_POST['estado'])){
  $estado=$_POST['estado'];
}

if(isset($_POST['obs'])){
  $obs=$_POST['obs'];
}
if(isset($_POST['estado_es'])){
  $estado_estadio=$_POST['estado_es'];
}
if(isset($_POST['clima'])){
  $clima=$_POST['clima'];
}
if (isset($_POST['id'])) {
  $id_partido=$_POST['id'];
}

$lesion=new Partido();
if ($operacion=="1")
{
  $lesion->insert($fecha, $h1, $cat, $estadio, $ga,$gc,$equi,$temp,$h2,$estado,$obs,$estado_estadio,$clima);
  $_SESSION['mensaje']="La estadística se ha almacenado con éxito!";
}elseif($operacion=="2")
{

  $lesion->update($id_partido, $fecha, $h1, $cat, $estadio, $ga,$gc,$equi,$temp,$h2,$estado,$obs,$estado_estadio,$clima);
  $_SESSION['mensaje']="La estadística se ha modificado con éxito!";
}elseif ($operacion=="3")
{
  $lesion->delete($id_partido);
  $_SESSION['mensaje']="La estadística se ha eliminado con éxito!";
}
header('Location:index.php');
?>

<?php
require_once('..\..\Negocio/ClassFichaMedica.php');
if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
echo json_encode($_POST);
if(isset($_POST['fecha'])){
  $fecha = date("Y/m/d", strtotime($_POST['fecha']));
}
if(isset($_POST['jugador'])){
  $id_jugador=$_POST['jugador'];
}
if(isset($_POST['status'])){
  if($_POST['status']=="on" || $_POST['status']=="1"){
    $estado=1;
  }
  else{
    $estado=0;
  }
}
if(isset($_POST['grasa'])){
    $grasa=$_POST['grasa'];
  }
  if(isset($_POST['peso'])){
    $peso=$_POST['peso'];
  }
  if(isset($_POST['talla'])){
    $talla=$_POST['talla'];
  }
if (isset($_POST['id'])) {
  $id_ficha=$_POST['id'];
}
$fichamedica=new FichaMedica();
if ($operacion=="1") {
  $fichamedica->insert($fecha, $estado, $id_jugador, $grasa, $peso, $talla);
}
elseif($operacion=="2") {
  $fichamedica->update($id_ficha, $fecha, $estado, $id_jugador, $grasa, $peso, $talla);
} elseif ($operacion=="3") {
  $fichamedica->delete($id_ficha);
}
header('Location:index.php');
?>

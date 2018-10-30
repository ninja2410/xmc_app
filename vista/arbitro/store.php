<?php
require_once('..\..\Negocio/ClassArbitro.php');
require_once('..\..\Negocio/ClassBitacora.php');
session_start();
$bit=new Bitacora();

if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
echo json_encode($_POST);
if(isset($_POST['nombre'])){
  $nombre=$_POST['nombre'];
}

if(isset($_POST['id_tipo_arbitro'])){
  $id_tipo_arbitro=$_POST['id_tipo_arbitro'];
}


if(isset($_POST['estado'])){
  $estado=$_POST['estado'];
}

if(isset($_POST['tipo'])){
  $tipo=$_POST['tipo'];
}

if (isset($_POST['id'])) {
  $id_arbitro=$_POST['id'];
}

if (isset($_POST['partido'])) {
  $id_partido=$_POST['partido'];
}

$accion=new Arbitro();
if ($operacion=="1") {
  $bit->insert('Agrego un arbitro', $_SESSION['id']);
  $accion->insert($nombre,$tipo);
  $_SESSION['mensaje']="El arbitro se ha almacenado con éxito!";
  header('Location:index.php');
}
elseif($operacion=="2") {
  $bit->insert('Actualizo la informacion del arbitro '.$id_arbitro, $_SESSION['id']);
  $_SESSION['mensaje']="El arbitro se ha actualizado con éxito!";
  $accion->update($id_arbitro, $nombre,$tipo);
  header('Location:index.php');

} elseif ($operacion=="3") {
  $bit->insert('Elimino a un arbitro', $_SESSION['id']);
  $_SESSION['mensaje']="El arbitro se ha eliminado con éxito!";
  $accion->delete($id_arbitro);
  header('Location:index.php');
}elseif ($operacion=="4") {
  $bit->insert('Elimino a un arbitro', $_SESSION['id']);
  $_SESSION['mensaje']="El arbitro se ha eliminado con éxito!";
  $accion->desasignar($id_arbitro);
  header('Location:arbitros.php?id='.$id_partido);
}
// header('Location:index.php');
?>

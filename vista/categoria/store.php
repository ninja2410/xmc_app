<?php
require_once('..\..\Negocio/ClassCategoria.php');
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

if(isset($_POST['descripcion'])){
  $descripcion=$_POST['descripcion'];
}
if(isset($_POST['estado'])){
  $estado=$_POST['estado'];
}

if (isset($_POST['id'])) {
  $id_categoria=$_POST['id'];
}
$accion=new Categoria();
if ($operacion=="1") {
  $bit->insert('Agrego una nueva categoria', $_SESSION['id']);
  $accion->insert($nombre, $descripcion);
  $_SESSION['mensaje']="La categoria se ha almacenado con éxito!";
}
elseif($operacion=="2") {
  $bit->insert('Se actualizo una categoria', $_SESSION['id']);
  $accion->update($id_categoria, $nombre, $descripcion, $estado);
  $_SESSION['mensaje']="La categoria se ha actualizado con éxito!";
}
elseif ($operacion=="3") {
  $bit->insert('Se elimino una categoria', $_SESSION['id']);
  $_SESSION['mensaje']="La categoria se ha eliminado con éxito!";
  $accion->delete($id_categoria);
}
header('Location:index.php');
?>

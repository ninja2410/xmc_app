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
}
elseif($operacion=="2") {
  $bit->insert('Se actualizo una categoria', $_SESSION['id']);
  $accion->update($id_categoria, $nombre, $descripcion, $estado);
}
elseif ($operacion=="3") {
  $bit->insert('Se elimino una categoria', $_SESSION['id']);
  $accion->delete($id_categoria);
}
header('Location:index.php');
?>

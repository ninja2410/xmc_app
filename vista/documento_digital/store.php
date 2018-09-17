<?php
move_uploaded_file($_FILES['img']['tmp_name'],'..\imagenes/'.$_FILES['img']['name']);
chmod('..\imagenes/'.$_FILES['img']['name'],0644);
require_once('..\..\Negocio/ClassDocumento.php');
$path='..\imagenes/'.$_FILES['img']['name'];
if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
echo json_encode($_POST);
if(isset($_POST['fecha'])){
  $fecha=$_POST['fecha'];
}

if(isset($_POST['descripcion'])){
  $descripcion=$_POST['descripcion'];
}
if(isset($_POST['categoria'])){
  $categoria=$_POST['categoria'];
}

if (isset($_POST['id'])) {
  $id_Documento=$_POST['id'];
}
$accion=new Documento();
if ($operacion=="1") {
  $accion->insert($fecha, 1, $path, $descripcion, $categoria);
}
elseif($operacion=="2") {
  $accion->update($id_Documento, $fecha, 1, $path, $descripcion, $categoria);
}
elseif ($operacion=="3") {
  $accion->delete($id_Documento);
}
header('Location:index.php');
 ?>

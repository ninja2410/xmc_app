<?php
require_once('..\..\Negocio/ClassDocumento.php');
$accion=new Documento();

if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
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


if ($operacion=="1") {
  $name=$_FILES['img']['name'];
  $path='DOC_'.$accion->correlativo().substr($name,-4);
  move_uploaded_file($_FILES['img']['tmp_name'],'..\imagenes/'.$path);
  chmod('..\imagenes/'.$path,0644);
  $accion->insert($fecha, 1, $path, $descripcion, $categoria);
}
elseif($operacion=="2") {
  $name=$_FILES['img']['name'];
  $tmp='DOC_'.$accion->correlativo().substr($name,-4);
  move_uploaded_file($_FILES['img']['tmp_name'],'..\imagenes/'.$tmp);
  chmod('..\imagenes/'.$tmp,0644);
  $path=$_FILES['img']['name'];
  if ($path=='') {
    $path=$_POST['path'];
  }
  else{
    $path=$tmp;
  }
  $accion->update($id_Documento, $fecha, 1, $path, $descripcion, $categoria);
}
elseif ($operacion=="3") {
  $accion->delete($id_Documento);
}
header('Location:index.php');
 ?>

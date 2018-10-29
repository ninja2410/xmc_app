<?php
require_once('..\..\Negocio/ClassDocumento.php');
require_once('..\..\Negocio/ClassBitacora.php');
session_start();
$bit=new Bitacora();

$accion=new Documento();

if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
if(isset($_POST['fecha'])){
  $dt_=$_POST['fecha'];
    $arr_=explode("/", $dt_);
    $fecha=$arr_[2].'-'. $arr_[1].'-'. $arr_[0];
}
if(isset($_POST['title'])){
  $titulo=$_POST['title'];
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
if (isset($_POST['id_entrenador'])) {
  $id_entrenador=$_POST['id_entrenador'];
}


if ($operacion=="1") {
  try {
    $bit->insert('Se subió un nuevo documento digital', $_SESSION['id']);
    $name=$_FILES['img']['name'];
    $path='DOC_E'.$accion->correlativo().substr($name,-4);
    move_uploaded_file($_FILES['img']['tmp_name'],'..\imagenes\doc_ent/'.$path);
    chmod('..\imagenes\doc_ent/'.$path,0644);
    $accion->insert_entrenador($fecha, 1, $path, $descripcion, $categoria, $titulo, $id_entrenador);
    $_SESSION['mensaje']="El documento se ha almacenado con éxito!";
  } catch (\Exception $e) {
    echo "Fallo: ".$e->getMessage();
  }


}
elseif($operacion=="2") {
  try {
    $bit->insert('Se modificó el documento digital'.$id_Documento, $_SESSION['id']);
    $name=$_FILES['img']['name'];
    if ($name=='') {
      $path=$_POST['path'];
    }
    else{
      $tmp='DOC_E'.$accion->correlativo().substr($name,-4);
      move_uploaded_file($_FILES['img']['tmp_name'],'..\imagenes\doc_ent/'.$tmp);
      chmod('..\imagenes\doc_ent/'.$tmp,0644);
      $path=$tmp;
    }
    $accion->update_entrenador($id_Documento, $fecha, 1, $path, $descripcion, $categoria, $titulo, $id_entrenador);
    $_SESSION['mensaje']="El documento se ha actualizado con éxito!";
  } catch (\Exception $e) {
    echo "Fallo: ".$e->getMessage();
  }
}
elseif ($operacion=="3") {
  try {
    $bit->insert('Se elimino un documento digital', $_SESSION['id']);
    $_SESSION['mensaje']="El documento se ha eliminado con éxito!";
    $accion->delete($id_Documento);
  } catch (\Exception $e) {
    echo "Error: ".$e->getMessage();
  }
}
header('Location:documentos.php?id='.$id_entrenador);
 ?>

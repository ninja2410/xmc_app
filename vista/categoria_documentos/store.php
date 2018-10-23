<?php
require_once('..\..\Negocio/ClassCategoriaDocumentos.php');
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
if(isset($_POST['status'])){
  if($_POST['status']=="on" || $_POST['status']=="1"){
    $estado=1;
  }
  else{
    $estado=0;
  }
}
if (isset($_POST['id'])) {
  $id_cat_documentos=$_POST['id'];
}
$catDocumentos=new CatDocumentos();
if ($operacion=="1") {
  $bit->insert('Agrego una nueva categoria de documentos', $_SESSION['id']);
  $catDocumentos->insert($estado, $nombre);
  $_SESSION['mensaje']="La categoría se ha almacenado con éxito!";
}
elseif($operacion=="2") {
  $bit->insert('Se modifico una categoria de documentos', $_SESSION['id']);
  $catDocumentos->update($id_cat_documentos, $estado, $nombre);
  $_SESSION['mensaje']="La categoría se ha modificado con éxito!";
} elseif ($operacion=="3") {
  $bit->insert('Elimino una categoria de documentos', $_SESSION['id']);
  $catDocumentos->delete($id_cat_documentos);
  $_SESSION['mensaje']="La categoría se ha eliminado con éxito!";
}
header('Location:index.php');
?>

<?php
require_once('..\..\Negocio/ClassCategoriaDocumentos.php');
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
  $catDocumentos->insert($estado, $nombre);
}
elseif($operacion=="2") {
  $catDocumentos->update($id_cat_documentos, $estado, $nombre);
} elseif ($operacion=="3") {
  $catDocumentos->delete($id_cat_documentos);
}
header('Location:index.php');
?> 

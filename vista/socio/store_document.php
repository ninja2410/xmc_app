<?php
require_once('../../Negocio/ClassDocumento.php');
require_once('../../Negocio/ClassBitacora.php');
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
if (isset($_POST['id_socio'])) {
  $id_socio=$_POST['id_socio'];
}


if ($operacion=="1") {
  try {
    $bit->insert('Se subio un nuevo documento digital', $_SESSION['id']);
    $name=$_FILES['img']['name'];
    $path='DOC_S'.$accion->correlativo().substr($name,-4);
    move_uploaded_file($_FILES['img']['tmp_name'],'../imagenes/doc_soc/'.$path);
    chmod('../imagenes/doc_soc/'.$path,0644);
    $accion->insert_socio($fecha, 1, $path, $descripcion, $categoria, $titulo, $id_socio);
    $_SESSION['mensaje']="El documento se ha almacenado con éxito!";
  } catch (\Exception $e) {
    echo "Fallo: ".$e->getMessage();
  }


}
elseif($operacion=="2") {
  try {
    $bit->insert('Se modifico el documento digital'.$id_Documento, $_SESSION['id']);
    $name=$_FILES['img']['name'];
    if ($name=='') {
      $path=$_POST['path'];
    }
    else{
      $tmp='DOC_J'.$accion->correlativo().substr($name,-4);
      move_uploaded_file($_FILES['img']['tmp_name'],'../imagenes/doc_soc/'.$tmp);
      chmod('../imagenes/doc_soc/'.$tmp,0644);
      $path=$tmp;
    }
    $accion->update_socio($id_Documento, 1, $path, $descripcion, $categoria, $titulo, $id_socio);
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
echo $id_socio;
header('Location:documentos.php?id='.$id_socio);
 ?>

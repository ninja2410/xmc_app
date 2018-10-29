<?php
require_once('..\..\Negocio/ClassNoticias.php');
require_once('..\..\Negocio/ClassImagenesNoticias.php');
require_once('..\..\Negocio/ClassBitacora.php');
session_start();
$bit=new Bitacora();

if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
if(isset($_POST['titulo'])){
  $titulo=$_POST['titulo'];
}
if(isset($_POST['contenido'])){
  $contenido=$_POST['contenido'];
}
if(isset($_POST['fecha'])){
  $fecha = date("Y/m/d", strtotime($_POST['fecha']));
}

if (isset($_SESSION['id'])) {
  $id_usuario=$_SESSION['id'];
}

if (isset($_POST['id'])) {
$id_noticia2=$_POST['id'];
}
if (isset($_POST['id_IMG'])) {
$id_IMG=$_POST['id_IMG'];
}

$noticia=new Noticia();
$imagen = new Imagenes();
if ($operacion=="1") {
  $bit->insert('Agrego una nuevo noticia', $_SESSION['id']);
  $id_noticia=$imagen->correlativo();
  $name=$_FILES['img']['name'];
  $foto='NOTICIA_'.$imagen->correlativo().substr($name,-4);
  move_uploaded_file($_FILES['img']['tmp_name'],'../imagenes/noticias/'.$foto);
  chmod('../imagenes/noticias/'.$foto,0644);

  $noticia->insert($titulo, $contenido, $fecha, $id_usuario);
  $imagen->insert($foto, $titulo, $fecha, $id_noticia);

  $_SESSION['mensaje']="La noticia se ha almacenado con exito!";
  header('Location:index.php');
}
elseif($operacion=="2") {
  $bit->insert('Actualizo la informacion de la noticia'.$id_noticia, $_SESSION['id']);
  $name=$_FILES['img']['name'];
  $tmp='NOTICIA_'.$id_noticia2.substr($name,-4);
  move_uploaded_file($_FILES['img']['tmp_name'],'../imagenes/noticias/'.$tmp);
  chmod('../imagenes/noticias/'.$tmp,0644);
  $foto=$_FILES['img']['name'];
  if ($foto=='') {
    $foto=$_POST['IMG'];
  }
  else{
    $foto=$tmp;
  }
  $noticia->update($id_noticia2,$titulo, $contenido, $fecha, $id_usuario);
  $imagen->update($id_IMG,$foto, $titulo, $fecha, $id_noticia2);
  
  $_SESSION['mensaje']="La noticia se ha modificado con éxito!";
  header('Location:index.php');
} elseif ($operacion=="3") {
  $jugador->delete($id_jugador);
  $_SESSION['mensaje']="La noticia se ha eliminado con éxito!";
  header('Location:index.php');
}
?>

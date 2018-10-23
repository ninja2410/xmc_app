<?php
require_once('..\..\Negocio/ClassMembresia.php');
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

if(isset($_POST['precio'])){
  $precio=$_POST['precio'];
}

if (isset($_POST['id'])) {
  $id_membresia=$_POST['id'];
}

$accion=new Membresia();
if ($operacion=="1") {
  $accion->insert($nombre, $descripcion, $precio);
  $bit->insert('Agrego una nueva membresia ', $_SESSION['id']);
  foreach($_POST as $key => $value)
  {

      if($value=='on')
      {

       echo $key;
       $accion->insertBeneficio($key);
      }


  }
  $_SESSION['mensaje']="La membresía se ha almacenado con éxito!";
}
elseif($operacion=="2")
{
  $bit->insert('Actualizo la membresia'.$id_membresia, $_SESSION['id']);
  $accion->update($id_membresia, $nombre, $descripcion, $precio);
  $accion->deleteBeneficio($id_membresia);

  foreach($_POST as $key => $value)
  {

      if($value=='on')
      {
      $accion->updateBeneficio($key,$id_membresia);
      }

  }
  $_SESSION['mensaje']="La membresía se ha modificado con éxito!";
}
elseif ($operacion=="3") {
  $accion->delete($id_membresia);
  $_SESSION['mensaje']="La membresía se ha eliminado con éxito!";
}
header('Location:index.php');
?>

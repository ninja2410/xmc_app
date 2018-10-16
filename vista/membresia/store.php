<?php
require_once('..\..\Negocio/ClassMembresia.php');

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

  foreach($_POST as $key => $value) 
  {
      
      if($value=='on')
      {
      
       echo $key;
       $accion->insertBeneficio($key);
      }

    
  }

}
elseif($operacion=="2") 
{
  $accion->update($id_membresia, $nombre, $descripcion, $precio);
  $accion->deleteBeneficio($id_membresia);

  foreach($_POST as $key => $value) 
  {

      if($value=='on')
      {
      $accion->updateBeneficio($key,$id_membresia);
      }

  }
}
elseif ($operacion=="3") {
  $accion->delete($id_membresia);
}
header('Location:index.php');
?>

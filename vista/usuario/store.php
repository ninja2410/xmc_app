<?php
require_once('..\..\Negocio/ClassUsuario.php');
require_once('..\..\Negocio/ClassBitacora.php');
session_start();
if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
echo json_encode($_POST);
$return_arr=array();

if(isset($_POST['id_us'])){
  $_POST['id_us'];

}

if(isset($_POST['usuario'])){
  $usuario=$_POST['usuario'];
}

if(isset($_POST['nombre'])){
  $nombre=$_POST['nombre'];
}

if(isset($_POST['apellido'])){
  $apellido=$_POST['apellido'];
}

if(isset($_POST['email'])){
  $email=$_POST['email'];
}

if(isset($_POST['pass'])){
  $pass=$_POST['pass'];
}

if (isset($_POST['id'])) {
  $id_usuario=$_POST['id'];
}

$lesion=new Usuario();
$bit=new Bitacora();
$cont=1;

if ($operacion=="1")
{
  $name=$_FILES['img']['name'];
  move_uploaded_file($_FILES['img']['tmp_name'],'../imagenes/'.$usuario.'.png');
  chmod('../imagenes/'.$usuario.'.png',0644);
  $lesion->insert($usuario, $pass,$nombre,$apellido,$usuario.'.png',$email);
  $bit->insert('Agrego un nuevo usuario', $_SESSION['id']);

  foreach($_POST as $key => $value)
  {

      echo "  '$key' = '$value'";


      if($value=='on')
      {
      $lesion->insertPermiso($key);
      }


  }

$_SESSION['mensaje']="El usuario se ha almacenado con éxito!";

}elseif($operacion=="2")
{
  $name=$_FILES['img']['name'];
  move_uploaded_file($_FILES['img']['tmp_name'],'../imagenes/'.$usuario);
  chmod('../imagenes/'.$usuario,0644);

  $lesion->update($id_usuario, $usuario, $pass,$nombre,$apellido,$usuario,$email);
  $bit->insert('Actualizo el usuario '.$id_usuario, $_SESSION['id']);

  foreach($_POST as $key => $value)
  {

      if($value=='on')
      {
      $lesion->updatePermiso($key,$id_usuario);
      }

  }
$_SESSION['mensaje']="El usuario se ha modificado con éxito!";
}elseif($operacion=="4")
{

  $lesion->deletePermisos($id_usuario);
  $bit->insert('Modificaron los permisos al usuario '.$id_usuario, '1');

  foreach($_POST as $key => $value)
  {

      if($value=='on')
      {
      $lesion->updatePermiso($key,$id_usuario);
      }

  }
$_SESSION['mensaje']="El usuario se ha modificado con éxito!";
}
elseif ($operacion=="3")
{
  $lesion->delete($id_usuario);
  $_SESSION['mensaje']="El usuario se ha eliminado con éxito!";
}

header('Location:index.php');
?>

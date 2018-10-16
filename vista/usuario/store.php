<?php
require_once('..\..\Negocio/ClassUsuario.php');
require_once('..\..\Negocio/ClassBitacora.php');
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
  move_uploaded_file($_FILES['img']['tmp_name'],'../imagenes/'.$name);
  chmod('../imagenes/'.$name,0644);
  $lesion->insert($usuario, $pass,$nombre,$apellido,$name,$email);
  $bit->insert('Agrego un nuevo usuario', '1');

  foreach($_POST as $key => $value) 
  {

      echo "  '$key' = '$value'";
      
      
      if($value=='on')
      {
      $lesion->insertPermiso($key);
      }

    
  }



}elseif($operacion=="2") 
{

  $lesion->update($id_usuario, $usuario, $pass,$nombre,$apellido,'',$email);
  $lesion->deletePermisos($id_usuario);
  $bit->insert('Actualizo el usuario '.$id_usuario, '1');

  foreach($_POST as $key => $value) 
  {

      if($value=='on')
      {
      $lesion->updatePermiso($key,$id_usuario);
      }

  }

}
elseif ($operacion=="3") 
{
  $lesion->delete($id_usuario);
}

header('Location:index.php');
?>

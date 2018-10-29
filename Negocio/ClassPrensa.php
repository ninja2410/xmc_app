<?php
require_once('..\..\Conexion\conexion.php');

class Prensa
{

  private $query;
  public function insert($nombre, $apellido, $telefono, $empresa){
    $query="CALL SP_PRENSA_INSERT('$nombre', '$apellido','$telefono', '$empresa');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $nombre, $apellido,
  $telefono, $empresa){
    $query="CALL SP_PRENSA_UPDATE($id,'$nombre','$apellido','$telefono', '$empresa');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_PRENSA_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * FROM PRENSA WHERE estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM PRENSA WHERE id_prensa=$id AND estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

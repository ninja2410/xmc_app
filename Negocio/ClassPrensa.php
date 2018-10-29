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

  public function selectPrensa($id){
    $conexion=new conexion();
    $conexion->conectar();
      $query="SELECT PP.id_partido,PP.id_prensa,CONCAT(PR.nombre,CONCAT(' ',PR.apellido )) as nombre, PR.telefono,PR.id_prensa,PR.empresa FROM ASIGNACION_PRENSA PP
      INNER JOIN PRENSA PR ON PP.id_prensa = PR.id_prensa where PP.id_partido=$id";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    $conexion->desconectar();
    return $dt;
  }

  public function asignar($par,$pre)
  {
      $query="CALL SP_ASIGNACION_PRENSA_INSERT('$par','$pre');";
      $bd= new conexion();
      $dt=$bd->execute_query($query);
  return $dt;
  }

}
 ?>

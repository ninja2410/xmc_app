<?php
require_once('..\..\Conexion\conexion.php');
/**
 * Arbitro
 */
class Arbitro
{

  private $query;
  public function insert($nombre,$apellidos, $id_tipo_arbitro){
    $query="CALL SP_ARBITRO_INSERT('$nombre','$apellidos', $id_tipo_arbitro);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $nombre,$apellidos, $id_tipo_arbitro){
    $query="CALL SP_ARBITRO_UPDATE($id,'$nombre','$apellidos', $id_tipo_arbitro, $estado);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_ARBITRO_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT arbitro.id_arbitro, arbitro.nombre, arbitro.apellidos, tipo_arbitro.descripcion FROM arbitro,tipo_arbitro 
      WHERE arbitro.estado = 1 and arbitro.id_tipo_arbitro = tipo_arbitro.id_tipo_arbitro";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM arbitro WHERE id_arbitro=$id AND estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

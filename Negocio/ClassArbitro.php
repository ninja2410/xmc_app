<?php
require_once('..\..\Conexion\conexion.php');
/**
 * Arbitro
 */
class Arbitro
{

  private $query;
  public function insert($nombre, $id_tipo_arbitro){
    $query="CALL SP_ARBITRO_INSERT('$nombre', $id_tipo_arbitro);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $nombre, $id_tipo_arbitro){
    $query="CALL SP_ARBITRO_UPDATE($id,'$nombre', $id_tipo_arbitro);";
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
      $query="SELECT A.id_arbitro, A.nombre,T.descripcion FROM ARBITRO A,TIPO_ARBITRO T WHERE A.estado = 1 and A.id_tipo_arbitro = T.id_tipo_arbitro";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM ARBITRO WHERE id_arbitro=$id AND estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>
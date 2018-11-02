<?php
require_once('../../Conexion/conexion.php');
/**
 * AsignacionEntrenador
 */
class AsignacionEntrenador
{

  private $query;
  public function insert($id_categoria, $id_entrenador){
    $query="CALL SP_ASIGNACION_ENTRENADOR_INSERT($id_categoria,$id_entrenador);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $id_categoria, $id_entrenador){
    $query="CALL SP_ASIGNACION_ENTRENADOR_UPDATE($id,$id_categoria,$id_entrenador);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_ASIGNACION_ENTRENADOR_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * FROM ASIGNACION_ENTRENADOR WHERE estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM ASIGNACION_ENTRENADOR WHERE id_asignacion_entrenador=$id AND estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>
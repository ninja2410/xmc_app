<?php
require_once('../../Conexion/conexion.php');
/**
 * AsignacionPrensa
 */
class AsignacionPrensa
{

  private $query;
  public function insert($id_partido, $id_prensa){
    $query="CALL SP_ASIGNACION_PRENSA_INSERT( $id_partido,$id_prensa);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $id_partido, $id_prensa){
    $query="CALL SP_ASIGNACION_PRENSA_UPDATE($id,$id_partido,$id_prensa);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_ASIGNACION_PRENSA_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * FROM ASIGNACION_PRENSA WHERE estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM ASIGNACION_PRENSA WHERE id_asignacion_prensa=$id AND estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>
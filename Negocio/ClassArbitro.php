<?php
require_once('../../Conexion/conexion.php');
/**
 * Arbitro
 */
class Arbitro
{

  private $query;
  public function insert($nombre,$tipo){
    $query="CALL SP_ARBITRO_INSERT('$nombre','$tipo');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function asignar($nombre,$tipo){
    $query="CALL SP_ASIGNACION_ARBITRO_INSERT('$nombre','$tipo');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function desasignar($id){
    $query="CALL SP_ASIGNACION_ARBITRO_DELETE('$id');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $nombre,$tipo){
    $query="CALL SP_ARBITRO_UPDATE($id,'$nombre','$tipo');";
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
      $query="SELECT * FROM ARBITRO  WHERE estado = 1";
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

  public function selectArbitros($id)
  {
    $conexion=new conexion();
    $conexion->conectar();
    
      $query="SELECT A.nombre, A.tipo,AA.id_arbitro,AA.id_partido, AA.id_asignacion_arbitro,AA.estado FROM ASIGNACION_ARBITRO AA 
      INNER JOIN ARBITRO A ON AA.id_arbitro=A.id_arbitro WHERE AA.id_partido = $id and AA.estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

<?php
require_once('../../Conexion/conexion.php');
/**
 * Falla
 */
class DetFalla
{

  private $query;
  public function insert($sancion, $fecha, $id_falla, $id_jugador){
    $query="CALL SP_DESCRIPCION_FALLA_INSERT('$sancion', '$fecha', $id_falla, $id_jugador);";
    $bd= new conexion();
    $dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $sancion, $fecha, $id_falla, $id_jugador){
    $query="CALL SP_DESCRIPCION_FALLA_UPDATE($id, '$sancion', '$fecha', $id_falla, $id_jugador);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_DESCRIPCION_FALLA_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function correlativo(){
    $query="SELECT coalesce(MAX(id_falla)+1, 1) as x from FALLA;";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
    $id=mysqli_fetch_array($dt);
    return $id[0];
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT F.id_falla, F.descripcion, DF.id_descripcion_falla, DF.sancion, DF.fecha, J.id_jugador, CONCAT(J.nombre,' ', J.apellido) AS jugador
      FROM DESCRIPCION_FALLA DF, FALLA F, JUGADOR J where DF.estado=1 AND J.estado=1 AND F.estado=1 AND DF.id_falla=F.id_falla AND DF.id_jugador=J.id_jugador;";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT F.id_falla, F.descripcion, DF.id_descripcion_falla, DF.sancion, DF.fecha, J.id_jugador, CONCAT(J.nombre,' ', J.apellido) AS jugador
      FROM DESCRIPCION_FALLA DF, FALLA F, JUGADOR J where DF.estado=1 AND J.estado=1 AND F.estado=1 AND DF.id_falla=F.id_falla AND DF.id_jugador=J.id_jugador AND DF.id_descripcion_falla=$id;";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

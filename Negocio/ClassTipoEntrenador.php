<?php
require_once('../../Conexion/conexion.php');
/**
 * Tipo de entrenador
 */
class TipoEntrenador
{

  private $query;
  public function insert($descripcion, $estado){
    $query="CALL SP_TIPO_ENTRENADOR_INSERT('$descripcion', $estado);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $descripcion, $estado){
    $query="CALL SP_TIPO_ENTRENADOR_UPDATE($id, '$descripcion', $estado);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_TIPO_ENTRENADOR_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * from TIPO_ENTRENADOR where estado =1;";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * from TIPO_ENTRENADOR where estado =1 and idtipoentrenador=$id;";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

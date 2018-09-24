<?php
require_once('..\..\Conexion\conexion.php');
/**
 * Tipo de arbitro
 */
class TipoArbitro
{

  private $query;
  public function insert($descripcion, $estado){
    $query="CALL SP_TIPO_ARBITRO_INSERT('$descripcion', $estado);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $descripcion, $estado){
    $query="CALL SP_TIPO_ARBITRO_UPDATE($id, '$descripcion', $estado);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_TIPO_ARBITRO_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * from tipo_arbitro where estado =1;";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * from tipo_arbitro where estado =1 and id_tipo_arbitro=$id;";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

<?php
require_once('../../Conexion/conexion.php');
/**
 * Falla
 */
class Falla
{

  private $query;
  public function insert($descripcion){
    $query="CALL SP_FALLA_INSERT('$descripcion');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $descripcion){
    $query="CALL SP_FALLA_UPDATE($id, '$descripcion');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_FALLA_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * FROM FALLA WHERE estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM FALLA WHERE id_falla=$id AND estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

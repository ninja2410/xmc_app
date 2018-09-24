<?php
require_once('..\..\Conexion\conexion.php');
/**
 * LESION DE JUGADORES
 */
class Lesion
{

  private $query;
  public function insert($nombre, $descripcion, $estado){
    $query="CALL SP_LESION_INSERT('$nombre', '$descripcion', $estado);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $nombre, $desc, $estado){
    $query="CALL SP_LESION_UPDATE($id,'$nombre', '$desc', $estado);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_LESION_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * FROM lesion WHERE estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM lesion WHERE id_lesion=$id AND estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

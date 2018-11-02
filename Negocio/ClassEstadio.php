<?php
require_once('../../Conexion/conexion.php');
/**
 * Estadio
 */
class Estadio
{

  private $query;
  public function insert($nombre, $direccion, $telefono, $ciudad){
    $query="CALL SP_ESTADIO_INSERT('$nombre', '$direccion', '$telefono', '$ciudad');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $nombre, $direccion, $telefono, $ciudad){
    $query="CALL SP_ESTADIO_UPDATE($id,'$nombre', '$direccion', '$telefono', '$ciudad');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_ESTADIO_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * FROM ESTADIO WHERE estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM ESTADIO WHERE id_estadio=$id AND estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

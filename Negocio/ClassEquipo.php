<?php
require_once('..\..\Conexion\conexion.php');
/**
 * Equipo
 */
class Equipo
{

  private $query;
  public function insert($nombre, $procedencia){
    $query="CALL SP_EQUIPO_INSERT('$nombre', '$procedencia');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $nombre, $procedencia,  $estado){
    $query="CALL SP_EQUIPO_UPDATE($id,'$nombre', '$procedencia', $estado);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_EQUIPO_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * FROM EQUIPO WHERE estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM EQUIPO WHERE id_equipo=$id AND estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

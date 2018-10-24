<?php
require_once('..\..\Conexion\conexion.php');
/**
 * Equipo
 */
class Equipo
{

  private $query;
  public function insert($nombre, $procedencia,$foto){
    $query="CALL SP_EQUIPO_INSERT('$nombre', '$procedencia','$foto');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function correlativo(){
    $query="SELECT coalesce(MAX(id_equipo)+1, 1) as x from EQUIPO;";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
    $id=mysqli_fetch_array($dt);
    return $id[0];
  }

  public function update($id, $nombre, $procedencia,  $foto){
    $query="CALL SP_EQUIPO_UPDATE($id,'$nombre', '$procedencia', '$foto');";
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

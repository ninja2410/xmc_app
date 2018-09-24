<?php
require_once('..\..\Conexion\conexion.php');
/**
 * Ficha Medica
 */
class Jugador
{
  private $query;
  public function insert($nombre, $direccion, $fecha_nacimiento, $estado, $padre, $madre, $telefono, $procedencia, $apellido, $foto){
    $query="CALL SP_JUGADOR_INSERT('$nombre', '$direccion', '$fecha_nacimiento', $estado, '$padre', '$madre', $telefono, '$procedencia', '$apellido', '$foto');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $nombre, $direccion, $fecha_nacimiento, $estado, $padre, $madre, $telefono, $procedencia, $apellido, $foto){
    $query="CALL SP_JUGADOR_UPDATE($id,'$nombre', '$direccion', '$fecha_nacimiento', $estado, '$padre', '$madre', $telefono, '$procedencia', '$apellido', '$foto');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_JUGADOR_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * FROM jugador WHERE estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM jugador WHERE id_jugador=$id AND estado=1;";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

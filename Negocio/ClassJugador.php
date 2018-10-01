<?php
require_once('..\..\Conexion\conexion.php');
/**
 * Ficha Medica
 */
class Jugador
{
  private $query;
  public function insert($nombre, $direccion, $fecha_nacimiento, $estado, $padre, $madre, $telefono, $procedencia, $apellido, $foto, $id_posicion, $camisola,$id_contrato){
    $query="CALL SP_JUGADOR_INSERT('$nombre', '$direccion', '$fecha_nacimiento', $estado, '$padre', '$madre', $telefono, '$procedencia', '$apellido', '$foto', $id_posicion, $camisola, $id_contrato);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $nombre, $direccion, $fecha_nacimiento, $estado, $padre, $madre, $telefono, $procedencia, $apellido, $foto, $id_posicion, $camisola,$id_contrato){
    $query="CALL SP_JUGADOR_UPDATE($id,'$nombre', '$direccion', '$fecha_nacimiento', $estado, '$padre', '$madre', $telefono, '$procedencia', '$apellido', '$foto', $id_posicion, $camisola, $id_contrato);";
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
      $query="SELECT * FROM JUGADOR WHERE estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT J.id_jugador, J.nombre, J.direccion, J.fecha_nacimiento, J.estado, J.padre, J.madre, J.telefono, J.procedencia, J.apellido, J.foto, J.id_posicion, P.descripcion, J.camisola, J.id_contrato FROM JUGADOR J, POSICION P WHERE id_jugador=$id AND J.estado=1 AND J.id_posicion=P.id_posicion;";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

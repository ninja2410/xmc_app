<?php
require_once('..\..\Conexion\conexion.php');
/**
 * MEDICO DE JUGADORES
 */
class Entrenador
{

  private $query;
  public function insert($nombre, $apellido, $fecha_nacimiento, $fecha_inicio, $fecha_fin, $telefono, $direccion, $idtipoentrenador){
    $query="CALL SP_ENTRENADOR_INSERT('$nombre', '$apellido', '$fecha_nacimiento', '$fecha_inicio',
    '$fecha_fin', $telefono, '$direccion', '$idtipoentrenador');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $nombre, $apellido, $f_nacimiento, $f_inicio, $f_fin,
   $estado, $direccion, $telefono){
    $query="CALL SP_ENTRENADOR_UPDATE($id,'$nombre', '$apellido', '$f_nacimiento', '$f_inicio',
    '$f_fin','$direccion', '$telefono');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_ENTRENADOR_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * FROM entrenador WHERE estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM entrenador WHERE identrenador=$id AND estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

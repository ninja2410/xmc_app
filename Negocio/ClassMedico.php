<?php
require_once('..\..\Conexion\conexion.php');
/**
 * MEDICO DE JUGADORES
 */
class Medico
{

  private $query;
  public function insert($nombre, $apellido, $f_nacimiento, $f_inicio, $f_final,
   $estado, $direccion, $telefono){
    $query="CALL SP_MEDICO_INSERT('$nombre', '$apellido', '$f_nacimiento', '$f_inicio',
    '$f_final', $estado, '$direccion', '$telefono');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $nombre, $apellido, $f_nacimiento, $f_inicio, $f_final,
   $estado, $direccion, $telefono){
    $query="CALL SP_MEDICO_UPDATE($id,'$nombre', '$apellido', '$f_nacimiento', '$f_inicio',
    '$f_final', $estado, '$direccion', '$telefono');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_MEDICO_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * FROM medico WHERE estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM medico WHERE id_medico=$id AND estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

<?php
require_once('..\..\Conexion\conexion.php');
/**
 * Entrenador
 */
class Entrenador
{

  private $query;
  public function insert($nombre, $apellido, $fecha_nacimiento, $fecha_inicio, $fecha_fin, $telefono, $direccion, $id_tipo_entrenador){
    $query="CALL SP_ENTRENADOR_INSERT('$nombre', '$apellido', '$fecha_nacimiento', '$fecha_inicio',
    '$fecha_fin', $telefono, '$direccion', $id_tipo_entrenador);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $nombre, $apellido, $f_nacimiento, $f_inicio, $f_fin,
   $estado, $telefono, $direccion, $id_tipo_entrenador){
    $query="CALL SP_ENTRENADOR_UPDATE($id,'$nombre', '$apellido', '$f_nacimiento', '$f_inicio',
    '$f_fin',$estado,'$telefono', '$direccion',$id_tipo_entrenador);";
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
      $query = "SELECT id_entrenador,nombre,apellido,fecha_nacimiento,fecha_inicio,fecha_fin,telefono,direccion,
      TIPO_ENTRENADOR.descripcion FROM ENTRENADOR,TIPO_ENTRENADOR WHERE ENTRENADOR.estado = 1 AND ENTRENADOR.id_tipo_entrenador =
      TIPO_ENTRENADOR.id_tipo_entrenador";
      //$query="SELECT * FROM entrenador WHERE estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM ENTRENADOR WHERE id_entrenador=$id AND estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

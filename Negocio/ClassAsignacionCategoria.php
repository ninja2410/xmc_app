<?php
require_once('../../Conexion/conexion.php');
/**
 * Asignacion Categoria
 */
class AsignacionCategoria
{

  private $query;
  public function insert($fecha_inicio,$fecha_final,$id_categoria,$id_jugador,$id_equipo){
    $query="CALL SP_ASIGNACION_CATEGORIA_INSERT('$fecha_inicio','$fecha_final',$id_categoria,$id_jugador,$id_equipo);";
    $bd= new conexion();
    $dt=$bd->execute_query($query);
    echo $query;
    return $dt;
  }

  public function update($id, $fecha_inicio,$fecha_final,$id_categoria,$id_jugador,$id_equipo){
    $query="CALL SP_ASIGNACION_CATEGORIA_UPDATE($id,'$fecha_inicio','$fecha_final',$id_categoria,$id_jugador,$id_equipo);";
    $bd= new conexion();
    $dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_ASIGNACION_CATEGORIA_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * FROM ASIGNACION_CATEGORIA WHERE estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM ASIGNACION_CATEGORIA WHERE id_asignacion_categoria=$id AND estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>
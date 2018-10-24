<?php
require_once('..\..\Conexion\conexion.php');
/**
 * Entrenador
 */
class Entrenador
{

  private $query;
  public function insert($nombre, $apellido, $fecha_nacimiento, $fecha_inicio, $fecha_fin, $telefono, $direccion,$foto,$nacionalidad){
    $query="CALL SP_ENTRENADOR_INSERT('$nombre', '$apellido', '$fecha_nacimiento', '$fecha_inicio',
    '$fecha_fin', '$telefono', '$direccion','$foto','$nacionalidad');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $nombre, $apellido, $fecha_nacimiento, $fecha_inicio, $fecha_fin, $telefono, $direccion,$foto,$nacionalidad){
    $query="CALL SP_ENTRENADOR_UPDATE($id,'$nombre', '$apellido', '$fecha_nacimiento', '$fecha_inicio',
    '$fecha_fin', '$telefono', '$direccion','$foto','$nacionalidad');";
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


  public function correlativo(){
    $query="SELECT coalesce(MAX(id_entrenador)+1, 1) as x from ENTRENADOR;";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
    $id=mysqli_fetch_array($dt);
    return $id[0][0];
  }


  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      // $query = "SELECT * FROM ENTRENADOR WHERE estado = 1";
      $query = "SELECT E.id_entrenador,E.nombre,E.apellido,E.foto,C.nombre CATEGORIA FROM ENTRENADOR E, CATEGORIA C, ASIGNACION_ENTRENADOR AE WHERE E.estado = 1 AND E.id_entrenador = AE.id_entrenador AND
      AE.id_categoria = C.id_categoria";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT E.id_entrenador,E.nombre,E.apellido,E.fecha_nacimiento,E.fecha_inicio,E.fecha_fin,E.telefono,E.direccion,E.foto,E.nacionalidad,C.nombre CATEGORIA FROM ENTRENADOR E, CATEGORIA C, ASIGNACION_ENTRENADOR AE WHERE E.id_entrenador=$id AND E.estado=1 AND E.id_entrenador = AE.id_entrenador AND
      AE.id_categoria = C.id_categoria;";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

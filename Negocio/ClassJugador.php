<?php
require_once('../../Conexion/conexion.php');
if (session_status() == PHP_SESSION_NONE) 
{
  session_start();
}

/**
 * Jugador
 */
class Jugador
{
  private $query;
  public function insert($nombre, $direccion, $fecha_nacimiento, $estado, $padre, $madre, $telefono, $procedencia, $apellido, $foto, $id_posicion, $camisola,$sangre){
    $query="CALL SP_JUGADOR_INSERT('$nombre', '$direccion', '$fecha_nacimiento', $estado, '$padre', '$madre', $telefono, '$procedencia', '$apellido', '$foto', $id_posicion, $camisola, '$sangre');";
    $bd= new conexion();
    $dt=$bd->execute_query($query);
  	return $dt;
  }

  public function update($id, $nombre, $direccion, $fecha_nacimiento, $estado, $padre, $madre, $telefono, $procedencia, $apellido, $foto, $id_posicion, $camisola,$sangre){
    $query="CALL SP_JUGADOR_UPDATE($id,'$nombre', '$direccion', '$fecha_nacimiento', $estado, '$padre', '$madre', $telefono, '$procedencia', '$apellido', '$foto', $id_posicion, $camisola, '$sangre');";
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

  public function correlativo(){
    $query="SELECT coalesce(MAX(id_jugador)+1, 1) as x from JUGADOR;";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
    $id=mysqli_fetch_array($dt);
    return $id[0];
  }

  public function selectPartido($partido){
    $query="SELECT A.id_jugador, nombre, descripcion FROM JUGADOR
      INNER JOIN ALINEACION A on JUGADOR.id_jugador = A.id_jugador
      INNER JOIN POSICION P on A.id_posicion = P.id_posicion
      WHERE id_partido=$partido;";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
    return $dt;
  }

  public function selectTemporada(){
    $query="SELECT J.id_jugador, CONCAT(J.nombre,' ' ,J.apellido) nombre, P.descripcion ,CC.nombre CAT FROM JUGADOR J
      INNER JOIN ASIGNACION_CATEGORIA C ON J.id_jugador=C.id_jugador
      INNER JOIN CATEGORIA CC ON CC.id_categoria=C.id_categoria
      INNER JOIN POSICION P ON J.id_posicion=P.id_posicion
      WHERE J.estado=1;";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
    return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if($_SESSION['cat']!=0)
    {
      if ($id==-1) {
        $query="SELECT J.id_jugador,C.id_categoria, CONCAT(J.nombre,' ',J.apellido) as Nombre, C.nombre FROM ASIGNACION_CATEGORIA AC, CATEGORIA C, JUGADOR J WHERE AC.estado=1 and C.estado=1 and J.estado=1 and AC.id_categoria = C.id_categoria and AC.id_jugador = J.id_jugador and C.id_categoria =".$_SESSION['cat'].";";
        $dt=mysqli_query($conexion->objetoconexion,$query);
      }
      else{
        $query="SELECT J.id_jugador, J.nombre, J.direccion, J.fecha_nacimiento, J.estado, J.padre, J.madre, J.telefono, J.procedencia, J.apellido, J.sangre,
        J.foto, J.id_posicion, P.descripcion, J.camisola,C.id_categoria as IdCat, C.nombre as categoria, AC.fecha_inicio, AC.fecha_final, AC.id_asignacion_categoria
        FROM ASIGNACION_CATEGORIA AC, CATEGORIA C,JUGADOR J, POSICION P
        WHERE J.id_jugador=$id AND AC.estado=1 and C.estado=1 and J.estado=1 and P.estado=1 AND J.id_posicion=P.id_posicion
        and AC.id_categoria = C.id_categoria and AC.id_jugador = J.id_jugador and C.id_categoria =".$_SESSION['cat'].";";
        $tmp=mysqli_query($conexion->objetoconexion,$query);
        $dt=mysqli_fetch_assoc($tmp);
      }
    }else
    {
      if ($id==-1) {
        $query="SELECT J.id_jugador,C.id_categoria, CONCAT(J.nombre,' ',J.apellido) as Nombre, C.nombre FROM ASIGNACION_CATEGORIA AC, CATEGORIA C, JUGADOR J WHERE AC.estado=1 and C.estado=1 and J.estado=1 and AC.id_categoria = C.id_categoria and AC.id_jugador = J.id_jugador;";
        $dt=mysqli_query($conexion->objetoconexion,$query);
      }
      else{
        $query="SELECT J.id_jugador, J.nombre, J.direccion, J.fecha_nacimiento, J.estado, J.padre, J.madre, J.telefono, J.procedencia, J.apellido, J.sangre,
        J.foto, J.id_posicion, P.descripcion, J.camisola,C.id_categoria as IdCat, C.nombre as categoria, AC.fecha_inicio, AC.fecha_final, AC.id_asignacion_categoria
        FROM ASIGNACION_CATEGORIA AC, CATEGORIA C,JUGADOR J, POSICION P
        WHERE J.id_jugador=$id AND AC.estado=1 and C.estado=1 and J.estado=1 and P.estado=1 AND J.id_posicion=P.id_posicion
        and AC.id_categoria = C.id_categoria and AC.id_jugador = J.id_jugador;";
        $tmp=mysqli_query($conexion->objetoconexion,$query);
        $dt=mysqli_fetch_assoc($tmp);
      }
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

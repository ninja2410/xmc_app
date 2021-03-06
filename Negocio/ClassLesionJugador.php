<?php
require_once('../../Conexion/conexion.php');
/**
 * LESIONES DE JUGADORES
 */
class LesionJugador
{

    private $query;
    public function insert($f_inicio, $f_recu, $estado, $motivo, $id_jugador, $id_lesion, $id_medico, $observaciones, $costo){
      $query="CALL SP_LESIONJUGADOR_INSERT('$f_inicio', '$f_recu', $estado, '$motivo', $id_jugador, $id_lesion, $id_medico, '$observaciones', $costo);";
      $bd= new conexion();
  		$dt=$bd->execute_query($query);
  		return $dt;
    }

    public function update($id, $f_inicio, $f_recu, $estado, $motivo, $id_jugador, $id_lesion, $id_medico, $observaciones, $costo){
      $query="CALL SP_LESIONJUGADOR_UPDATE($id,'$f_inicio', '$f_recu', $estado, '$motivo', $id_jugador, $id_lesion, $id_medico, '$observaciones', $costo);";
      $bd= new conexion();
  		$dt=$bd->execute_query($query);
  		return $dt;
    }

    public function detalle(){
      $query="SELECT id_lesion_jugador ID, L.nombre LESION, concat(J.nombre, ' ', apellido) JUGADOR, fecha_inicio FECHA, costo COSTO, motivo MOTIVO,
      observacion  FROM LESION_JUGADOR
      INNER JOIN JUGADOR J on LESION_JUGADOR.id_jugador = J.id_jugador
      INNER JOIN LESION L on LESION_JUGADOR.id_lesion = L.id_lesion WHERE LESION_JUGADOR.estado=1;";
      $bd= new conexion();
  		$dt=$bd->execute_query($query);
  		return $dt;
    }

    public function delete($id){
      $query="CALL SP_LESIONJUGADOR_DELETE($id);";
      $bd= new conexion();
  		$dt=$bd->execute_query($query);
  		return $dt;
    }
    public function id(){
      $query="SELECT coalesce(MAX(id_lesion_jugador), 1) x FROM LESION_JUGADOR;";
      $bd= new conexion();
  		$dt=$bd->execute_query($query);
      foreach ($dt as $key => $value) {
        $rsp=$value['x'];
      }
  		return $rsp;
    }
    public function select($id){
      $conexion=new conexion();
      $conexion->conectar();
      if ($id==-1) {
        $query="SELECT * FROM LESION_JUGADOR WHERE estado=1";
        $dt=mysqli_query($conexion->objetoconexion,$query);
      }
      else{
        $query="SELECT LESION_JUGADOR.fecha_inicio, fecha_final, id_lesion_jugador, LESION_JUGADOR.id_lesion, LESION.nombre,
          LESION_JUGADOR.id_medico, concat(MEDICO.nombre, ' ', MEDICO.apellido) medico, LESION_JUGADOR.id_jugador,
                CONCAT(JUGADOR.nombre, ' ', JUGADOR.apellido) JUGADOR, costo, motivo, observacion
          FROM LESION_JUGADOR
          INNER JOIN LESION ON LESION.id_lesion=LESION_JUGADOR.id_lesion
          INNER JOIN MEDICO ON MEDICO.id_medico=LESION_JUGADOR.id_medico
          INNER JOIN JUGADOR ON LESION_JUGADOR.id_jugador=JUGADOR.id_jugador
          WHERE id_lesion_jugador=$id AND LESION_JUGADOR.estado=1";
        $tmp=mysqli_query($conexion->objetoconexion,$query);
        $dt=mysqli_fetch_assoc($tmp);
      }
      $conexion->desconectar();
      return $dt;
    }
}

 ?>

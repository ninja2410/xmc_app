<?php
/**
 * LESIONES DE JUGADORES
 */
class LesionJugador
{

    private $query;
    public function insert($f_inicio, $f_recu, $estado, $motivo, $id_jugador, $id_lesion, $id_medico, $observaciones){
      $query="CALL SP_LESIONJUGADOR_INSERT('$f_inicio', '$f_recu', $estado, '$motivo', $id_jugador, $id_lesion, $id_medico, '$observaciones');";
      $bd= new conexion();
  		$dt=$bd->execute_query($query);
  		return $dt;
    }

    public function update($id, $f_inicio, $f_recu, $estado, $motivo, $id_jugador, $id_lesion, $id_medico, $observaciones){
      $query="CALL SP_LESIONJUGADOR_UPDATE($id,'$f_inicio', '$f_recu', $estado, '$motivo', $id_jugador, $id_lesion, $id_medico, '$observaciones');";
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

    public function select($id){
      $conexion=new conexion();
      $conexion->conectar();
      if ($id==-1) {
        $query="SELECT * FROM LESION_JUGADOR WHERE estado=1";
        $dt=mysqli_query($conexion->objetoconexion,$query);
      }
      else{
        $query="SELECT * FROM LESION_JUGADOR WHERE id_lesion=$id AND estado=1";
        $tmp=mysqli_query($conexion->objetoconexion,$query);
        $dt=mysqli_fetch_assoc($tmp);
      }
      $conexion->desconectar();
      return $dt;
    }
}

 ?>

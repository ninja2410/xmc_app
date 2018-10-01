<?php
require_once('..\..\Conexion\conexion.php');
/**
 *
 */
class EstadisticaJugador
{
  private $query;
  public function insert($id_dato, $minuto, $valor, $estado, $id_jugador, $id_partido){
    $query="INSERT INTO ESTADISTICA_JUGADOR(id_dato_partido, minuto, valor, estado, id_jugador, id_partido)
    VALUES($id_dato, $minuto, $valor, $estado, $id_jugador, $id_partido);";
    $bd= new conexion();
    $dt=$bd->execute_query($query);
    return $dt;
  }
  public function update($id_estadistica, $id_dato, $minuto, $valor, $estado, $id_jugador, $id_partido){
    $query="UPDATE ESTADISTICA_JUGADOR SET id_dato_partido=$id_dato, minuto=$minuto, valor=$valor, estado=$estado,
    id_jugador=$id_jugador, id_partido=$id_partido WHERE id_estadistica_jugador=$id_estadistica;";
    $bd= new conexion();
    $dt=$bd->execute_query($query);
    return $dt;
  }

  public function delete($id){
    $query="DELETE FROM ESTADISTICA_JUGADOR WHERE id_estadistica_jugador=$id;";
    $bd= new conexion();
    $dt=$bd->execute_query($query);
    return $dt;
  }
  public function selectCampos(){
    $query="SELECT * FROM DATO_PARTIDO WHERE estado=1;";
    $bd= new conexion();
    $dt=$bd->execute_query($query);
    return $dt;
  }
}

 ?>

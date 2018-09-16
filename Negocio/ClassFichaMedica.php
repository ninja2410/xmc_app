<?php
require_once('..\..\Conexion\conexion.php');
/**
 * Ficha Medica
 */
class FichaMedica
{

  private $query;
  public function insert($fecha, $estado, $idjugador, $grasa, $peso, $talla){
    $query="CALL SP_FICHA_MEDICA_INSERT('$fecha', $estado, $idjugador,$grasa,$peso,$talla);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $fecha, $estado, $idjugador, $grasa, $peso, $talla){
    $query="CALL SP_FICHA_MEDICA_UPDATE($id,'$fecha', $estado, $idjugador,$grasa,$peso,$talla);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_FICHA_MEDICA_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT FM.idficha, FM.fecha, FM.estado, CONCAT(J.nombre, ' ', J.apellido) as Nombre , FM.grasa, FM.peso, FM.talla FROM ficha_medica FM , jugador J WHERE FM.estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT FM.idficha, FM.fecha, FM.estado, FM.idjugador,CONCAT(J.nombre, ' ', J.apellido) as Nombre , FM.grasa, FM.peso, FM.talla FROM ficha_medica FM , jugador J WHERE FM.idficha=$id AND FM.estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

<?php
require_once('..\..\Conexion\conexion.php');
/**
 * Parte del Cuerpo
 */
class ParteCuerpo
{

  private $query;
  public function insert($nombre, $estado){
    $query="CALL SP_PARTE_CUERPO_INSERT('$nombre', $estado);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $nombre, $estado){
    $query="CALL SP_PARTE_CUERPO_UPDATE($id, '$nombre', $estado);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_PARTE_CUERPO_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * FROM PARTE_CUERPO WHERE estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM PARTE_CUERPO WHERE id_parte=$id AND estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

<?php
require_once('..\..\Conexion\conexion.php');
/**
 * Posición
 */
class Posicion
{

  private $query;
  public function insert($siglas,$descripcion){
    $query="CALL SP_POSICION_INSERT('$siglas''$descripcion');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id,$siglas,$descripcion){
    $query="CALL SP_POSICION_UPDATE($id, '$siglas', $descripcion);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_POSICION_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * from POSICION where estado =1;";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * from POSICION where estado =1 AND id_posicion=$id;";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

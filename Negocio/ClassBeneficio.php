<?php
require_once('..\..\Conexion\conexion.php');
/**
 * BENEFICIOS DE MEMBRESÍA
 */
class Beneficio
{

  private $query;
  public function insert($desc, $estado, $nombre){
    $query="CALL SP_beneficio_INSERT('$desc', 1, '$nombre');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $desc, $estado, $nombre){
    $query="CALL SP_beneficio_UPDATE($id,'$desc', 1, '$nombre');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_beneficio_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * FROM beneficio WHERE estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM beneficio WHERE idbeneficio=$id AND estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

<?php
require_once('..\..\Conexion\conexion.php');
/**
 * Categoria
 */
class Categoria
{

  private $query;
  public function insert($nombre, $descripcion){
    $query="CALL SP_CATEGORIA_INSERT('$nombre', '$descripcion');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $nombre, $descripcion){
    $query="CALL SP_CATEGORIA_UPDATE($id,'$nombre', '$descripcion');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_CATEGORIA_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * FROM CATEGORIA WHERE estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM CATEGORIA WHERE id_categoria=$id AND estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

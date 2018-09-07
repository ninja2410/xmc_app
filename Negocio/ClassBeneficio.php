<?php
require_once('..\PJ_XJMC\Conexion\conexion.php');
/**
 * BENEFICIOS DE MEMBRESÍA
 */
class Beneficio
{

  private $query;
  public function insert($desc, $estado, $nombre){
    $query="CALL SP_beneficio_INSERT('$desc', '$estado', '$nombre');";
  }

  public function update($desc, $estado, $nombre){
    $query="CALL SP_beneficio_DELETE('$desc', '$estado', '$nombre');";
  }

  public function delete($desc, $estado, $nombre){
    $query="CALL SP_beneficio_UPDATE('$desc', '$estado', '$nombre');";
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * FROM beneficio";
    }
    else{
      $query="SELECT * FROM beneficio WHERE idbeneficio='$id'";
    }
    $dt=mysqli_query($conexion->objetoconexion,$query);
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

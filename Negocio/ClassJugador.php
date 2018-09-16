<?php
require_once('..\..\Conexion\conexion.php');
/**
 * Ficha Medica
 */
class Jugador
{

  private $query;
  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * FROM jugador WHERE FM.estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM jugador WHERE FM.idficha=$id AND FM.estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

<?php
require_once('../../Conexion/conexion.php');
/**
 *
 */
class Tratamiento
{
  private $query;
  public function insert($cantidad, $medicamento, $prescripcion, $id_lesion){
    $query="CALL SP_TRATAMIENTO_INSERT('$medicamento',$cantidad,  '$prescripcion', $id_lesion);";
    $bd=new conexion();
    $dt=$bd->execute_query($query);
  }
  public function update($id,$cantidad, $medicamento, $prescripcion, $id_lesion){
    $query="CALL SP_TRATAMIENTO_UPDATE($id, '$medicamento', $cantidad, '$prescripcion', $id_lesion);";
    $bd=new conexion();
    $dt=$bd->execute_query($query);
  }
  public function delete($id){
    $query="DELETE FROM TRATAMIENTO WHERE id_tratamiento=$id";
    $bd=new conexion();
    $dt=$bd->execute_query($query);
  }
  public function select($id){
    if ($id==-1) {
      $query="SELECT * FROM TRATAMIENTO;";
    }
    else{
      $query="SELECT * FROM TRATAMIENTO WHERE id_lesion_jugador=$id;";
    }
    $bd=new conexion();
    $dt=$bd->execute_query($query);
    return $dt;
  }
}

 ?>

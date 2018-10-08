<?php
require_once('..\..\Conexion\conexion.php');
/**
 * Contrato
 */
class Contrato
{

  private $query;
  public function insert($fecha_inicio, $fecha_final, $salario, $titulo, $id_documento_digital){
    $query="CALL SP_CONTRATO_INSERT('$fecha_inicio','$fecha_final', $salario, '$titulo',$id_documento_digital);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $fecha_inicio, $fecha_final, $salario, $titulo, $id_documento_digital){
    $query="CALL SP_CONTRATO_UPDATE($id,'$fecha_inicio','$fecha_final', $salario, '$titulo',$id_documento_digital);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_CONTRATO_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query = "SELECT * FROM CONTRATO WHERE estado = 1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM CONTRATO WHERE id_contrato=$id AND estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

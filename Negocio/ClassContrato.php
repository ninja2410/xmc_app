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
      $query="SELECT C.id_contrato,C.titulo,C.fecha_inicio,C.fecha_final,C.salario,D.fecha_creacion,D.descripcion,D.path FROM CONTRATO C, DOCUMENTO_DIGITAL D WHERE C.id_contrato = $id AND C.estado = 1 AND C.id_documento_digital = D.id_documento_digital;";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

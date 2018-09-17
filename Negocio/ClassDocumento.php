<?php
/**
 *
 */
class Documento
{
  private $query;
  public function insert($fecha, $estado, $path, $descripcion, $categoria){
    $query="CALL SP_DOCDIGITAL_INSERT('$fecha', $estado, '$path', '$descripcion', $categoria);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $fecha, $estado, $path, $descripcion, $categoria){
    $query="CALL SP_DOCDIGITAL_UPDATE($id,'$fecha', $estado, '$path', '$descripcion', $categoria);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_DOCDIGITAL_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * FROM documento_digital WHERE estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM documento_digital WHERE iddocumento=$id AND estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}

 ?>

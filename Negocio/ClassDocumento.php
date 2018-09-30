<?php
require_once('..\..\Conexion\conexion.php');
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
    $query="CALL SP_DOCDIGITAL_UPDATE($id, $estado, '$path', '$descripcion', $categoria);";
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

  public function correlativo(){
    $query="SELECT coalesce(MAX(id_documento_digital)+1, 1) as x from documento_digital;";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
    $id=mysqli_fetch_array($dt);
    return $id[0][0];
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT id_documento_digital ID, fecha_creacion FECHA, path, descripcion, nombre CATEGORIA from DOCUMENTO_DIGITAL inner join CATEGORIA_DOCUMENTOS cd on DOCUMENTO_DIGITAL.id_categoria_documentos = cd.id_categoria_documentos WHERE DOCUMENTO_DIGITAL.estado=1;";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT id_documento_digital ID, fecha_creacion FECHA, path, descripcion, nombre CATEGORIA, DOCUMENTO_DIGITAL.id_categoria_documentos from DOCUMENTO_DIGITAL inner join CATEGORIA_DOCUMENTOS cd on DOCUMENTO_DIGITAL.id_categoria_documentos = cd.id_categoria_documentos WHERE id_documento_digital=$id AND DOCUMENTO_DIGITAL.estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}

 ?>

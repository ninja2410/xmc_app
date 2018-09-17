<?php
require_once('..\..\Conexion\conexion.php');
/**
 * Categoria de Documentos
 */
class CatDocumentos
{

  private $query;
  public function insert($estado, $nombre){
    $query="CALL SP_CATEGORIA_DOCUMENTOS_INSERT($estado, '$nombre');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $estado, $nombre){
    $query="CALL SP_CATEGORIA_DOCUMENTOS_UPDATE($id, $estado, '$nombre');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_CATEGORIA_DOCUMENTOS_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * from categoria_documentos where estado =1;";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM categoria_documentos WHERE idcategoria_documentos=$id AND estado=1;";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

<?php
require_once('../../Conexion/conexion.php');
/**
 *
 */
class Documento
{
  private $query;
  public function insert($fecha, $estado, $path, $descripcion, $categoria, $titulo){
    $query="CALL SP_DOCDIGITAL_INSERT('$fecha', $estado, '$path', '$descripcion', $categoria, '$titulo');";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
	return $dt;
  }
  public function insert_jugador($fecha, $estado, $path, $descripcion, $categoria, $titulo, $jugador){
    $query="INSERT INTO DOCUMENTO_DIGITAL(fecha_creacion, estado, path, descripcion, id_categoria_documentos, id_jugador, titulo)
    VALUES('$fecha', 1, '$path', '$descripcion', $categoria, $jugador, '$titulo');";
    echo $query;
    $bd= new conexion();
    $dt=$bd->execute_query($query);
	  return $dt;
  }
  public function insert_entrenador($fecha, $estado, $path, $descripcion, $categoria, $titulo, $entrenador){
    $query="INSERT INTO DOCUMENTO_DIGITAL(fecha_creacion, estado, path, descripcion, id_categoria_documentos, id_entrenador, titulo)
    VALUES('$fecha', 1, '$path', '$descripcion', $categoria, $entrenador, '$titulo');";
    echo $query;
    $bd= new conexion();
    $dt=$bd->execute_query($query);
	  return $dt;
  }
  public function insert_socio($fecha, $estado, $path, $descripcion, $categoria, $titulo, $socio){
    $query="INSERT INTO DOCUMENTO_DIGITAL(fecha_creacion, estado, path, descripcion, id_categoria_documentos, id_socio, titulo)
    VALUES('$fecha', 1, '$path', '$descripcion', $categoria, $socio, '$titulo');";
    echo $query;
    $bd= new conexion();
    $dt=$bd->execute_query($query);
	  return $dt;
  }

  public function insert_prensa($fecha, $estado, $path, $descripcion, $categoria, $titulo, $prensa){
    $query="INSERT INTO DOCUMENTO_DIGITAL(fecha_creacion, estado, path, descripcion, id_categoria_documentos, id_prensa, titulo)
    VALUES('$fecha', 1, '$path', '$descripcion', $categoria, $prensa, '$titulo');";
    echo $query;
    $bd= new conexion();
    $dt=$bd->execute_query($query);
	  return $dt;
  }

  public function insert_medico($fecha, $estado, $path, $descripcion, $categoria, $titulo, $medico){
    $query="INSERT INTO DOCUMENTO_DIGITAL(fecha_creacion, estado, path, descripcion, id_categoria_documentos, id_medico, titulo)
    VALUES('$fecha', 1, '$path', '$descripcion', $categoria, $medico, '$titulo');";
    echo $query;
    $bd= new conexion();
    $dt=$bd->execute_query($query);
	  return $dt;
  }

  public function update_jugador($id, $fecha, $estado, $path, $descripcion, $categoria, $titulo, $jugador){
    $query="UPDATE DOCUMENTO_DIGITAL SET path='$path', descripcion='$descripcion', id_categoria_documentos=$categoria,
      titulo='$titulo', id_jugador=$jugador WHERE id_documento_digital=$id;";
    echo $query;
    $bd= new conexion();
    $dt=$bd->execute_query($query);
	  return $dt;
  }
  public function update_entrenador($id, $fecha, $estado, $path, $descripcion, $categoria, $titulo, $entrenador){
    $query="UPDATE DOCUMENTO_DIGITAL SET path='$path', descripcion='$descripcion', id_categoria_documentos=$categoria,
      titulo='$titulo', id_entrenador=$entrenador WHERE id_documento_digital=$id;";
    echo $query;
    $bd= new conexion();
    $dt=$bd->execute_query($query);
	  return $dt;
  }
  public function update_socio($id, $estado, $path, $descripcion, $categoria, $titulo, $socio){
    $query="UPDATE DOCUMENTO_DIGITAL SET path='$path', descripcion='$descripcion', id_categoria_documentos=$categoria,
      titulo='$titulo', id_socio=$socio WHERE id_documento_digital=$id;";
    echo $query;
    $bd= new conexion();
    $dt=$bd->execute_query($query);
	  return $dt;
  }

  public function update_prensa($id, $estado, $path, $descripcion, $categoria, $titulo, $prensa){
    $query="UPDATE DOCUMENTO_DIGITAL SET path='$path', descripcion='$descripcion', id_categoria_documentos=$categoria,
      titulo='$titulo', id_prensa=$prensa WHERE id_documento_digital=$id;";
    echo $query;
    $bd= new conexion();
    $dt=$bd->execute_query($query);
	  return $dt;
  }

  public function update_medico($id, $estado, $path, $descripcion, $categoria, $titulo, $medico){
    $query="UPDATE DOCUMENTO_DIGITAL SET path='$path', descripcion='$descripcion', id_categoria_documentos=$categoria,
      titulo='$titulo', id_medico=$medico WHERE id_documento_digital=$id;";
    echo $query;
    $bd= new conexion();
    $dt=$bd->execute_query($query);
	  return $dt;
  }


  public function update($id, $fecha, $estado, $path, $descripcion, $categoria, $titulo){
    $query="CALL SP_DOCDIGITAL_UPDATE($id, $estado, '$path', '$descripcion', $categoria, $titulo);";
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
    $query="SELECT coalesce(MAX(id_documento_digital)+1, 1) as x from DOCUMENTO_DIGITAL;";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
    $id=mysqli_fetch_array($dt);
    return $id[0];
  }

  public function select_jugador($jugador){
    $conexion=new conexion();
    $conexion->conectar();
    $query="SELECT id_documento_digital ID, fecha_creacion FECHA, path, descripcion, nombre CATEGORIA, titulo, id_jugador from DOCUMENTO_DIGITAL inner join CATEGORIA_DOCUMENTOS cd on DOCUMENTO_DIGITAL.id_categoria_documentos = cd.id_categoria_documentos WHERE DOCUMENTO_DIGITAL.estado=1 AND DOCUMENTO_DIGITAL.id_jugador=$jugador;";
    $dt=mysqli_query($conexion->objetoconexion,$query);
    $conexion->desconectar();
    return $dt;
  }
  public function select_entrenador($entrenador){
    $conexion=new conexion();
    $conexion->conectar();
    $query="SELECT id_documento_digital ID, fecha_creacion FECHA, path, descripcion, nombre CATEGORIA, titulo, id_entrenador from DOCUMENTO_DIGITAL inner join CATEGORIA_DOCUMENTOS cd on DOCUMENTO_DIGITAL.id_categoria_documentos = cd.id_categoria_documentos WHERE DOCUMENTO_DIGITAL.estado=1 AND DOCUMENTO_DIGITAL.id_entrenador=$entrenador;";
    $dt=mysqli_query($conexion->objetoconexion,$query);
    $conexion->desconectar();
    return $dt;
  }
  public function select_socio($socio){
    $conexion=new conexion();
    $conexion->conectar();
    $query="SELECT id_documento_digital ID, fecha_creacion FECHA, path, descripcion, nombre CATEGORIA, titulo, id_socio from DOCUMENTO_DIGITAL inner join CATEGORIA_DOCUMENTOS cd on DOCUMENTO_DIGITAL.id_categoria_documentos = cd.id_categoria_documentos WHERE DOCUMENTO_DIGITAL.estado=1 AND DOCUMENTO_DIGITAL.id_socio=$socio;";
    $dt=mysqli_query($conexion->objetoconexion,$query);
    $conexion->desconectar();
    return $dt;
  }

  public function select_prensa($prensa){
    $conexion=new conexion();
    $conexion->conectar();
    $query="SELECT id_documento_digital ID, fecha_creacion FECHA, path, descripcion, nombre CATEGORIA, titulo, id_prensa from DOCUMENTO_DIGITAL inner join CATEGORIA_DOCUMENTOS cd on DOCUMENTO_DIGITAL.id_categoria_documentos = cd.id_categoria_documentos WHERE DOCUMENTO_DIGITAL.estado=1 AND DOCUMENTO_DIGITAL.id_prensa=$prensa;";
    $dt=mysqli_query($conexion->objetoconexion,$query);
    $conexion->desconectar();
    return $dt;
  }

  public function select_medico($medico){
    $conexion=new conexion();
    $conexion->conectar();
    $query="SELECT id_documento_digital ID, fecha_creacion FECHA, path, descripcion, nombre CATEGORIA, titulo, id_documento from DOCUMENTO_DIGITAL inner join CATEGORIA_DOCUMENTOS cd on DOCUMENTO_DIGITAL.id_categoria_documentos = cd.id_categoria_documentos WHERE DOCUMENTO_DIGITAL.estado=1 AND DOCUMENTO_DIGITAL.id_documento=$documento;";
    $dt=mysqli_query($conexion->objetoconexion,$query);
    $conexion->desconectar();
    return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT id_documento_digital ID, fecha_creacion FECHA, path, descripcion, nombre CATEGORIA, titulo, id_jugador, id_prensa, id_socio, id_entrenador, id_medico from DOCUMENTO_DIGITAL inner join CATEGORIA_DOCUMENTOS cd on DOCUMENTO_DIGITAL.id_categoria_documentos = cd.id_categoria_documentos WHERE DOCUMENTO_DIGITAL.estado=1;";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT id_documento_digital ID, fecha_creacion FECHA, path, titulo, id_jugador,  descripcion, nombre CATEGORIA, DOCUMENTO_DIGITAL.id_categoria_documentos, id_socio, id_prensa, id_entrenador, id_medico from DOCUMENTO_DIGITAL inner join CATEGORIA_DOCUMENTOS cd on DOCUMENTO_DIGITAL.id_categoria_documentos = cd.id_categoria_documentos WHERE id_documento_digital=$id AND DOCUMENTO_DIGITAL.estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}

 ?>

<?php
require_once('..\..\Conexion\conexion.php');
/**
 * Imagenes Noticias
 */
class Imagenes
{
  private $query;
  public function insert($path, $nombre, $fecha, $id_noticia){
    $query="CALL SP_IMAGENES_NOTICIAS_INSERT('$path', '$nombre', '$fecha', $id_noticia);";
    $bd= new conexion();
    $dt=$bd->execute_query($query);
    echo $query;
		return $dt;
  }

  public function update($id, $path, $nombre, $fecha, $id_noticia){
    $query="CALL SP_IMAGENES_NOTICIAS_UPDATE($id,'$path', '$nombre', '$fecha', $id_noticia);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_IMAGENES_NOTICIAS_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function correlativo(){
    $query="SELECT coalesce(MAX(id_noticia)+1, 1) as x from NOTICIA;";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
    $id=mysqli_fetch_array($dt);
    return $id[0];
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT id_noticia,N.titulo,N.contenido, N.fecha, N.id_usuario, coalesce(U.nombre,' ',U.apellido) as usuario, N.estado from NOTICIA N, USUARIO U where N.estado=1 and U.estado=1 and N.id_usuario=U.id_usuario;";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT id_noticia,N.titulo,N.contenido, N.fecha, N.id_usuario, coalesce(U.nombre,' ',U.apellido) as usuario, N.estado from NOTICIA N, USUARIO U where N.estado=1 and U.estado=1 and N.id_usuario=U.id_usuario and N.id_noticia=$id;";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

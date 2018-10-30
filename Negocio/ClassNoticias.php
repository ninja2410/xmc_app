<?php
require_once('..\..\Conexion\conexion.php');
/**
 * Noticias
 */
class Noticia
{
  private $query;
  public function insert($titulo, $contenido, $fecha, $id_usuario){
    $query="CALL SP_NOTICIA_INSERT('$titulo', '$contenido', '$fecha', $id_usuario);";
    $bd= new conexion();
    $dt=$bd->execute_query($query);
    echo $query;
		return $dt;
  }

  public function update($id, $titulo, $contenido, $fecha, $id_usuario){
    $query="CALL SP_NOTICIA_UPDATE($id,'$titulo', '$contenido', '$fecha', $id_usuario);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_NOTICIA_DELETE($id);";
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
      $query="SELECT N.id_noticia, N.titulo, N.contenido, N.fecha, N.id_usuario, CONCAT(U.nombre,' ',U.apellido) as Autor, IMG.path, IMG.nombre, IMG.id
      FROM NOTICIA N, IMAGENES_NOTICIAS IMG, USUARIO U WHERE N.id_noticia=IMG.id_noticia AND N.id_usuario=U.id_usuario AND N.estado=1;";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT N.id_noticia, N.titulo, N.contenido, N.fecha, N.id_usuario, CONCAT(U.nombre,' ',U.apellido) as Autor, IMG.path, IMG.nombre, IMG.id 
      FROM NOTICIA N, IMAGENES_NOTICIAS IMG, USUARIO U WHERE N.id_noticia=IMG.id_noticia AND N.id_usuario=U.id_usuario AND N.estado=1 AND N.id_noticia=$id;";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }

  public function Ultimoregistro(){
    $conexion=new conexion();
    $conexion->conectar();
    $query="SELECT N.id_noticia, N.titulo, N.contenido, N.fecha, N.id_usuario, CONCAT(U.nombre,' ',U.apellido) as Autor, IMG.path, IMG.nombre
    FROM NOTICIA N, IMAGENES_NOTICIAS IMG, USUARIO U WHERE N.id_noticia=IMG.id_noticia AND N.id_usuario=U.id_usuario AND N.estado=1 AND N.id_noticia = (SELECT MAX(id_noticia) FROM NOTICIA);";
    $dt=mysqli_query($conexion->objetoconexion,$query);
    $conexion->desconectar();
    return $dt;
  }

  public function LosDemas(){
    $conexion=new conexion();
    $conexion->conectar();
    $query="SELECT N.id_noticia, N.titulo, N.contenido, N.fecha, N.id_usuario, CONCAT(U.nombre,' ',U.apellido) as Autor, IMG.path, IMG.nombre
    FROM NOTICIA N, IMAGENES_NOTICIAS IMG, USUARIO U WHERE N.id_noticia=IMG.id_noticia AND N.id_usuario=U.id_usuario AND N.estado=1 AND N.id_noticia != (SELECT MAX(id_noticia) FROM NOTICIA) ORDER BY N.id_noticia DESC;";
    $dt=mysqli_query($conexion->objetoconexion,$query);
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

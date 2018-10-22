<?php
require_once('..\..\Conexion\conexion.php');
/**
 *
 */
class Socio
{

    private $query;
    public function insert($nombre, $apellido, $dir_dom, $telefono, $fnac, $freg, $dpi, $dir_cob, $membresia, $email, $foto){
      try {
        $query="CALL SP_SOCIO_INSERT('$nombre', '$apellido', '$dir_dom', '$telefono', '$fnac', '$freg',1, '$dpi', '$dir_cob', '$email', '$foto');";
        $bd= new conexion();
        $dt=$bd->execute_query($query);
        $tmp=$this->ultimo();
        $id_socio=$tmp['x'];
        $query="INSERT INTO REGISTRO_SOCIO(estado, id_membresia, id_socio) VALUES (1, $membresia, $id_socio );";
    		$dt=$bd->execute_query($query);
      } catch (\Exception $e) {
        die("No se pudo conectar: " . $e->getMessage());
      }
  		return $dt;
    }
    public function correlativo(){
      $query="SELECT coalesce(MAX(id_socio)+1, 1) as x from SOCIO;";
      $bd= new conexion();
  		$dt=$bd->execute_query($query);
      $id=mysqli_fetch_array($dt);
      return $id[0];
    }
    public function ultimo(){
      $query="SELECT MAX(id_socio) x FROM SOCIO";
      $bd= new conexion();
      $dt=$bd->execute_query($query);
  		return mysqli_fetch_assoc($dt);
    }

    public function update($id, $nombre, $apellido, $dir_dom, $telefono, $fnac, $freg, $dpi, $dir_cob, $membresia, $email, $foto){
      $query="CALL SP_SOCIO_UPDATE($id,'$nombre', '$apellido', '$dir_dom', '$telefono', '$fnac', '$freg',1, '$dpi', '$dir_cob', '$email', '$foto');";
      $bd= new conexion();
  		$dt=$bd->execute_query($query);
      $query="SELECT COUNT(id_socio) x FROM REGISTRO_SOCIO WHERE id_socio=$id AND id_membresia=$membresia;";
      $tmp=$bd->execute_query($query);
      $tmp=mysqli_fetch_assoc($tmp);
      if ($tmp['x']==0) {
        $query="UPDATE REGISTRO_SOCIO SET fecha_cancelacion=date('Y-m-d'), SET estado=0 WHERE id_socio=$id;";
        $dt=$bd->execute_query($query);
        $query="INSERT INTO REGISTRO_SOCIO(estado, id_membresia, id_socio) VALUES (1, $membresia, $id );";
    		$dt=$bd->execute_query($query);
      }
  		return $dt;
    }

    public function delete($id){
      $query="CALL SP_SOCIO_DELETE($id);";
      $bd= new conexion();
  		$dt=$bd->execute_query($query);
  		return $dt;
    }

    public function select($id){
      $conexion=new conexion();
      $conexion->conectar();
      if ($id==-1) {
        $query="SELECT * FROM SOCIO WHERE estado=1 ORDER BY fecha_registro DESC";
        $dt=mysqli_query($conexion->objetoconexion,$query);
      }
      else{
        $query="SELECT * FROM SOCIO WHERE id_socio=$id AND estado=1 ORDER BY fecha_registro DESC";
        $tmp=mysqli_query($conexion->objetoconexion,$query);
        $dt=mysqli_fetch_assoc($tmp);
      }
      $conexion->desconectar();
      return $dt;
    }

    public function DPI($id){
      $conexion=new conexion();
      $conexion->conectar();
        $query="SELECT * FROM SOCIO WHERE dpi=$id AND estado=1";
        $dt=mysqli_query($conexion->objetoconexion,$query);
        //$dt=mysqli_fetch_assoc($tmp);
      $conexion->desconectar();
      return $dt;
    }

    public function select_pagos(){
      $conexion=new conexion();
      $conexion->conectar();
      $query="SELECT S.id_socio ID, CONCAT(SOCIO.nombre, ' ', apellido) SOCIO, M.nombre
      MEMBRESIA, precio PRECIO FROM SOCIO INNER JOIN REGISTRO_SOCIO S on SOCIO.id_socio = S.id_socio
      INNER JOIN MEMBRESIA M on S.id_membresia = M.id_membresia";
      $dt=mysqli_query($conexion->objetoconexion,$query);
      $conexion->desconectar();
      return $dt;
    }

}

 ?>

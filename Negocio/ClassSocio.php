<?php
require_once('..\..\Conexion\conexion.php');
/**
 *
 */
class Socio
{
    private $query;
    public function insert($nombre, $apellido, $dir_dom, $telefono, $fnac, $freg, $dpi, $dir_cob, $membresia){
      try {
        $query="CALL SP_SOCIO_INSERT('$nombre', '$apellido', '$dir_dom', '$telefono', '$fnac', '$freg',1, '$dpi', '$dir_cob');";
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
    public function ultimo(){
      $query="SELECT MAX(id_socio) x FROM SOCIO";
      $bd= new conexion();
      $dt=$bd->execute_query($query);
  		return mysqli_fetch_assoc($dt);
    }
    public function update($id, $nombre, $apellido, $dir_dom, $telefono, $fnac, $freg, $dpi, $dir_cob, $membresia){
      $query="CALL SP_SOCIO_UPDATE($id,'$nombre', '$apellido', '$dir_dom', '$telefono', '$fnac', '$freg',1, '$dpi', '$dir_cob');";
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
        $query="SELECT * FROM SOCIO WHERE estado=1";
        $dt=mysqli_query($conexion->objetoconexion,$query);
      }
      else{
        $query="SELECT * FROM SOCIO WHERE estado=1;";
        $tmp=mysqli_query($conexion->objetoconexion,$query);
        $dt=mysqli_fetch_assoc($tmp);
      }
      $conexion->desconectar();
      return $dt;
    }

    public function select_pagos(){
      $conexion=new conexion();
      $conexion->conectar();
      $query="SELECT S.id_socio ID, CONCAT(SOCIO.nombre, ' ', apellido) SOCIO, M.nombre
      MEMBRESIA, precio PRECIO FROM SOCIO inner JOIN REGISTRO_SOCIO S on SOCIO.id_socio = S.id_socio
      LEFT JOIN MEMBRESIA M on S.id_membresia = M.id_membresia WHERE S.estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
      $conexion->desconectar();
      return $dt;
    }

}

 ?>

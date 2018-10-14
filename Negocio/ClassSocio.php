<?php
require_once('..\..\Conexion\conexion.php');
/**
 *
 */
class Socio
{

    private $query;
    public function insert($nombre, $apellido, $dir_dom, $telefono, $fnac, $freg, $dpi, $dir_cob){
      $query="CALL SP_SOCIO_INSERT('$nombre', '$apellido', '$dir_dom', '$telefono', '$fnac', '$freg',1, '$dpi', '$dir_cob');";
      $bd= new conexion();
  		$dt=$bd->execute_query($query);
  		return $dt;
    }

    public function update($id, $nombre, $apellido, $dir_dom, $telefono, $fnac, $freg, $dpi, $dir_cob){
      $query="CALL SP_SOCIO_UPDATE($id,'$nombre', '$apellido', '$dir_dom', '$telefono', '$fnac', '$freg',1, '$dpi', '$dir_cob');";
      $bd= new conexion();
  		$dt=$bd->execute_query($query);
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
        $query="SELECT * FROM SOCIO WHERE id_socio=$id AND estado=1";
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
      MEMBRESIA, precio PRECIO FROM SOCIO INNER JOIN REGISTRO_SOCIO S on SOCIO.id_socio = S.id_socio
      INNER JOIN MEMBRESIA M on S.id_membresia = M.id_membresia";
      $dt=mysqli_query($conexion->objetoconexion,$query);
      $conexion->desconectar();
      return $dt;
    }

}

 ?>

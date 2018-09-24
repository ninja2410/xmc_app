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
        $query="SELECT * FROM socio WHERE estado=1";
        $dt=mysqli_query($conexion->objetoconexion,$query);
      }
      else{
        $query="SELECT * FROM socio WHERE id_socio=$id AND estado=1";
        $tmp=mysqli_query($conexion->objetoconexion,$query);
        $dt=mysqli_fetch_assoc($tmp);
      }
      $conexion->desconectar();
      return $dt;
    }

}

 ?>

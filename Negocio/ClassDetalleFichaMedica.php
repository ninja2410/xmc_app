<?php
require_once('..\..\Conexion\conexion.php');
/**
 * Detalle de la ficha medica
 */
class DetalleFM
{

  private $query;
  public function insert($valor, $idcampo, $idficha){
    $query="CALL SP_DETALLEFICHAMEDICA_INSERT('$valor', $idcampo, $idficha);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($valor, $id, $idcampo, $idficha){
    $query="CALL SP_DETALLEFICHAMEDICA_UPDATE('$valor', $id, $idcampo, $idficha);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_DETALLEFICHAMEDICA_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT DFM.valor, DFM.iddetalle, C.nombre, DFM.idficha from detallefichamedica DFM, campo C";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT DFM.valor, DFM.iddetalle, DFM.idCampo,C.nombre, DFM.idficha from detallefichamedica DFM, campo C where DFM.iddetalle=$id AND DFM.idCampo=C.idCampo";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

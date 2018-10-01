<?php
require_once('..\..\Conexion\conexion.php');
/**
 * Campo
 */
class Campo
{

  private $query;
  public function insert($nombre, $estado, $idparte){
    $query="CALL SP_CAMPO_INSERT('$nombre', $estado, $idparte);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function update($id, $nombre, $estado, $idparte){
    $query="CALL SP_CAMPO_UPDATE($id, '$nombre', $estado, $idparte);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function delete($id){
    $query="CALL SP_CAMPO_DELETE($id);";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function listCampos($id_tab){
    $query="select  CAMPO.id_campo CAMPO, nombre NOMBRE, D.valor VALOR, id_parte PAGINA from CAMPO
    LEFT JOIN DETALLE_FICHA_MEDICA D on CAMPO.id_campo = D.id_campo
    WHERE id_parte=$id_tab;";
    $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
  }

  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT C.idCampo, C.nombre, PC.Nombre from CAMPO C, parte_cuerpo PC where C.estado =1 and C.idParte=PC.idParte;";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT C.idCampo, C.nombre, C.estado, C.idParte, PC.Nombre as Parte_Cuerpo FROM CAMPO C, parte_cuerpo PC WHERE idCampo=$id AND C.estado=1 and C.idParte=PC.idParte";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

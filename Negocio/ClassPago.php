<?php
require_once('..\..\Conexion\conexion.php');
require_once('..\..\Negocio\ClassSocio.php');
/**
 * AsignacionEntrenador
 */
class Pago
{

  private $query;
  public function insert($monto, $soc, $meses, $membresia){
    //insertar pagos
    $fe=$this->primero($soc);
    $fechaReferencia=date($fe);
    for ($i=0; $i < $meses; $i++) {
      $query="INSERT INTO PAGO(fecha, estado, monto, id_socio) VALUES ('$fechaReferencia', 1, $membresia, $soc);";
      $bd= new conexion();
  		$dt=$bd->execute_query($query);
      $nueva=strtotime('+1 month', strtotime($fechaReferencia));
      $fechaReferencia=date('Y-m-j', $nueva);

    }

	}
  //
  // public function update($id, $id_categoria, $id_entrenador){
  //   $query="CALL SP_ASIGNACION_ENTRENADOR_UPDATE($id,$id_categoria,$id_entrenador);";
  //   $bd= new conexion();
	// 	$dt=$bd->execute_query($query);
	// 	return $dt;
  // }
  //
  // public function delete($id){
  //   $query="CALL SP_ASIGNACION_ENTRENADOR_DELETE($id);";
  //   $bd= new conexion();
	// 	$dt=$bd->execute_query($query);
	// 	return $dt;
  // }

  function mesSolvente($socio){
    $soc=new Socio();
    $dataSocio=$soc->select($socio);
    $query="SELECT fecha FROM PAGO WHERE id_socio=1 order by fecha desc LIMIT 1;";
    $conexion=new conexion();
    $conexion->conectar();
    $at=mysqli_query($conexion->objetoconexion,$query);
    $conexion->desconectar();
    $pg=mysqli_fetch_assoc($at);
    if ($pg=="") {
      return "No hay pagos.";
    }
    else{
      return $pg['fecha'];
    }
  }
  function primero($socio){
    $soc=new Socio();
    $dataSocio=$soc->select($socio);
    //verificar si ya ha pagado hash_algos
    $query="SELECT COUNT(id_pago) PAGOS FROM PAGO WHERE id_socio=$socio;";
    $conexion=new conexion();
    $conexion->conectar();
    $at=mysqli_query($conexion->objetoconexion,$query);
    $conexion->desconectar();
    $pg=mysqli_fetch_assoc($at);
    if ($pg['PAGOS']==0) {
      return $dataSocio['fecha_registro'];
    }
    else{
      $query="SELECT * FROM PAGO WHERE id_socio=$socio order by fecha desc LIMIT 1;";
      $conexion->conectar();
      $pag=mysqli_query($conexion->objetoconexion,$query);
      $conexion->desconectar();
      $pgr=mysqli_fetch_assoc($pag);
      $fechaReferencia=date($pgr['fecha']);
      $nueva=strtotime('+1 month', strtotime($fechaReferencia));
      $fechaReferencia=date('Y-m-j', $nueva);
      return $fechaReferencia;
    }
  }
  public function estado_pagos($socio){
    $soc=new Socio();
    $dataSocio=$soc->select($socio);
    //verificar si ya ha pagado hash_algos
    $query="SELECT COUNT(id_pago) PAGOS FROM PAGO WHERE id_socio=$socio;";
    $conexion=new conexion();
    $conexion->conectar();
    $at=mysqli_query($conexion->objetoconexion,$query);
    $conexion->desconectar();
    $pg=mysqli_fetch_assoc($at);
    if ($pg['PAGOS']==0) {
      //verificar cuantos meses debe
      $reg=date_create($dataSocio['fecha_registro']);
      $today=date_create(date('Y-m-d'));
      $dif=date_diff($today, $reg);
      return $dif->m;
    }
    else{
      $query="SELECT * FROM PAGO WHERE id_socio=$socio order by fecha desc LIMIT 1;";
      $conexion=new conexion();
      $conexion->conectar();
      $at=mysqli_query($conexion->objetoconexion,$query);
      $conexion->desconectar();
      $pg=mysqli_fetch_assoc($at);
      $reg=date_create($pg['fecha']);
      $today=date_create(date('Y-m-d'));
      $dif=date_diff($today, $reg);
      return $dif->m;
    }
  }
  public function select($id){
    $conexion=new conexion();
    $conexion->conectar();
    if ($id==-1) {
      $query="SELECT * FROM ASIGNACION_ENTRENADOR WHERE estado=1";
      $dt=mysqli_query($conexion->objetoconexion,$query);
    }
    else{
      $query="SELECT * FROM ASIGNACION_ENTRENADOR WHERE id_asignacion_entrenador=$id AND estado=1";
      $tmp=mysqli_query($conexion->objetoconexion,$query);
      $dt=mysqli_fetch_assoc($tmp);
    }
    $conexion->desconectar();
    return $dt;
  }
}
 ?>

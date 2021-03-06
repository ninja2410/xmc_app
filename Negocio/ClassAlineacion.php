<?php
require_once('../../Conexion/conexion.php');
/**
 * MEDICO DE JUGADORES
 */
class Alineacion
{

  private $query;

  public function select($id)
    {
        $conexion=new conexion();
        $conexion->conectar();
        if ($id==-1) 
        {
            $query="SELECT PO.descripcion,P.id_equipo, P.fecha, concat(J.nombre,concat(' ',J.apellido)) as nombre, A.id_alineacion,A.id_partido,A.id_jugador,A.id_posicion,A.estado FROM ALINEACION A
            INNER JOIN PARTIDO P ON P.id_partido=A.id_partido
            INNER JOIN JUGADOR J ON J.id_jugador=A.id_jugador  
            INNER JOIN POSICION PO ON PO.id_posicion=A.id_posicion";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        }
        else
        {
            $query="SELECT ALINEACION.id_alineacion, ALINEACION.id_partido, ALINEACION.id_posicion, ALINEACION.id_jugador,  PARTIDO.fecha ,JUGADOR.nombre, POSICION.descripcion as posicion FROM ALINEACION 
            INNER JOIN PARTIDO ON PARTIDO.id_partido=ALINEACION.id_partido
            INNER JOIN JUGADOR ON JUGADOR.id_jugador = ALINEACION.id_jugador
            INNER JOIN POSICION ON POSICION.id_posicion = ALINEACION.id_posicion WHERE ALINEACION.id_alineacion=$id AND ALINEACION.estado=1";
            $tmp=mysqli_query($conexion->objetoconexion,$query);
            $dt=mysqli_fetch_assoc($tmp);
        }
        $conexion->desconectar();
        return $dt;
    }

    public function selectPartido($id)
    {
        $conexion=new conexion();
        $conexion->conectar();
            $query="SELECT concat(JUGADOR.nombre,concat(' ',JUGADOR.apellido)) as nombre, ALINEACION.id_alineacion, ALINEACION.id_partido, ALINEACION.id_posicion, ALINEACION.id_jugador,  PARTIDO.fecha, POSICION.descripcion as posicion FROM ALINEACION 
            INNER JOIN PARTIDO ON PARTIDO.id_partido=ALINEACION.id_partido
            INNER JOIN JUGADOR ON JUGADOR.id_jugador = ALINEACION.id_jugador
            INNER JOIN POSICION ON POSICION.id_posicion = ALINEACION.id_posicion WHERE ALINEACION.id_partido=$id AND ALINEACION.estado=1";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        $conexion->desconectar();
        return $dt;
    }

    public function insert($par,$jugador,$pos)
    {
        $query="CALL SP_ALINEACION_INSERT('$par','$jugador','$pos');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }

    public function delete($id)
    {
        $query="CALL SP_ALINEACION_DELETE($id);";
        $bd= new conexion();
            $dt=$bd->execute_query($query);
            return $dt;
    }


}  
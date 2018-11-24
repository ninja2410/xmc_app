<?php
require_once('../../Conexion/conexion.php');
/**
 * MEDICO DE JUGADORES
 */
class Entrenamiento
{

  private $query;

  public function select($id)
    {
        $conexion=new conexion();
        $conexion->conectar();
        if ($id==-1) 
        {
            $query="SELECT E.id_entrenamiento, E.fecha , E.id_categoria, C.nombre as categoria, T.descripcion ,E.estado FROM ENTRENAMIENTO E 
            INNER JOIN CATEGORIA C ON E.id_categoria = C.id_categoria
            INNER JOIN TEMPORADA T ON E.id_temporada = T.id_temporada;";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        }
        else
        {
            $query="SELECT E.id_entrenamiento, E.fecha , E.id_categoria, C.nombre as categoria, T.descripcion , T.id_temporada ,E.estado FROM ENTRENAMIENTO E 
            INNER JOIN CATEGORIA C ON E.id_categoria = C.id_categoria
            INNER JOIN TEMPORADA T ON E.id_temporada = T.id_temporada WHERE id_entrenamiento=$id";
            $tmp=mysqli_query($conexion->objetoconexion,$query);
            $dt=mysqli_fetch_assoc($tmp);
        }
        $conexion->desconectar();
        return $dt;
    }


    public function selectAsistencia($id)
    {
        $conexion=new conexion();
        $conexion->conectar();
        if ($id==-1) 
        {
            $query="SELECT CONCAT(J.nombre,concat(' ',J.apellido)) as Nombre,DT.id_entrenamiento, DT.id_jugador, DT.ejecutado,DT.permiso,
            DT.atraso,DT.retiro,DT.falta,DT.motivo FROM DETALLE_ENTRENAMIENTO DT
            INNER JOIN JUGADOR J ON DT.id_jugador = J.id_jugador";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        }
        else
        {
            $query="SELECT CONCAT(J.nombre,concat(' ',J.apellido)) as Nombre,DT.id_entrenamiento, DT.id_jugador, DT.ejecutado,DT.permiso,
            DT.atraso,DT.retiro,DT.falta,DT.motivo FROM DETALLE_ENTRENAMIENTO DT
            INNER JOIN JUGADOR J ON DT.id_jugador = J.id_jugador
            where id_entrenamiento = $id";
            $dt=mysqli_query($conexion->objetoconexion,$query);
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

    public function insert($horayfecha, $categoria, $temporada)
    {
        $query="CALL SP_ENTRENAMIENTO_INSERT ('$horayfecha','$categoria','$temporada');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }

    public function update($id, $horayfecha, $categoria, $temporada)
    {
        $query="CALL SP_ENTRENAMIENTO_UPDATE('$id' ,'$horayfecha','$categoria','$temporada');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }

    public function delete($id)
    {
        $query="UPDATE ENTRENAMIENTO SET estado=0 where id_entrenamiento=$id";
        $bd= new conexion();
            $dt=$bd->execute_query($query);
            return $dt;
    }


}  
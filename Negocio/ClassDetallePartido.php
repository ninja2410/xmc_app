<?php
require_once('..\..\Conexion\conexion.php');
/**
 * MEDICO DE JUGADORES
 */
class Detalle
{

  private $query;

  public function selectXela($id)
    {
        $conexion=new conexion();
        $conexion->conectar();

            $query="SELECT id_detalle_partido,esquinas, faltas,asistencias,fuera_juego,tiros,tiros_puerta,tarjeta_amarilla,
            tarjeta_roja,cambios,goles,expulsados,DETALLE_PARTIDO.id_equipo,
            EQUIPO.nombre as equipo,id_partido FROM DETALLE_PARTIDO 
            INNER JOIN EQUIPO ON DETALLE_PARTIDO.id_equipo = EQUIPO.id_equipo
            WHERE id_partido=$id and EQUIPO.id_equipo=1";
            $tmp=mysqli_query($conexion->objetoconexion,$query);
            $dt=mysqli_fetch_assoc($tmp);
        
        $conexion->desconectar();
        return $dt;
    }

    public function selectResultados($id)
    {
        $conexion=new conexion();
        $conexion->conectar();

            $query="SELECT PARTIDO.id_temporada,TEMPORADA.descripcion, 
            SUM(DETALLE_PARTIDO.esquinas) AS esquinas,
            SUM(DETALLE_PARTIDO.faltas) AS faltas,
            SUM(DETALLE_PARTIDO.asistencias) AS asistencias,
            SUM(DETALLE_PARTIDO.tiros) AS tiros,
            SUM(DETALLE_PARTIDO.tiros_puerta) AS tiros_puerta,
            SUM(DETALLE_PARTIDO.tarjeta_amarilla) AS ta,
            SUM(DETALLE_PARTIDO.tarjeta_roja) AS tr,
            SUM(DETALLE_PARTIDO.fuera_juego) AS fj,
            SUM(DETALLE_PARTIDO.cambios) AS cam,
            SUM(DETALLE_PARTIDO.goles) AS gol,
            SUM(DETALLE_PARTIDO.expulsados) AS exp FROM DETALLE_PARTIDO 
            INNER JOIN PARTIDO ON PARTIDO.id_partido=DETALLE_PARTIDO.id_partido 
            INNER JOIN TEMPORADA ON PARTIDO.id_temporada = TEMPORADA.id_temporada
            WHERE  DETALLE_PARTIDO.id_equipo=1 GROUP BY PARTIDO.id_temporada";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        $conexion->desconectar();
        return $dt;
    }

    public function selectTemporada($id)
    {
        $conexion=new conexion();
        $conexion->conectar();

            $query="SELECT PARTIDO.id_temporada,TEMPORADA.descripcion, 
            SUM(DETALLE_PARTIDO.esquinas) AS esquinas,
            SUM(DETALLE_PARTIDO.faltas) AS faltas,
            SUM(DETALLE_PARTIDO.asistencias) AS asistencias,
            SUM(DETALLE_PARTIDO.tiros) AS tiros,
            SUM(DETALLE_PARTIDO.tiros_puerta) AS tiros_puerta,
            SUM(DETALLE_PARTIDO.tarjeta_amarilla) AS ta,
            SUM(DETALLE_PARTIDO.tarjeta_roja) AS tr,
            SUM(DETALLE_PARTIDO.fuera_juego) AS fj,
            SUM(DETALLE_PARTIDO.cambios) AS cam,
            SUM(DETALLE_PARTIDO.goles) AS gol,
            SUM(DETALLE_PARTIDO.expulsados) AS exp FROM DETALLE_PARTIDO 
            INNER JOIN PARTIDO ON PARTIDO.id_partido=DETALLE_PARTIDO.id_partido 
            INNER JOIN TEMPORADA ON PARTIDO.id_temporada = TEMPORADA.id_temporada
            WHERE  DETALLE_PARTIDO.id_equipo=1 AND PARTIDO.id_temporada=$id";
            $tmp=mysqli_query($conexion->objetoconexion,$query);
            $dt=mysqli_fetch_assoc($tmp);
        
        $conexion->desconectar();
        return $dt;
    }

    public function selectContrario($id,$idcont)
    {
        $conexion=new conexion();
        $conexion->conectar();

            $query="SELECT id_detalle_partido,esquinas, faltas,asistencias,fuera_juego,tiros,tiros_puerta,tarjeta_amarilla,
            tarjeta_roja,cambios,goles,expulsados,DETALLE_PARTIDO.id_equipo,
            EQUIPO.nombre as equipo,id_partido FROM DETALLE_PARTIDO 
            INNER JOIN EQUIPO ON DETALLE_PARTIDO.id_equipo = EQUIPO.id_equipo
            WHERE id_partido=$id and EQUIPO.id_equipo=$idcont";
            $tmp=mysqli_query($conexion->objetoconexion,$query);
            $dt=mysqli_fetch_assoc($tmp);
        
        $conexion->desconectar();
        return $dt;
    }

    public function insert($esq,$fal, $asis, $tiros,$tiros_puerta,$ta,$tr,$fj,$cam,$gol,$exp,$equi,$partido)
    {
        $query="CALL SP_DETALLE_PARTIDO_INSERT('$esq','$fal','$asis', '$tiros','$tiros_puerta','$ta','$tr','$fj','$cam','$gol','$exp','$equi','$partido');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }

    public function update($id, $esq,$fal, $asis, $tiros,$tiros_puerta,$ta,$tr,$fj,$cam,$gol,$exp,$equi,$partido)
    {
        $query="CALL SP_DETALLE_PARTIDO_UPDATE('$id','$esq','$fal','$asis', '$tiros','$tiros_puerta','$ta','$tr','$fj','$cam','$gol','$exp','$equi','$partido');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }
    public function delete($id)
    {
        $query="CALL SP_DETALLE_PARTIDO_DELETE($id);";
        $bd= new conexion();
            $dt=$bd->execute_query($query);
            return $dt;
    }

}

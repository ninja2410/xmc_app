<?php
require_once('..\..\Conexion\conexion.php');
/**
 * MEDICO DE JUGADORES
 */
class Partido
{

  private $query;

  public function select($id)
    {
        $conexion=new conexion();
        $conexion->conectar();
        if ($id==-1)
        {
            $query="SELECT id_partido,fecha,EQUIPO.id_equipo,EQUIPO.nombre AS equipo,
            partido.id_categoria,CATEGORIA.nombre AS categoria,PARTIDO.id_estadio,
            ESTADIO.nombre AS estadio,PARTIDO.id_temporada,
            TEMPORADA.descripcion AS temporada,observaciones FROM PARTIDO 
            INNER JOIN CATEGORIA ON PARTIDO.id_categoria = CATEGORIA.id_categoria 
            INNER JOIN TEMPORADA ON PARTIDO.id_temporada = TEMPORADA.id_temporada 
            INNER JOIN ESTADIO ON PARTIDO.id_estadio = ESTADIO.id_estadio
            INNER JOIN EQUIPO ON PARTIDO.id_equipo = EQUIPO.id_equipo ;";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        }
        else
        {
            $query="SELECT id_partido,fecha,EQUIPO.id_equipo,EQUIPO.nombre AS equipo,
            partido.id_categoria,CATEGORIA.nombre as categoria,PARTIDO.id_estadio,
            ESTADIO.nombre as estadio,PARTIDO.id_temporada,
            TEMPORADA.descripcion as temporada,observaciones from PARTIDO 
            inner join CATEGORIA INNER JOIN TEMPORADA INNER JOIN ESTADIO 
            INNER JOIN EQUIPO WHERE id_partido=$id";
            $tmp=mysqli_query($conexion->objetoconexion,$query);
            $dt=mysqli_fetch_assoc($tmp);
        }
        $conexion->desconectar();
        return $dt;
    }
    public function insert($fecha,$cat, $estadio, $equi,$temp,$obs)
    {
        $query="CALL SP_PARTIDO_INSERT('$fecha','$cat','$estadio','$equi','$temp','$obs');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }

    public function update($id, $fecha,$cat, $estadio, $equi,$temp,$obs)
    {
        $query="CALL SP_PARTIDO_UPDATE('$id','$fecha','$cat','$estadio','$equi','$temp','$obs');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }
    public function delete($id)
    {
        $query="CALL SP_PARTIDO_DELETE($id);";
        $bd= new conexion();
            $dt=$bd->execute_query($query);
            return $dt;
    }

}

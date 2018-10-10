<?php
require_once('..\..\Conexion\conexion.php');
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
            $query="SELECT * FROM ALINEACION WHERE estado=1";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        }
        else
        {
            $query="SELECT * FROM ALINEACION WHERE id_alineacion=$id AND estado=1";
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
            $query="SELECT * FROM ALINEACION WHERE id_partido=$id AND estado=1";
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

    public function update($id,$par,$jugador,$pos)
    {
        $query="CALL SP_ALINEACION_UPDATE('$id','$par','$jugador','$pos');";
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
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
            $query="SELECT * FROM PARTIDO";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        }
        else
        {
            $query="SELECT * FROM PARTIDO WHERE id_partido=$id";
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

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
            $query="SELECT * FROM partido";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        }
        else
        {
            $query="SELECT * FROM partido WHERE idpartido=$id AND estado=1";
            $tmp=mysqli_query($conexion->objetoconexion,$query);
            $dt=mysqli_fetch_assoc($tmp);
        }
        $conexion->desconectar();
        return $dt;
    }
    public function insert($fecha, $h1, $cat, $estadio, $ga,$gc,$equi,$temp,$h2,$estado)
    {
        $query="CALL SP_PARTIDO_INSERT('$fecha','$h1','$cat','$estadio','$ga','$gc','$equi','$temp','$h2','$estado');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }

    public function update($id, $partido, $pass)
    {
        $query="CALL SP_PARTIDO_UPDATE('$id','$fecha','$h1','$cat','$estadio','$ga','$gc','$equi','$temp','$h2','$estado');";
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
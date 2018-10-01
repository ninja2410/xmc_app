<?php
require_once('..\..\Conexion\conexion.php');
/**
 * MEDICO DE JUGADORES
 */
class PersonalTecnico
{

  private $query;

  public function select($id)
    {
        $conexion=new conexion();
        $conexion->conectar();
        if ($id==-1)
        {
            $query="SELECT * FROM PERSONAL_TECNICO";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        }
        else
        {
            $query="SELECT * FROM PERSONAL_TECNICO WHERE id_partido=$id";
            $tmp=mysqli_query($conexion->objetoconexion,$query);
            $dt=mysqli_fetch_assoc($tmp);
        }
        $conexion->desconectar();
        return $dt;
    }
    public function selectCargo($id)
    {
        $conexion=new conexion();
        $conexion->conectar();
        if ($id==-1)
        {
            $query="SELECT * FROM CARGO_TECNICO";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        }
        else
        {
            $query="SELECT * FROM CARGO_TECNICO WHERE id_partido=$id";
            $tmp=mysqli_query($conexion->objetoconexion,$query);
            $dt=mysqli_fetch_assoc($tmp);
        }
        $conexion->desconectar();
        return $dt;
    }
    public function insert($partido, $cargo, $nombre)
    {
        $query="CALL SP_PERSONAL_TECNICO_INSERT('$partido','$cargo','$nombre');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }

    public function update($id,$partido, $cargo, $nombre)
    {
        $query="CALL SP_PERSONAL_TECNICO_UPDATE('$id','$partido','$cargo','$nombre');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }
    public function delete($id)
    {
        $query="CALL SP_PERSONAL_TECNICO_DELETE($id);";
        $bd= new conexion();
            $dt=$bd->execute_query($query);
            return $dt;
    }




}

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
            $query="SELECT id_personal_tecnico,id_partido,nombre, 
            CARGO_TECNICO.id_cargo_tecnico, CARGO_TECNICO.cargo as 
            cargo FROM PERSONAL_TECNICO INNER JOIN CARGO_TECNICO ON CARGO_TECNICO.id_cargo_tecnico = PERSONAL_TECNICO.id_cargo_tecnico
            WHERE id_partido=$id";
            $dt=mysqli_query($conexion->objetoconexion,$query);
            
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

    public function update($partido, $cargo, $nombre)
    {
        $query="CALL SP_PERSONAL_TECNICO_UPDATE('$partido','$cargo','$nombre');";
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

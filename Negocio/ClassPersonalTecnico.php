<?php
require_once('../../Conexion/conexion.php');
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
            $query="SELECT CT.cargo, P.fecha ,PT.id_personal_tecnico,PT.id_partido,PT.id_cargo_tecnico,PT.nombre FROM PERSONAL_TECNICO PT
            INNER JOIN CARGO_TECNICO  CT ON PT.id_cargo_tecnico = CT.id_cargo_tecnico 
            INNER JOIN PARTIDO  P ON P.id_partido = PT.id_partido";
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

    public function selectUpdate($id)
    {
        $conexion=new conexion();
        $conexion->conectar();
            $query="SELECT CARGO_TECNICO.CARGO, CARGO_TECNICO.ID_CARGO_TECNICO, PERSONAL_TECNICO.nombre, PERSONAL_TECNICO.id_partido FROM CARGO_TECNICO
            LEFT JOIN PERSONAL_TECNICO ON CARGO_TECNICO.ID_CARGO_TECNICO = PERSONAL_TECNICO.ID_CARGO_TECNICO
            WHERE PERSONAL_TECNICO.id_partido = $id";
            $tmp=mysqli_query($conexion->objetoconexion,$query);
            $dt=mysqli_fetch_assoc($tmp);
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

    public function update($id, $nombre)
    {
        $query="CALL SP_PERSONAL_TECNICO_UPDATE('$id','$nombre');";
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

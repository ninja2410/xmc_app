<?php
require_once('../../Conexion/conexion.php');
/**
 * MEDICO DE JUGADORES
 */
class Membresia
{

  private $query;

  public function select($id)
    {
        $conexion=new conexion();
        $conexion->conectar();
        if ($id==-1)
        {
            $query="SELECT * FROM MEMBRESIA WHERE estado=1";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        }
        else
        {
            $query="SELECT * FROM MEMBRESIA WHERE id_membresia=$id AND estado=1";
            $tmp=mysqli_query($conexion->objetoconexion,$query);
            $dt=mysqli_fetch_assoc($tmp);
        }
        $conexion->desconectar();
        return $dt;
    }



    public function selectBeneficio($id)
    {
        $conexion=new conexion();
        $conexion->conectar();
        if ($id==-1)
        {
            $query="SELECT * FROM BENEFICIO WHERE estado=1";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        }
        else
        {
            $query="SELECT * FROM BENEFICIO WHERE id_membresia=$id AND estado=1";
            $tmp=mysqli_query($conexion->objetoconexion,$query);
            $dt=mysqli_fetch_assoc($tmp);
        }
        $conexion->desconectar();
        return $dt;
    }

    public function selectPermisoMembresia($id)
    {
        $conexion=new conexion();
        $conexion->conectar();
        if ($id==-1)
        {
            $query="SELECT * FROM ASIGNACION_BENEFICIO WHERE id_membresia=$id";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        }
        else
        {
            $query="SELECT * FROM ASIGNACION_BENEFICO WHERE id_membresia=$id";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        }
        $conexion->desconectar();
        return $dt;
    }

    

    public function insert($nom, $des,$precio)
    {
        $query="CALL SP_MEMBRESIA_INSERT('$nom', '$des','$precio');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }

    public function deleteBeneficio($ben)
    {
        $query="CALL SP_ASIGNACION_BENEFICIO_DELETE('$ben');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }

    public function insertBeneficio($id_per)
    {
        $query="CALL SP_ASIGNACION_BENEFICIO_INSERT('$id_per');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }

    public function updateBeneficio($id_mem,$ben)
    {
        $query="CALL SP_ASIGNACION_BENEFICIO_UPDATE('$id_mem','$ben');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }

    public function update($id, $nom, $des,$precio)
    {
        $query="CALL SP_MEMBRESIA_UPDATE('$id','$nom', '$des','$precio');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }
    public function delete($id)
    {
        $query="CALL SP_MEMBRESIA_DELETE($id);";
        $bd= new conexion();
            $dt=$bd->execute_query($query);
            return $dt;
    }


}

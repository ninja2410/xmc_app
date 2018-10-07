<?php
require_once('..\..\Conexion\conexion.php');
/**
 * MEDICO DE JUGADORES
 */
class Bitacora
{

  private $query;

  public function select($id)
    {
        $conexion=new conexion();
        $conexion->conectar();
        if ($id==-1) 
        {
            $query="SELECT id_bitacora,accion,fecha,hora,BITACORA.id_usuario,USUARIO.nombre_usuario from BITACORA INNER JOIN USUARIO 
            ON BITACORA.id_usuario=USUARIO.id_usuario ;";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        }
        else
        {
            $query="SELECT * FROM BITACORA WHERE id_alineacion=$id AND estado=1";
            $tmp=mysqli_query($conexion->objetoconexion,$query);
            $dt=mysqli_fetch_assoc($tmp);
        }
        $conexion->desconectar();
        return $dt;
    }
    public function insert($accion,$id_usuario)
    {
        $query="CALL SP_BITACORA_INSERT('$accion','$id_usuario');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }

}  
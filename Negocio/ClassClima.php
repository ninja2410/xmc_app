<?php
require_once('../../Conexion/conexion.php');
/**
 * MEDICO DE JUGADORES
 */
class Usuario
{

  private $query;

  public function select($id)
    {
        $conexion=new conexion();
        $conexion->conectar();
        if ($id==-1) 
        {
            $query="SELECT * FROM clima";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        }
        $conexion->desconectar();
        return $dt;
    }

}  
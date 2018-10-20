<?php
require_once('..\..\Conexion\conexion.php');
/**
 * DATOS GENERALES DE PARTIDO
 */
class DatoPartido
{

  private $query;

  public function select($id)
    {
        $conexion=new conexion();
        $conexion->conectar();
        if ($id==-1)
        {
            $query="SELECT * FROM DATO_PARTIDO;";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        }
        $conexion->desconectar();
        return $dt;
    }

}

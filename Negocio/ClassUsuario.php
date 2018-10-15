<?php
require_once('..\..\Conexion\conexion.php');
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
            $query="SELECT * FROM USUARIO WHERE estado=1";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        }
        else
        {
            $query="SELECT * FROM USUARIO WHERE id_usuario=$id AND estado=1";
            $tmp=mysqli_query($conexion->objetoconexion,$query);
            $dt=mysqli_fetch_assoc($tmp);
        }
        $conexion->desconectar();
        return $dt;
    }

    public function Loggin($username,$password)
    {
        $conexion=new conexion();
        $conexion->conectar();
            $query="CALL SP_USUARIO_LOGIN('$username','$password')";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        $conexion->desconectar();
        return $dt;
    }

    public function nusuario($username)
    {
        $conexion=new conexion();
        $conexion->conectar();
            $query="CALL SP_NUSUARIO('$username')";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        $conexion->desconectar();
        return $dt;
    }

    public function selectPermiso($id)
    {
        $conexion=new conexion();
        $conexion->conectar();
        if ($id==-1)
        {
            $query="SELECT * FROM PERMISO WHERE estado=1";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        }
        else
        {
            $query="SELECT * FROM USUARIO WHERE id_usuario=$id AND estado=1";
            $tmp=mysqli_query($conexion->objetoconexion,$query);
            $dt=mysqli_fetch_assoc($tmp);
        }
        $conexion->desconectar();
        return $dt;
    }

    public function selectPermisoUsuario($id)
    {
        $conexion=new conexion();
        $conexion->conectar();
        if ($id==-1)
        {
            $query="SELECT * FROM ASIGNACION_PERMISO WHERE id_usuario=$id";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        }
        else
        {
            $query="SELECT * FROM ASIGNACION_PERMISO WHERE id_usuario=$id";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        }
        $conexion->desconectar();
        return $dt;
    }

    

    public function insert($usuario, $pass,$nombre,$apellido,$foto,$email)
    {
        $query="CALL SP_USUARIO_INSERT('$usuario','$pass','$nombre','$apellido','$foto','$email');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }

    public function deletePermisos($usuario)
    {
        $query="CALL SP_ASIGNACION_PERMISO_DELETE('$usuario');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }

    public function insertPermiso($id_per)
    {
        $query="CALL SP_ASIGNACION_PERMISO_INSERT('$id_per');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }

    public function updatePermiso($id_per,$id_us)
    {
        $query="CALL SP_ASIGNACION_PERMISO_UPDATE('$id_per','$id_us');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }

    public function update($id, $usuario, $pass,$nombre,$apellido,$foto,$email)
    {
        $query="CALL SP_USUARIO_UPDATE('$id','$usuario','$pass','$nombre','$apellido','$foto','$email');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }
    public function delete($id)
    {
        $query="CALL SP_USUARIO_DELETE($id);";
        $bd= new conexion();
            $dt=$bd->execute_query($query);
            return $dt;
    }


}

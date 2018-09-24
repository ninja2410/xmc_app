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
            $query="SELECT * FROM usuario WHERE estado=1";
            $dt=mysqli_query($conexion->objetoconexion,$query);
        }
        else
        {
            $query="SELECT * FROM usuario WHERE idusuario=$id AND estado=1";
            $tmp=mysqli_query($conexion->objetoconexion,$query);
            $dt=mysqli_fetch_assoc($tmp);
        }
        $conexion->desconectar();
        return $dt;
    }
    public function insert($usuario, $pass)
    {
        $query="CALL SP_USUARIO_INSERT('$usuario','$pass');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }

    public function update($id, $usuario, $pass)
    {
        $query="CALL SP_USUARIO_UPDATE('$id','$usuario','$pass');";
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

    function opciones() {
        $texto = '';
        $conexion=new conexion();
        $conexion->conectar();
        
        $query="SELECT * FROM usuario WHERE estado=1";
        $dt=mysqli_query($conexion->objetoconexion,$query);
        
        if (mysqli_num_rows($dt) > 0){ 

            while($fila = mysqli_fetch_assoc($dt)){ 
                // se recoge la información según la vamos a pasar a la variable de javascript
                $texto .= '"' . $fila['nombreusuario'] . '",';
                }
        
        }else{
                $texto = "NO HAY RESULTADOS EN LA BBDD";	
        }
        // Después de trabajar con la bbdd, cerramos la conexión (por seguridad, no hay que dejar conexiones abiertas)
        $conexion->desconectar();
        return $texto;
       
    }

}  
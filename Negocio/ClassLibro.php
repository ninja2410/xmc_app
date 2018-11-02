<?php
require_once('../Biblioteca/Conexion/conexion.php');
class Libro
{
	public function get()
	{
		$bd= new conexion();
		$bd->conectar();
		$consultasql="SELECT * FROM libro";
		$dt = mysqli_query($bd->obgetoconexion,$consultasql);
		$bd->desconectar();
		return $dt;
	}
	
	public function set($datos=array())
	{
		$db = new conexion();
		$db->conectar();
		 foreach ($datos as $campo=>$valor){                     
		 	$$campo = $valor;                 
		 }
		$cadena = "INSERT INTO libro(titulo,id_autor) 
					VALUES('$titulo','$id_autor')";	 
		$consulta = mysqli_query($db->obgetoconexion,$cadena);
		$db->desconectar();
		echo "<script type=\"text/javascript\">alert(\"Registro Agregado\");</script>";
	}
}
?>
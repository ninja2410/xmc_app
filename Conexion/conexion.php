<?php
class conexion
{
	private $servidor='localhost';
	private $usuario="root";
	private $pass="database";
	private $bd="db_xelajumc";
	public  $objetoconexion;

	public function conectar()
	{
		$this->objetoconexion= mysqli_connect($this->servidor,$this->usuario,$this->pass,$this->bd) or die ("error en conexion");
	}
	public function desconectar()
	{
		mysqli_close($this->objetoconexion);
	}
}

?>

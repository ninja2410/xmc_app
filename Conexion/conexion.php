<?php
class conexion
{
	// private $servidor='localhost';
	// private $usuario="root";
	// private $pass="database";
	// private $bd="db_xelajumc";

	private $servidor='sql3.freemysqlhosting.net';
	private $usuario="sql3258884";
	private $pass="HHZi7qwKFs";
	private $bd="sql3258884";
	public  $objetoconexion;

	public function conectar()
	{
		$this->objetoconexion= mysqli_connect($this->servidor,$this->usuario,$this->pass,$this->bd) or die ("error en conexion");
	}
	public function desconectar()
	{
		mysqli_close($this->objetoconexion);
	}
	public function execute_query($query){
		$error=0;
		$this->conectar();
		try {
			$dt = mysqli_query($this->objetoconexion,$query);
		} catch (\Exception $e) {
			$error=1;
			echo "ERROR: ".$e->getMessage();
		}
		$this->desconectar();
		return $dt;
	}
}

?>

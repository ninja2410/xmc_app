<?php
class conexion
{
	// private $servidor='localhost';
	// private $usuario="root";
	// private $pass="database";
	// private $bd="db_xelajumc";

	private $servidor='198.71.241.28';
	private $usuario="dev_xelaju";
	private $pass="database";
	private $bd="dev_xela";

	//private $servidor='sql174.main-hosting.eu';
	//private $usuario="u538043044_root";
	//private $pass="database";
	//private $bd="u538043044_xela";


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

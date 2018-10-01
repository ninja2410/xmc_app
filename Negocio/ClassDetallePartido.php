<?php
require_once('..\..\Conexion\conexion.php');
/**
 * MEDICO DE JUGADORES
 */
class Detalle
{

  private $query;

  public function selectXela($id)
    {
        $conexion=new conexion();
        $conexion->conectar();

            $query="SELECT * FROM DETALLE_PARTIDO WHERE id_partido=$id and id_equipo=1";
            $tmp=mysqli_query($conexion->objetoconexion,$query);
            $dt=mysqli_fetch_assoc($tmp);
        
        $conexion->desconectar();
        return $dt;
    }

    public function selectContrario($id,$idcont)
    {
        $conexion=new conexion();
        $conexion->conectar();

            $query="SELECT * FROM DETALLE_PARTIDO WHERE id_partido=$id and id_equipo=$idcon";
            $tmp=mysqli_query($conexion->objetoconexion,$query);
            $dt=mysqli_fetch_assoc($tmp);
        
        $conexion->desconectar();
        return $dt;
    }

    public function insert($esq,$fal, $asis, $tiros,$tiros_puerta,$ta,$tr,$fj,$cam,$gol,$exp,$equi,$partido)
    {
        $query="CALL SP_DETALLE_PARTIDO_INSERT('$esq','$fal','$asis', '$tiros','$tiros_puerta','$ta','$tr','$fj','$cam','$gol','$exp','$equi','$partido');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }

    public function update($id, $esq,$fal, $asis, $tiros,$tiros_puerta,$ta,$tr,$fj,$cam,$gol,$exp,$equi,$partido)
    {
        $query="CALL SP_DETALLE_PARTIDO_UPDATE('$id','$esq','$fal','$asis', '$tiros','$tiros_puerta','$ta','$tr','$fj','$cam','$gol','$exp','$equi','$partido');";
        $bd= new conexion();
		$dt=$bd->execute_query($query);
		return $dt;
    }
    public function delete($id)
    {
        $query="CALL SP_DETALLE_PARTIDO_DELETE($id);";
        $bd= new conexion();
            $dt=$bd->execute_query($query);
            return $dt;
    }

}

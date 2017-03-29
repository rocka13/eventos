<?php 
require_once('core/model/conexion.php');
session_start();

class Consultas
{
	function verEventos()
	{
		$rows=[];
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$sql="SELECT * FROM evento";
		$consulta = $conexion->query($sql);
		return($consulta);
	}

}

	function mostrar()
		{
			$consultas = new Consultas();
			return $filas = $consultas->verEventos();
		}

	$consultaEvento = mostrar();

		if (!isset($_SESSION['correo'])) {
		$_SESSION['correo'] = '';
		}


		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$sql="UPDATE conteo SET cantidad=cantidad+1 WHERE id_evento = 0";
		$consulta = $conexion->query($sql);

		$sqlconteo="SELECT * FROM conteo WHERE id_evento = 0";
		$consulta_conteo=$conexion->query($sqlconteo);
		$resultConteo = $consulta_conteo->fetch_object();

		$cadena = $resultConteo->cantidad;
		$nume =strlen($cadena);
		$matriz = str_split($cadena);

?>
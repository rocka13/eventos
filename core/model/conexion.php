<?php

	class conexion{
		public function get_conexion()
		{
			$user = "b2297f89ef9de6";
			$pass = "f05e73d0";
			$host = "us-cdbr-azure-west-b.cleardb.com";
			$db   = "eventosgirardot";
			$conexion = new mysqli($host,$user,$pass,$db);
			$conexion->set_charset("utf8");
			return $conexion;
		}

	}


?>
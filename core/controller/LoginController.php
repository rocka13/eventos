<?php
session_start();

if(!empty($_GET['salir']))
{

	$_SESSION['id']='';
	$_SESSION['rol'];
    $_SESSION['correo'];
	session_destroy();
	header("Location:../..");
}

if(!empty($_POST['entrar'])){
require_once('../../core/model/conexion.php');

$modelo = new conexion();
$conexion = $modelo->get_conexion();
$sql="SELECT * FROM usuario WHERE correo='".$_POST['correo']."' AND clave='".$_POST['clave']."'";
$consulta = $conexion->query($sql);
$num=mysqli_num_rows($consulta);

     if($num>0){
     	$row=$consulta->fetch_object();
     	$_SESSION['id']=$row->id_usuario;
     	$_SESSION['rol']=$row->d_rol;
     	$_SESSION['correo']=$row->correo;

    	 if($row->d_rol==1){header("Location:../..");
 		}else if($row->d_rol==2){header("Location:../editor");
 		}else if($row->d_rol==3){header("Location:../administrador");
		}else {$error = "no tienes permisos";}
     }
	}
?>
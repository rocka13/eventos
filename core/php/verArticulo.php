<?php
include('../model/conexion.php');


$di=$_POST['di'];

		$modelo = new conexion();
		$conexion = $modelo->get_conexion();

		$sql="SELECT evento.*, categoria_evento.nom_categoria FROM evento, categoria_evento WHERE categoria_evento.id_categoria_evento=evento.id_categoria_evento AND id_evento=$di";
		$consulta = $conexion->query($sql);
		$reg = $consulta->fetch_object();
		$categoria = $reg->id_categoria_evento;

		$sqlAnt="SELECT * FROM evento WHERE id_evento < $di AND $categoria=id_categoria_evento ORDER BY id_evento DESC LIMIT 1";
		$consultaAnt = $conexion->query($sqlAnt);
		$regAnt = $consultaAnt->fetch_object();
		if(empty($regAnt)){
			$btnAnt = "";
		}else{
			$btnAnt = '<a href="javascript:irArticulo('.$regAnt->id_evento.');" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span></a>';
		}


		$sqlSig="SELECT * FROM evento WHERE id_evento > $di AND $categoria=id_categoria_evento ORDER BY id_evento ASC LIMIT 1";
		$consultaSig = $conexion->query($sqlSig);
		$regSig = $consultaSig->fetch_object();
			if(empty($regSig)){
				$btnSig = "";
		}else{
				$btnSig ='<a href="javascript:irArticulo('.$regSig->id_evento.');" class="btn btn-success"><span class="glyphicon glyphicon-arrow-right"></span></a>';
		}
		
		$sqlImagen="SELECT url FROM multimedia WHERE id_evento=$di LIMIT 1";
    	$consulta_imagen=$conexion->query($sqlImagen);
    	$resultImagen = $consulta_imagen->fetch_object();

?>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h1 class="text-center">
			<?php echo strtoupper($reg->nom_evento); ?>
		</h1>
	</div>
  	<div class="panel-body">
   		<div class="row articulo">
   			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 text-justify">
   				<a href="#">
   					<img src="imagenes/bbdd/<?= $resultImagen->url; ?>"  class="img-articulo img-responsive img-thumbnail center-block">
   				</a>
   				<span class=""><?php echo $reg->descripcion; ?>
   				</span>
   			</div>
   			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
   			<br><br>
   			<p class="bg-info text-center"><?php echo $reg->nom_categoria; ?></p>
   				<table class="table">
	  				<tr>
	  					<td>Fecha de Inicio: </td>
	  					<td><?php echo $reg->ff_evento; ?></td>
	  				</tr>
	  				<tr>
	  					<td>Hora de Inicio: </td>
	  					<td><?php echo $reg->hh_inicio; ?></td>
	  				</tr>
	  				<tr>
	  					<td>Fecha de Finalicacion: </td>
	  					<td><?php echo $reg->ff_evento; ?></td>
	  				</tr>
	  				<tr>
	  					<td>Hora de Finalicacion: </td>
	  					<td><?php echo $reg->hh_final; ?></td>
	  				</tr>
  				</table>
  				<br>
	  			<center>
	  				<button class="btn btn-success">Comprar
	  				</button>
	   				<button class="btn btn-warning">Contratar
	   				</button>
	   				<br><br>
	   			</center>
   			</div>	
   		</div>
   	</div>
  	<div class="panel-footer">
  		<div class="row">
  			<div class="col-xs-1 col-sm-2 col-md-3 col-lg-3">
  			</div>
  			<div class="col-xs-10 col-sm-8 col-md-6 col-lg-6">
  			<center>
  			<?php echo $btnAnt; ?>
  				<a href="../../" class="btn btn-info"><span>Inicio</span></a>
  			<?php echo $btnSig; ?>
  			</center>
  			</div>
  			<div class="col-xs-1 col-sm-2 col-md-3 col-lg-3">
  			</div>
  		</div>
  	</div>
</div>
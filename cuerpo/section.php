 
<section>
   <div class="conteo"><?php for($i = 0; $i < $nume; $i++){
        echo '<button class="btn btn-warning">'.$matriz[$i].'</button><br>';
        } ?></div>
<?php while($reg_evento=$consultaEvento->fetch_object()){ $di=$reg_evento->id_evento; ?>
    <div class="section col-xs-12 col-sm-6 col-md-4 text-justify">
        <h2 class="text-center"><?php echo $reg_evento->nom_evento; ?></h2>
        <figure>
        <?php 
            $sqlImagen="SELECT url FROM multimedia WHERE id_evento=$di LIMIT 1";
    		$consulta_imagen=$conexion->query($sqlImagen);
    		$resultImagen = $consulta_imagen->fetch_object();
        ?>
        <img src="imagenes/bbdd/<?= $resultImagen->url; ?>" class="img-responsive img-thumbnail center-block">
        </figure>
        <p><?php echo substr($reg_evento->descripcion,0,214); ?>...
        <a href="javascript:irArticulo(<?php echo $reg_evento->id_evento; ?>); " class="btn btn-link">Leer mas
        </a>
        </p>
    </div>
<?php } ?>            
</section>

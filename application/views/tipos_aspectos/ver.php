
<?php foreach ($tipos_aspectos as $item): ?>
	<br/>
	<?php echo "Tipo: ".$item->nombre; ?>
	<br/>
	<br/>
	<?php echo "Descripcion: ".$item->descripcion; ?>
	<br/>
	<br/>
	
<?php endforeach; ?>

<?php if($aspectos){
	foreach ($aspectos as $itemAsp):
	 	if($itemAsp->active){
			echo "<a href=".base_url()."index.php/aspectos/ver/".$itemAsp->id.">".$itemAsp->nombre."</a>";
			echo " ";
			echo "<button><a href=".base_url()."index.php/aspectos/borrar/".$itemAsp->id."> Eliminar </a></button>";
			echo " ";
			echo "<button><a href=".base_url()."index.php/aspectos/actualizar/".$itemAsp->id.">Editar</a></button>";
			echo "<br/>";
		}
	endforeach;
	?>

	<?php

	 }else{
	echo "<br/>No tiene aspectos aún";
}?>
<br/>
<?php echo "<a href=".base_url()."index.php/aspectos/agregar/".$this->uri->segment(3)."> Agregar aspecto </a>"?>

<button><a href="http://localhost/enny/index.php/tipos_aspectos/tipos_aspectos">Lista tipos</a></button>



<?php foreach ($tipos_legislaciones as $item): ?>
	<br/>
	<?php echo "Nivel: ".$item->nombre; ?>
	<br/>
	<br/>
	<?php echo "Descripcion: ".$item->descripcion; ?>
	<br/>
	<br/>
	
<?php endforeach; ?>

<?php if($legislaciones){
	foreach ($legislaciones as $itemAsp):
	 	if($itemAsp->active){
			echo "<a href=".base_url()."index.php/legislaciones/ver/".$itemAsp->id.">".$itemAsp->nombre."</a>";
			echo " ";
			echo "<button><a href=".base_url()."index.php/legislaciones/borrar/".$itemAsp->id."> Eliminar </a></button>";
			echo " ";
			echo "<button><a href=".base_url()."index.php/legislaciones/actualizar/".$itemAsp->id.">Editar</a></button>";
			echo "<br/>";
		}
	endforeach;
	?>

	<?php

	 }else{
	echo "<br/>No tiene legislaciones aún";
}?>
<br/>
<?php echo "<a href=".base_url()."index.php/legislaciones/agregar/".$this->uri->segment(3)."> Agregar legislación </a>"?>

<button><a href="http://localhost/enny/index.php/tipos_legislaciones/tipos_legislaciones">Lista tipos_legislaciones</a></button>


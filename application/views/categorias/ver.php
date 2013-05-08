
<?php foreach ($categorias as $item): ?>
	<br/>
	<?php echo "Tipo de usuario: ".$item->nombre; ?>
	<br/>
	<?php echo "Descripción: ".$item->descripcion; ?>
	<br/>
	
<?php endforeach; ?>

<?php if($usuarios){
	foreach ($usuarios as $itemAct):
	 	if($itemAct->active){
			echo "<a href=".base_url()."index.php/usuariosa/ver/".$itemAct->id.">".$itemAct->nombre."</a>";
			echo " ";
			echo "<button><a href=".base_url()."index.php/usuariosa/borrar/".$itemAct->id."> Eliminar </a></button>";
			echo " ";
			echo "<button><a href=".base_url()."index.php/usuariosa/actualizar/".$itemAct->id.">Editar</a></button>";
			echo "<br/>";
		}
	endforeach;
	?>

	<?php

	 }else{
	echo "<br/>No tiene usuarios aún";
}?>
<br/>
<?php echo "<a href=".base_url()."index.php/usuariosa/agregar/".$this->uri->segment(3)."> Agregar usuario </a>"?>

<button><a href="http://localhost/enny/index.php/categorias/categorias">Lista tipos de usuarios</a></button>


<?php foreach ($areas as $item): ?>
	<br/>
	<?php echo "Área: ".$item->nombre; ?>
	<br/>
	<?php echo "Descripción: ".$item->descripcion; ?>
	<br/>
	<?php echo "Tipo: ".$item->tipo; ?>
	<br/>
	<br/>
	
<?php endforeach; ?>

<?php if($actividades){
	foreach ($actividades as $itemAct):
	 	if($itemAct->active){
			echo "<a href=".base_url()."index.php/actividades/ver/".$itemAct->id.">".$itemAct->nombre."</a>";
			echo " ";
			echo "<button><a href=".base_url()."index.php/actividades/eliminar/".$itemAct->id."> Eliminar </a></button>";
			echo " ";
			echo "<button><a href=".base_url()."index.php/actividades/editar/".$itemAct->id.">Editar</a></button>";
			echo "<br/>";
		}
	endforeach;
	?>

	<?php

	 }else{
	echo "<br/>No tiene actividades aún";
}?>
<br/>
<?php echo "<a href=".base_url()."index.php/actividades/nueva/".$this->uri->segment(3)."> Agregar actividad </a>"?>

<button><a href="<?php echo base_url(); ?>index.php/areas/">Lista áreas</a></button>



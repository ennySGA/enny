
<?php 
	$this->load->helper('html');
	$this->load->helper('url');
	?>
	<h4>Aspectos:</h4>

	<?php if ($aspectos) foreach ($aspectos as $item): ?>
	
	<p>
		<?php if($item->active){ ?>
		<?php echo "<a href=".base_url()."index.php/aspectos/ver/".$item->id.">".$item->nombre."</a>";?>
		<?php echo "<a href=".base_url()."index.php/aspectos/borrar/".$item->id."> Eliminar </a>";?>
		<?php echo "<a href=".base_url()."index.php/aspectos/actualizar/".$item->id.">Editar</a>" ?>
		<?php } ?>
	</p>

	<?php endforeach; ?>

	<?php echo anchor('aspectos/agregar', 'Nuevo aspecto'); ?>


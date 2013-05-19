<?php 
	$this->load->helper('html');
	$this->load->helper('url');
	?>
	<h4>Actividades:</h4>

	<?php if ($actividades) foreach ($actividades as $item): ?>
	
	<p>
		<?php if($item->active){ ?>
		<?php echo "<a href=".base_url()."index.php/actividades/ver/".$item->id.">".$item->nombre."</a>";?>
		<?php echo "<a href=".base_url()."index.php/actividades/borrar/".$item->id."> Eliminar </a>";?>
		<?php echo "<a href=".base_url()."index.php/actividades/actualizar/".$item->id.">Editar</a>" ?>
		<?php } ?>
	</p>

	<?php endforeach; ?>

	<?php echo anchor('actividades/agregar', 'Nueva actividad'); ?>

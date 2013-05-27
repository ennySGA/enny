<?php 
	$this->load->helper('html');
	$this->load->helper('url');
	?>
	<h4>Actividades:</h4>

	<?php foreach ($actividades as $item): ?>
	
	<p>
		<?php if($item->active){ ?>
		<?php echo "<a href=".base_url()."index.php/actividades/ver/".$item->id.">".$item->nombre."</a>";?>
		<?php echo "<a href=".base_url()."index.php/actividades/eliminar/".$item->id."> Eliminar </a>";?>
		<?php echo "<a href=".base_url()."index.php/actividades/editar/".$item->id.">Editar</a>" ?>
		<?php } ?>
	</p>

	<?php endforeach; ?>

	<?php echo anchor('actividades/nueva', 'Nueva actividad'); ?>

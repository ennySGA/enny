<?php 
	$this->load->helper('html');
	$this->load->helper('url');
	?>
	<h4>objetivos:</h4>

	<?php if ($objetivos) foreach ($objetivos as $item): ?>
	
	<p>
		<?php if($item->active){ ?>
		<?php echo "<a href=".base_url()."index.php/objetivos/ver/".$item->id.">".$item->nombre."</a>";?>
		<?php echo "<a href=".base_url()."index.php/objetivos/eliminar/".$item->id."> Eliminar </a>";?>
		<?php echo "<a href=".base_url()."index.php/objetivos/editar/".$item->id.">Editar</a>" ?>
		<?php } ?>
	</p>

	<?php endforeach; ?>

	<?php echo anchor('objetivos/nuevo', 'Nuevo objetivo'); ?>
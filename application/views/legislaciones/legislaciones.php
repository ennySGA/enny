
<?php 
	$this->load->helper('html');
	$this->load->helper('url');
	?>
	<h4>Legislaciones:</h4>

	<?php foreach ($legislaciones as $item): ?>
	
	<p>
		<?php if($item->active){ ?>
		<?php echo "<a href=".base_url()."index.php/legislaciones/ver/".$item->id.">".$item->nombre."</a>";?>
		<?php echo "<a href=".base_url()."index.php/legislaciones/eliminar/".$item->id."> Eliminar </a>";?>
		<?php echo "<a href=".base_url()."index.php/legislaciones/editar/".$item->id.">Editar</a>" ?>
		<?php } ?>
	</p>

	<?php endforeach; ?>

	<?php echo anchor('legislaciones/nuevo', 'Nueva legislación'); ?>

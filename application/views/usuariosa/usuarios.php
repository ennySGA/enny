
<?php 
	$this->load->helper('html');
	$this->load->helper('url');
	?>
	<h4>Usuarios:</h4>

	<?php foreach ($usuarios as $item): ?>
	
	<p>
		<?php if($item->active){ ?>
		<?php echo "<a href=".base_url()."index.php/usuarios/ver/".$item->id.">".$item->nombre"</a>";?>
		<?php echo "<a href=".base_url()."index.php/usuarios/borrar/".$item->id."> Eliminar </a>";?>
		<?php echo "<a href=".base_url()."index.php/usuarios/actualizar/".$item->id.">Editar</a>" ?>
		<?php } ?>
	</p>

	<?php endforeach; ?>

	<?php echo anchor('usuarios/agregar', 'Nuevo usuario'); ?>

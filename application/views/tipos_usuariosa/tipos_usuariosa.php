
<?php 
	$this->load->helper('html');
	$this->load->helper('url');
	?>

	<h4>Tipos de usuario:</h4>

	<?php if ($tipos_usuarios) foreach($tipos_usuariosa as $item):?>

		<p>
		<?php if($item->active){ ?>
		<?php echo "<a href=".base_url()."index.php/tipos_usuariosa/ver/".$item->id.">".$item->nombre."</a>";?>
		<?php echo "<a href=".base_url()."index.php/tipos_usuariosa/borrar/".$item->id."> Eliminar </a>";?>
		<?php echo "<a href=".base_url()."index.php/tipos_usuariosa/actualizar/".$item->id.">Editar</a>" ?>
		<?php } ?>
		</p>

	<?php endforeach;?>


	<?php echo anchor('tipos_usuariosa/agregar', 'Nueva Categoría');?>


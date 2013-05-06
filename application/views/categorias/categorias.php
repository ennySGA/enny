
<?php 
	$this->load->helper('html');
	$this->load->helper('url');
	?>

	<h4>Tipos de usuario:</h4>

	<?php foreach($categorias as $item):?>

		<p>
		<?php if($item->active){ ?>
		<?php echo "<a href=".base_url()."index.php/categorias/ver/".$item->id.">".$item->nombre."</a>";?>
		<?php echo "<a href=".base_url()."index.php/categorias/eliminar/".$item->id."> Eliminar </a>";?>
		<?php echo "<a href=".base_url()."index.php/categorias/editar/".$item->id.">Editar</a>" ?>
		<?php } ?>
		</p>

	<?php endforeach;?>


	<?php echo anchor('categorias/nuevaCategoria', 'Nueva Categoría');?>


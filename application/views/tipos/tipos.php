
<?php 
	$this->load->helper('html');
	$this->load->helper('url');
	?>

	<h4>Tipos:</h4>

	<?php foreach($tipos as $item):?>

		<p>
		<?php if($item->active){ ?>
		<?php echo "<a href=".base_url()."index.php/tipos/ver/".$item->id.">".$item->nombre."</a>";?>
		<?php echo "<a href=".base_url()."index.php/tipos/borrar/".$item->id."> Eliminar </a>";?>
		<?php echo "<a href=".base_url()."index.php/tipos/actualizar/".$item->id.">Editar</a>" ?>
		<?php } ?>
		</p>

	<?php endforeach;?>


	<?php echo anchor('tipos/agregar', 'Nuevo tipo');?>



<?php 
	$this->load->helper('html');
	$this->load->helper('url');
	?>

	<h4>Tipos:</h4>

	<?php foreach($tipos as $item):?>

		<p>
		<?php if($item->active){ ?>
		<?php echo "<a href=".base_url()."index.php/tipos/ver/".$item->id.">".$item->nombre."</a>";?>
		<?php echo "<a href=".base_url()."index.php/tipos/eliminar/".$item->id."> Eliminar </a>";?>
		<?php echo "<a href=".base_url()."index.php/tipos/editar/".$item->id.">Editar</a>" ?>
		<?php } ?>
		</p>

	<?php endforeach;?>


	<?php echo anchor('tipos/nuevoTipo', 'Nuevo tipo');?>


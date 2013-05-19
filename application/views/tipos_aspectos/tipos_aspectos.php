
<?php 
	$this->load->helper('html');
	$this->load->helper('url');
	?>

	<h4>Tipos:</h4>

	<?php if ($tipos_aspectos) foreach($tipos_aspectos as $item):?>

		<p>
		<?php if($item->active){ ?>
		<?php echo "<a href=".base_url()."index.php/tipos_aspectos/ver/".$item->id.">".$item->nombre."</a>";?>
		<?php echo "<a href=".base_url()."index.php/tipos_aspectos/borrar/".$item->id."> Eliminar </a>";?>
		<?php echo "<a href=".base_url()."index.php/tipos_aspectos/actualizar/".$item->id.">Editar</a>" ?>
		<?php } ?>
		</p>

	<?php endforeach;?>


	<?php echo anchor('tipos_aspectos/agregar', 'Nuevo tipo');?>



<?php 
	$this->load->helper('html');
	$this->load->helper('url');
	?>

	<h4>Niveles:</h4>

	<?php if ($tipos_legislaciones) foreach($tipos_legislaciones as $item):?>

		<p>
		<?php if($item->active){ ?>
		<?php echo "<a href=".base_url()."index.php/tipos_legislaciones/ver/".$item->id.">".$item->nombre."</a>";?>
		<?php echo "<a href=".base_url()."index.php/tipos_legislaciones/borrar/".$item->id."> Eliminar </a>";?>
		<?php echo "<a href=".base_url()."index.php/tipos_legislaciones/actualizar/".$item->id.">Editar</a>" ?>
		<?php } ?>
		</p>

	<?php endforeach;?>


	<?php echo anchor('tipos_legislaciones/agregar', 'Nuevo nivel');?>

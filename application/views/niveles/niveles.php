
<?php 
	$this->load->helper('html');
	$this->load->helper('url');
	?>

	<h4>Niveles:</h4>

	<?php foreach($niveles as $item):?>

		<p>
		<?php if($item->active){ ?>
		<?php echo "<a href=".base_url()."index.php/niveles/ver/".$item->id.">".$item->nombre."</a>";?>
		<?php echo "<a href=".base_url()."index.php/niveles/eliminar/".$item->id."> Eliminar </a>";?>
		<?php echo "<a href=".base_url()."index.php/niveles/editar/".$item->id.">Editar</a>" ?>
		<?php } ?>
		</p>

	<?php endforeach;?>


	<?php echo anchor('niveles/nuevoNivel', 'Nuevo nivel');?>

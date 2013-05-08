

				<?php 
					$this->load->helper('html');
					$this->load->helper('url');
					?>

					<h4>Áreas:</h4>

					<?php foreach($areas as $item):?>

						<p>
						<?php if($item->active){ ?>
						<?php echo "<a href=".base_url()."index.php/areas/ver/".$item->id.">".$item->nombre."</a>";?>
						<?php echo "<a href=".base_url()."index.php/areas/borrar/".$item->id."> Eliminar </a>";?>
						<?php echo "<a href=".base_url()."index.php/areas/actualizar/".$item->id.">Editar</a>" ?>
						<?php } ?>
						</p>

					<?php endforeach;?>


					<?php echo anchor('areas/agregar', 'Nueva Area');?>

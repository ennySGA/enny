

				<?php 
					$this->load->helper('html');
					$this->load->helper('url');
					?>

					<h4>Áreas:</h4>

					<?php foreach($areas as $item):?>

						<p>
						<?php if($item->active){ ?>
						<?php echo "<a href=".base_url()."index.php/areas/ver/".$item->id.">".$item->nombre."</a>";?>
						<?php echo "<a href=".base_url()."index.php/areas/eliminar/".$item->id."> Eliminar </a>";?>
						<?php echo "<a href=".base_url()."index.php/areas/editar/".$item->id.">Editar</a>" ?>
						<?php } ?>
						</p>

					<?php endforeach;?>


					<?php echo anchor('areas/nuevaArea', 'Nueva Area');?>

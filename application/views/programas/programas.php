	<ul class="quick-actions">

		<?php 
		$cont = 0;
		if($programas){ ?>
			<?php foreach($programas as $item):?>

				<?php if($item->activo){ ?>

					<li>
						<?php echo "<a href=".base_url()."index.php/programas/ver/".$item->id.">"?>
							<i><img src=" <?php echo base_url().'/uploads/'.$item->imagen; ?>"  width="80" height="50"></i>
						</a>
							<?php echo "<a href=".base_url()."index.php/programas/ver/".$item->id.">".$item->nombre."</a>";?>
							<?php echo "<a href=".base_url()."index.php/programas/editar/".$item->id."><button class='btn btn-info btn-mini'>Editar</button></a>" ?>
							<?php echo "<a href=".base_url()."index.php/programas/eliminar/".$item->id."> <button class='btn btn-danger btn-mini'>Eliminar</button> </a>";?>
					</li>

				<?php } ?>

				<?php endforeach;?>

		<?php }else{
				echo "<h3>No hay programas registrados</h3>";
			}?>
			
		
		</ul>
		
	</div>	
</div>

<div class="row-fluid">
	<div class="span12 center" style="text-align: center;">	
		<?php echo anchor('programas/nuevoPrograma', '<button class="btn btn-info">Nuevo Programa</button>');?>
	</div>
</div>

			

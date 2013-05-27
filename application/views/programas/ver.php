<div class="widget-box">
	<div class='widget-title'>
		<span class="icon">
			<i class="icon-road"></i>
		</span>
		<h5>Avance de objetivos</h5>
	</div>
	
	<div class="widget-content">
		<table class='table'>
			<tr>
				<th>nombre</th>
				<th>metas</th>
				<th>terminadas</th>
				<th>avance</th>
			</tr>
			<?php foreach($datos_tabla as $objetivo){ ?>
			<tr>
				<td><?php echo $objetivo['nombre'] ?></td>
				<td><?php echo $objetivo['total_metas'] ?></td>
				<td><?php echo $objetivo['total_terminadas'] ?></td>
				<td>
					<div class="progress progress-success">
						<div style="width: <?php echo $objetivo['porcentaje'] ?>%;" class="bar"></div>
					</div>
				</td>
			</tr>
			<?php } ?>
		</table>

	</div>
</div>	

<div class="widget-box">

			<div class="widget-title">
				<span class="icon">
					<i class="icon-signal"></i>
				</span>
				<h5>Programa</h5>
			</div>				

			<div class="widget-content">
			<?php foreach ($programas as $item): ?>

				<i><img src=" <?php echo base_url().'/uploads/'.$item->imagen; ?>"  width="180" height="90" style="align: center;"></i>

				<br/>
				<?php echo "<h5>Programa:</h5> ".$item->nombre; ?>
				<br/>
				<?php echo "<h5>Descripción:</h5> ".$item->descripcion; ?>
				<br/>

			<?php endforeach; ?>

			<h5>Objetivos:</h5>
			<ul class="quick-actions">
			<?php if($objetivos){
				foreach ($objetivos as $itemObj):
				 	if($itemObj->active){

					 echo "<li>";
					 echo "<a href=".base_url()."index.php/objetivos/single/".$itemObj->id.">"?>
						<img src=" <?php echo base_url().'/uploads/'.$itemObj->imagen; ?>"  width="80" height="50">
					</a>
						<?php
						echo "<a href=".base_url()."index.php/objetivos/single/".$itemObj->id.">".$itemObj->nombre."</a>";
						echo "<a href=".base_url()."index.php/objetivos/editar/".$itemObj->id."><button class='btn btn-info btn-mini'>Editar</button></a>";
						echo "<a href=".base_url()."index.php/objetivos/eliminar/".$itemObj->id."> <button class='btn btn-danger btn-mini'>Eliminar</button> </a>";
						echo "<br/>";
					echo "</li>";
					}
				endforeach;
				?>
			<?php

			 }else{
				echo "<br/>No tiene objetivos aún";
			}?>
			</div>
			</div>
		</div>	
	</div>

	<div class="row-fluid">
		<div class="span12 center" style="text-align: center;">	
			<?php echo anchor(base_url()."index.php/objetivos/nuevo/".$this->uri->segment(3), '<button class="btn btn-info">Agregar Objetivo</button>');?>
		</div>
	</div>
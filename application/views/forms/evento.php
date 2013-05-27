<div class="widget-box nuevo-evento-w" style="display:none">
	<?php
		$publicos=array(
			'todos'=>'todos',
			'empleados'=>'empleados',
			'niños'=>'niños',
			'vecinos'=>'vecinos',
			'clientes'=>'clientes',
			'proveedores'=>'proveedores',
			'ejecutivos'=>'ejecutivos',
		);

		if(validation_errors()){
		echo "<div class='row'>";
			echo "<div class='alert alert-error'>".validation_errors().'</div>';
		echo "</div>";
		}
		if(isset($message)){
		echo "<div class='row'>";
		    echo "<div class='alert alert-success'>".$message.'</div>';
		echo "</div>"; 
		}

		//echo form_open('items/saveItemEvento');
		?>
		<div class="widget-title">
			<span class="icon"><i class="icon-list-alt"></i></span>
			<input type='text' name='widget_nombre' placeholder='Nombre' />
		</div>
		<div class="widget-content">
			<h4>Evento</h4>
			<div style="width:50%">
				<form action='<?php echo base_url(); ?>index.php/items/saveItemEvento/<?php echo $id; ?>' method='POST' class="form-horizontal">
					<div class="control-group">
						<div class="control-group">
							<label class="control-label" for="nombre">Nombre</label>
							<div class="controls">
						    	<input type="text" name="nombre">
						    </div>
						</div>
						<div class="control-group">
							<label class="control-label" for="descripcion">Descripción</label>
							<div class="controls">
						    	<?php echo form_textarea('descripcion'); ?>
						    </div>
						</div>
						<div class="control-group">
							<label class="control-label" for="fecha_evento">Fecha del evento</label>
							<div class="controls">
						    	<?php echo form_input('fecha_evento', '', 'class="datepicker"'); ?>
						    </div>
						</div>
						<div class="control-group">
							<label class="control-label" for="publico">Participantes</label>
							<div class="controls">
						    	<?php echo form_dropdown('publico', $publicos); ?>
						    </div>
						</div>
						<div class="control-group">
							<label class="control-label" for="opciones">Opciones</label>
							<div class="controls">
						    	<?php 
						    	echo form_checkbox('publicar', 'accept', false)."Publicar.<br />";
								echo form_checkbox('interno', 'accept', false)."Interno."; 
								?>
						    </div>
						</div>
						<div class="control-group">
							<label class="control-label" for="responsable">Responsable</label>
							<div class="controls">
						    	<?php echo form_input('responsable'); ?>
						    </div>
						</div>
						<div class="control-group">
							<label class="control-label" for="lugar">Lugar</label>
							<div class="controls">
						    	<?php echo form_input('lugar');	 ?>
						    </div>
						</div>
						<div class="control-group">
							<div class="controls">
						    	<input type='submit' class='btn btn-primary' value='Guardar' name='save'>
								<a class="btn btn-danger cancel-w" href="#">Cancelar</a>
						    </div>
						</div>
						<input type='hidden' value='<?php echo $id; ?>' name='obj_id'>
						<input type='hidden' value='<?php echo $user_id; ?>' name='usuario_id'>
						
					</div>
					
				</form>
			</div>
		</div>
	</form>
</div>	


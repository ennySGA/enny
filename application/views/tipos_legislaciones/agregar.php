
	<?php 
	$this->load->helper('html');
	$this->load->helper('form');
	echo form_open('tipos_legislaciones/addNivel'); ?>

		<div>
			<label>Nivel: </label>
			<?php echo form_input('nombre', set_value('nombre')); ?>
		</div>

		<div>
			<label>Descripción: </label>
			<?php echo form_textarea('descripcion', set_value('descripcion')); ?>
		</div>

		<div>
			<label></label>
			<?php echo form_submit('guardar', 'Guardar'); ?>
		</div>

	</form>

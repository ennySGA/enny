

	<?php 
	$this->load->helper('html');
	$this->load->helper('form');
	echo form_open('areas/agregar'); ?>

		<div>
			<label>Area: </label>
			<?php echo form_input('nombre', set_value('nombre')); ?>
		</div>

		<div>
			<label>Descripcion: </label>
			<?php echo form_textarea('descripcion', set_value('descripcion')) ?>
		</div>

		<div>
			<label>Tipo: </label>
			<?php echo form_input('tipo', set_value('tipo')) ?>
		</div>

		<div>
			<label></label>
			<?php echo form_submit('guardar', 'Guardar'); ?>
		</div>

	</form>


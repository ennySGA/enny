
<?php 
	$this->load->helper('html');
	$this->load->helper('form');
	$id = $this->uri->segment(3);
	echo form_open('tipos_aspectos/actualizar'); ?>

		<div>
			<input type="hidden" name="id" id='id' value=<?php echo "'".$id."'"; ?> />
		</div>
		
		<div>
			<label>Tipo: </label>
			<?php  echo form_input('nombre', set_value('nombre', $nombre)); ?>
		</div>

		<div>
			<label>Descripción: </label>
			<?php  echo form_textarea('descripcion', set_value('descripcion', $descripcion)); ?>
		</div>

		<div>
			<label></label>
			<?php echo form_submit('guardar', 'Guardar'); ?>
		</div>

	</form>


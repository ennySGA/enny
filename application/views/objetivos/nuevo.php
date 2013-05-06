<?php 
$this->load->helper('html');
$this->load->helper('form');
echo form_open_multipart('objetivos/nuevo'); ?>
<div>
	<input type="hidden" name="programa_id" id='programa_id' value=<?php echo "'".$this->uri->segment(3)."'"; ?> />
</div>

<div>
	<label>Objetivo: </label>
	<?php  echo form_input('nombre', set_value('nombre')); ?>
</div>

<div>
	<label>Descripcion: </label>
	<?php echo form_textarea('descripcion', set_value('descripcion')) ?>
</div>

<div>
	<label>Imagen: </label>
	<?php echo form_upload('userfile[]', set_value('imagen'),'') ?>
</div>

<div>
	<label></label>
	<?php echo form_submit('guardar', 'Guardar'); ?>
</div>

	</form>
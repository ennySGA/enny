
<?php 
$this->load->helper('html');
$this->load->helper('form');
$id = $this->uri->segment(3);
echo form_open('usuarios/actualizar'); ?>

<div>
	<input type="hidden" name="id" id='id' value=<?php echo "'".$id."'"; ?> />
</div>
<div>
	<label>Nombre: </label>
	<?php  echo form_input('nombre', set_value('nombre', $nombre)); ?>
</div>

<div>
	<label>Apellido: </label>
	<?php echo form_input('apellido', set_value('apellido', $apellido)) ?>
</div>

<div>
	<label>Correo: </label>
	<?php echo form_input('correo', set_value('correo', $correo)) ?>
</div>

<div>
	<input type="hidden" name="categoria_id" id='categoria_id' value=<?php echo "'".$categoria_id."'"; ?> />
</div>

<div>
	<label></label>
	<?php echo form_submit('guardar', 'Guardar'); ?>
</div>

	</form>



<?php 
$this->load->helper('html');
$this->load->helper('form');
echo form_open('usuarios/agregar'); ?>
<div>
	<input type="hidden" name="categoria_id" id='categoria_id' value=<?php echo "'".$this->uri->segment(3)."'"; ?> />
</div>

<div>
	<label>Nombre: </label>
	<?php  echo form_input('nombre', set_value('nombre')); ?>
</div>

<div>
	<label>Apellido: </label>
	<?php echo form_input('apellido', set_value('apellido')) ?>
</div>

<div>
	<label>Correo: </label>
	<?php echo form_input('correo', set_value('correo')) ?>
</div>

<div>
	<label>Contraseña: </label>
	<?php echo form_password('password', set_value('password')) ?>
</div>

<div>
	<label></label>
	<?php echo form_submit('guardar', 'Guardar'); ?>
</div>

	</form>


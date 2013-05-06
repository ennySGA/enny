
<?php 
$this->load->helper('html');
$this->load->helper('form');
echo form_open('legislaciones/nuevo'); ?>
<div>
	<input type="hidden" name="nivel_id" id='nivel_id' value=<?php echo "'".$this->uri->segment(3)."'"; ?> />
</div>

<div>
	<label>Legislación: </label>
	<?php  echo form_input('nombre', set_value('nombre')); ?>
</div>

<div>
	<label>Descripcion: </label>
	<?php echo form_textarea('descripcion', set_value('descripcion')) ?>
</div>

<div>
	<label></label>
	<?php echo form_submit('guardar', 'Guardar'); ?>
</div>

	</form>


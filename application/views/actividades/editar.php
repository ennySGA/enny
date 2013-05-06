
<?php 
$this->load->helper('html');
$this->load->helper('form');
$id = $this->uri->segment(3);
echo form_open('actividades/editar'); ?>

<div>
	<input type="hidden" name="id" id='id' value=<?php echo "'".$id."'"; ?> />
</div>
<div>
	<label>Actividad: </label>
	<?php  echo form_input('nombre', set_value('nombre', $nombre)); ?>
</div>

<div>
	<label>Descripcion: </label>
	<?php echo form_textarea('descripcion', set_value('descripcion', $descripcion)) ?>
</div>

<div>
	<input type="hidden" name="area_id" id='area_id' value=<?php echo "'".$area_id."'"; ?> />
</div>

<div>
	<label></label>
	<?php echo form_submit('guardar', 'Guardar'); ?>
</div>

	</form>

	
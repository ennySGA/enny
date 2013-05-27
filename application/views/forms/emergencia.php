<div class="widget-box nuevo-emergencia-w" style="display:none">
	<form action='<?php echo base_url(); ?>index.php/items/saveItemEmergencia/' method='POST'>
		<div class="widget-title">
			<span class="icon"><i class="icon-list-alt"></i></span>
			<input type='text' name='widget_nombre' placeholder='Nombre' />
		</div>
		<div class="widget-content">
			<h4>Respuesta ante emergencia</h4>
			<div class="control-group">
				<input type='hidden' value='<?php echo $id; ?>' name='obj_id'>
				<input type='hidden' value='<?php echo $user_id; ?>' name='usuario_id'>
			</div>
			<input type='submit' class='btn btn-primary' value='Guardar' name='save'>
			<a class="btn btn-danger cancel-w" href="#">Cancelar</a>
		</div>
	</form>
</div>	
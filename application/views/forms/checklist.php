<div class="widget-box nuevo-check-w" style="display:none">
	<form action='<?php echo base_url(); ?>index.php/items/saveItemChecklist/<?php echo $id; ?>' method='POST'>
		<div class="widget-title">
			<span class="icon"><i class="icon-list-alt"></i></span>
			<input type='text' name='widget_nombre' placeholder='Nombre' />
		</div>
		<div class="widget-content">
			<h4>Checklist:</h4>
			<div class="control-group">
				<input type='hidden' value='<?php echo $id; ?>' name='obj_id'>
				<input type='hidden' value='<?php echo $user_id; ?>' name='usuario_id'>
				<div class="controls">
					<input type='text' name='cuerpo[]' placeholder='Opción del checklist' />
					<div class='checkinline'><input type='checkbox' name='status[]'></div>
					<button class='del-reg btn btn-danger btn-mini'><i class='icon-trash'></i> Borrar</button>
				</div>
			</div>
			<button id='add-check' class='btn btn-info'>Agregar</button>
			<input type='submit' class='btn btn-primary' value='Guardar' name='save' />
			<a class="btn btn-danger cancel-w" href="#">Cancelar</a>
		</div>
	</form>
</div>	

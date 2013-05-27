<div class="widget-box nuevo-legislacion-w" style="display:none">
	<form action='<?php echo base_url(); ?>index.php/items/saveItemLegislacion/' method='POST'>
		<div class="widget-title">
			<span class="icon"><i class="icon-list-alt"></i></span>
			<input type='text' name='widget_nombre' placeholder='Nombre' />
		</div>
		<div class="widget-content">
			<h4>Legilación ambiental</h4>
			<div class="control-group">
				<input type='hidden' value='<?php echo $id; ?>' name='obj_id'>
				<input type='hidden' value='<?php echo $user_id; ?>' name='usuario_id'>
				<div class="controls">
					<select name="legislacion">
						<option value="1">Legislación ambiental</option>
					</select>
					<button class="del-reg btn btn-danger btn-mini"><i class="icon-trash"></i> Borrar</button>
				</div>
			</div>
			<button id='add-legislacion' class='btn btn-info'>Agregar</button>
			<input type='submit' class='btn btn-primary' value='Guardar' name='save'>
			<a class="btn btn-danger cancel-w" href="#">Cancelar</a>
		</div>
	</form>
</div>	

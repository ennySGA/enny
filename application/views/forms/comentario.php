<div class="widget-box nuevo-comentario-w" style="display:none">
	<form action='<?php echo base_url(); ?>index.php/items/saveItemComments/<?php echo $id; ?>' method='POST'>
		<div class="widget-title">
			<span class="icon"><i class="icon-list-alt"></i></span>
			<h5>Comentarios</h5>
		</div>
		<div class="widget-content">
			<div class="control-group">
				<input type='hidden' value='<?php echo $id; ?>' name='obj_id'>
				<input type='hidden' value='<?php echo $user_id; ?>' name='usuario_id'>
				<div class='controls'>
					<textarea style='width:100%' name='cuerpo' rows='7'></textarea>
				</div>
			</div>
			<input type='submit' class='btn btn-primary' value='Guardar' name='save'>
			<a class="btn btn-danger cancel-w" href="#">Cancelar</a>
		</div>
	</form>
</div>	


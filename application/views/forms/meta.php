<div class="widget-box nuevo-meta-w" style="display:none">
	<?php
	$metricas=array(
	'Kg'=>'Kg',
	'Ha'=>'Ha',
	'Personas'=>'Personas'
	);

	$tipo=array(
	'Reducir'=>'Reducir',
	'Mantener'=>'Mantener',
	'Incrementar'=>'Incrementar'
	);

	if(validation_errors()){
	echo "<div class='row'>";
	echo "<div class='alert alert-error'>".validation_errors().'</div>';
	echo "</div>";
	}
	if(isset($message)){
	echo "<div class='row'>";
	echo "<div class='alert alert-success'>".$message.'</div>';
	echo "</div>"; 
	}
	?>
		<div class="widget-title">
			<span class="icon"><i class="icon-list-alt"></i></span>
			<input type='text' name='widget_nombre' value='Metas' />
		</div>
		<div class="widget-content">
			<h4>Metas</h4>
			<div style="width:50%">
				<?php
				//echo form_open('items/saveItemMeta',array('class'=>'form-horizontal'));
				?>
				<form action='<?php echo base_url(); ?>index.php/items/saveItemMeta/<?php echo $id; ?>' method='POST' class="form-horizontal">
				<div class="control-group">
					<label class="control-label" for="nombre">Nombre</label>
					<div class="controls">
				    	<input type="text" name="nombre">
				    </div>
				</div>

			    <div class="control-group">
				    <label class="control-label" for="descripcion">Descripción</label>
					<div class="controls">
				    	<?php echo form_textarea(array('name'=>'descripcion','rows'=>'4')); ?>
				    </div>
				</div>
			    <div class="control-group">
				    <label class="control-label" for="edo_actual">Estado actual</label>
					<div class="controls">
				    	<input type="text" name="edo_actual">
				    </div>
				</div>     
				<div class="control-group">
				    <label class="control-label" for="edo_lograr">Estado a lograr</label>
					<div class="controls">
				    	<input type="text" name="edo_lograr">
				    </div>
				</div>             
			    <div class="control-group">
				    <label class="control-label" for="metrica">Métrica</label>
					<div class="controls">
				    	<?php $attributes = "style='width:auto'"; ?>
			            <?php echo form_dropdown('metrica', $metricas,'',$attributes); ?>
				    </div>
				</div>                   
			    <div class="control-group">
				    <label class="control-label" for="fecha_inicio">Fecha inicio</label>
					<div class="controls">
				    	<input type="text" name="fecha_inicio" style="width:auto" class="datepicker">
				    </div>
				</div>              
			    <div class="control-group">
				    <label class="control-label" for="fecha_meta">Fecha fin</label>
					<div class="controls">
				    	<input type="text" name="fecha_meta" style="width:auto" class="datepicker">
				    </div>
				</div>                   
			    <div class="control-group">
				    <label class="control-label" for="cuantificable">Cuantificable</label>
					<div class="controls">
				    	<?php echo form_checkbox('cuantificable', 'accept', true); ?>
				    </div>
				</div>                 
			    <div class="control-group">
				    <label class="control-label" for="cuantificable">Tipo</label>
					<div class="controls">
				    	<?php $attributes = "style='width:auto'"; ?>
			            <?php echo form_dropdown('tipo',$tipo,'',$attributes); ?>
				    </div>
				</div>                

			    <div class="control-group">
				    <div class="controls">
						<input type='hidden' value='<?php echo $id; ?>' name='obj_id'>
						<input type='hidden' value='<?php echo $user_id; ?>' name='usuario_id'>
						<input type='submit' class='btn btn-primary' value='Guardar' name='save'>
						<a class="btn btn-danger cancel-w" href="#">Cancelar</a>
				    </div>
				</div>
				</form>
				
			</div>
		</div>
</div>

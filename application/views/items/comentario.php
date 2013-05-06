<div class="widget-title"><span class="icon"><i class="icon-list-alt"></i></span><h5><?php echo $widget->widget_nombre; ?></h5><div class="buttons"><a href="#myAlert<?php echo $cont;?>" data-toggle="modal" class="btn btn-mini"><i class="icon-pencil"></i> Comentar</a><a href="<?php echo base_url()?>index.php/objetivos/delItem/<?php echo $widget->widgetobj_id.'/'.$id; ?>" class="btn btn-mini"><i class="icon-trash"></i> Borrar</a></div></div>
<div class="widget-content">

<ul class="recent-posts">
	<?php
	if($widget->rows)foreach ($widget->rows as $row) {
		?>
			<li>
				<div class="user-thumb">
					<img width="40" height="40" alt="User" src="<?php echo base_url(); ?>assets/img/dav.png">
				</div>
				<div class="article-post">
					<span class="user-info"> Por: <?php echo $row->username; ?> En <?php echo $row->creado; ?> </span>
					<p>
						<p><?php echo $row->cuerpo; ?></p>
					</p>
					<a href="#mec<?php echo $row->id;?>" data-toggle="modal" class="btn btn-primary btn-mini">Editar</a> <a href="#" class="btn btn-success btn-mini">Publicar</a> <a href="<?php echo base_url().'index.php/objetivos/borrarComent/'.$row->id.'/'.$id;?>" class="btn btn-danger btn-mini" >Borrar</a>
				</div>
			</li>

			<!--Modal de edición-->
			<div id="mec<?php echo $row->id;?>" class="modal hide" style="display: none;" aria-hidden="true">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button">×</button>
					<h3><?php echo $widget->widget_nombre; ?></h3>
				</div>
				<form id='ftext-<?php echo $cont; ?>' action='<?php echo base_url(); ?>index.php/objetivos/saveItem/<?php echo $id; ?>' method='POST' class='form-vertical'>
					<div class='modal-body'>
						<input type='hidden' value='<?php echo $widget->widgetobj_id;?>' name='w_id'>
						<input type='hidden' value='<?php echo $row->id;?>' name='id'>
						<input type='hidden' value='<?php echo $user_id; ?>' name='usuario_id'>
						<div class='form-elements'>
							<div class="control-group">
									<div class='form-fields'>
										<div class="controls">
											<textarea style="width:100%" name="cuerpo" rows="7"><?php echo $row->cuerpo;?></textarea>
										</div>
									</div>
							</div>
						</div>
					</div>
					<div class='modal-footer'>
						<input type='submit' class='btn btn-primary' value='Guardar' name='edit-comentario' >
						<a data-dismiss='modal' class='btn btn-danger' href='#'>Cancelar</a>
					</div>
				</form>
				<div class='mensaje'></div>
			</div>
		<?php
	}
	?>
	
	
	<li class="viewall">
		<a title="" class="tip-top" href="#" data-original-title="Ver todos los comentarios"> + Ver todo + </a>
	</li>
</ul>

<div id="myAlert<?php echo $cont;?>" class="modal hide" style="display: none;" aria-hidden="true">
	<div class="modal-header">
		<button data-dismiss="modal" class="close" type="button">×</button>
		<h3><?php echo $widget->widget_nombre; ?></h3>
	</div>
	<form id='ftext-<?php echo $cont; ?>' action='<?php echo base_url(); ?>index.php/objetivos/saveItem/<?php echo $id; ?>' method='POST' class='form-vertical'>
		<div class='modal-body'>
			<input type='hidden' value='<?php echo $widget->widgetobj_id;?>' name='w_id'>
			<input type='hidden' value='<?php echo $user_id; ?>' name='usuario_id'>
			<div class='form-elements'>
				<div class="control-group">
						<div class='form-fields'>
							<div class="controls">
								<textarea style="width:100%" name="cuerpo" rows="7"></textarea>
							</div>
						</div>
				</div>
			</div>
		</div>
		<div class='modal-footer'>
			<input type='submit' class='btn btn-primary' value='Guardar' name='add-comentario' >
			<a data-dismiss='modal' class='btn btn-danger' href='#'>Cancelar</a>
		</div>
	</form>
	<div class='mensaje'></div>
</div>

</div>
</div>	
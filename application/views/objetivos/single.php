
<div class="alert alert-info">
	En esta sección podrás gestionar el <strong>objetivo</strong> que seleccionaste, agregando diferentes tipos de <strong>elementos</strong>.
	<a href="#" data-dismiss="alert" class="close">×</a>
</div>

<?php if(isset($message)){ ?>
	<div class="alert alert-success">
		<?php echo $message; ?>
		<a href="#" data-dismiss="alert" class="close">×</a>
	</div>
<?php } ?>
<?php 
	if(validation_errors()){
		echo "<div class='alert alert-error'>".validation_errors().'</div>';
	}
 ?>
<?php if($metas){ ?>
<div class="widget-box">
	<div class='widget-title'>
		<span class="icon">
			<i class="icon-road"></i>
		</span>
		<h5>Metas</h5>
	</div>
	
	<div class="widget-content">
		<table class='table'>
			<tr>
				<th>nombre</th>
				<th>descripcion</th>
				<th>actual</th>
				<th>lograr</th>
				<th>tipo</th>
				<th>Terminada</th>
			</tr>
			<?php $i=0; ?>
			<?php foreach($metas as $meta){ ?>
			<tr>
				<td><?php echo $meta->nombre; ?></td>
				<td><?php echo $meta->descripcion; ?></td>
				<td><?php echo $meta->edo_actual; ?></td>
				<td><?php echo $meta->edo_lograr; ?></td>
				<td><?php echo $meta->tipo; ?></td>
				<td>
					<span class="icon">
						<i class="<?php echo $terminadas[$i]; ?>"></i>
					</span>
				</td>
			</tr>
			<?php $i++; ?>
			<?php } ?>
		</table>

	</div>
</div>
<?php } ?>


<?php
$cont=0; 
if($widgets) foreach ($widgets as $widget): ?>
<div class="widget-box">
	
	<?php
	switch ($widget->tipo) {
		case 'text':
			$data=array('widget'=>$widget,'id'=>$id,'cont'=>$cont);
			$this->load->view('items/texto',$data);
				
			break;
		case 'comentario':
			$data=array('widget'=>$widget,'id'=>$id,'cont'=>$cont,'user_id'=>$user_id);
			$this->load->view('items/comentario',$data);
				break;	
		case 'impacto':
			$data=array('widget'=>$widget,'id'=>$id,'cont'=>$cont,'user_id'=>$user_id);
			$this->load->view('items/impacto',$data);
			break;
		case 'check':
			$data=array('widget'=>$widget,'id'=>$id,'cont'=>$cont,'user_id'=>$user_id);
			$this->load->view('items/check',$data);
			break;
		case 'meta':
			$data=array('widget'=>$widget,'id'=>$id,'cont'=>$cont,'user_id'=>$user_id);
			$this->load->view('items/meta',$data);
			break;
		default:
			echo $widget->tipo;
			break;
		}
		$cont++;
		?>	
</div>
<?php endforeach; ?>
<?php
$data=array('id'=>$id,'cont'=>$cont,'user_id'=>$user_id);
/*$this->load->view('forms/texto',$data);//Normal - Done
$this->load->view('forms/checklist',$data);//Dinámico 
$this->load->view('forms/comentario',$data);//Uno por uno
$this->load->view('forms/meta',$data);
$this->load->view('forms/evento',$data);
$this->load->view('forms/emergencia',$data);
$this->load->view('forms/legislacion',$data);
$this->load->view('forms/responautor',$data);
$this->load->view('forms/impacto',$data);//
$this->load->view('forms/mapa',$data);//Normal
$this->load->view('forms/archivo',$data);
$this->load->view('forms/galeria',$data);*/
?>

	
<div style="text-align:center;">
	<div class="btn-group">
		<button id="nuevo-text" href="#nuevo-w" data-toggle="modal" class="btn btn-success tip-top" data-original-title="Texto"><i class="icon-list-alt icon-white"></i></button>
		<button id="nuevo-impacto" href="#nuevo-w" data-toggle="modal" class="btn btn-success tip-top" data-original-title="Impacto ambiental"><i class="icon-leaf icon-white"></i></button>
		<button id="nuevo-archivo" href="#nuevo-w" data-toggle="modal" class="btn btn-success tip-top" data-original-title="Archivos"><i class="icon-file icon-white"></i></button>
		<button id="nuevo-meta" href="#nueva-meta" data-toggle="modal" class="btn btn-success tip-top" data-original-title="Metas"><i class="icon-road icon-white"></i></button>
		<button id="nuevo-galeria" href="#nuevo-w" data-toggle="modal" class="btn btn-success tip-top" data-original-title="Galería"><i class="icon-picture icon-white"></i></button>
		<button id="nuevo-legislacion" href="#nuevo-w" data-toggle="modal" class="btn btn-success tip-top" data-original-title="Legislación ambiental"><i class="icon-briefcase icon-white"></i></button>
		<button id="nuevo-respuesta" href="#nuevo-w" data-toggle="modal" class="btn btn-success tip-top" data-original-title="Respuesta a emergencias"><i class="icon-warning-sign icon-white"></i></button>
		<button id="nuevo-comentario" href="#nuevo-com" data-toggle="modal" class="btn btn-success tip-top" data-original-title="Comentarios"><i class="icon-comment icon-white"></i></button>
		<button id="nuevo-evento" href="#nuevo-event" data-toggle="modal" class="btn btn-success tip-top" data-original-title="Eventos"><i class="icon-calendar icon-white"></i></button>
		<button id="nuevo-check" href="#nuevo-w" data-toggle="modal" class="btn btn-success tip-top" data-original-title="Lista de revisión"><i class="icon-check icon-white"></i></button>
		<button id="nuevo-responsabilidad" href="#nuevo-w" data-toggle="modal" class="btn btn-success tip-top" data-original-title="Responsabilidades y autoridades"><i class="icon-hand-right icon-white"></i></button>
		<button id="nuevo-mapa" href="#nuevo-w" data-toggle="modal" class="btn btn-success tip-top" data-original-title="Mapa"><i class="icon-map-marker icon-white"></i></button>
	</div>
</div>
<div id="nuevo-w" class="modal hide" style="display: none;" aria-hidden="true">
	<div class="modal-header">
		<button data-dismiss="modal" class="close" type="button">×</button>
		<h3>Nuevo Elemento de Objetivo</h3>
	</div>
	<div id="items">
		
	</div>
</div>
<?php
/**************************Nuevo comentario*************************************/
?>
<div id="nuevo-com" class="modal hide" style="display: none;" aria-hidden="true">
	<div class="modal-header">
		<button data-dismiss="modal" class="close" type="button">×</button>
		<h3>Comentarios</h3>
		<form id='fcom' action='<?php echo base_url(); ?>index.php/objetivos/saveItem/' method='POST'>
			<div class="modal-body">
				<div class="control-group">
					<div class='controls'><input type='hidden' name='widget_nombre' value="Comentarios" /></div>
					<input type='hidden' value='comentario' name='type'>
					<input type='hidden' value='<?php echo $id; ?>' name='obj_id'>
					<input type='hidden' value='<?php echo $user_id; ?>' name='usuario_id'>
					<div class='controls'><textarea style='width:100%' name='cuerpo' rows='7'></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input type='submit' class='btn btn-primary' value='Guardar' name='save-comentario'>
				<a data-dismiss="modal" class="btn btn-danger" href="#">Cerrar</a>
			</div>
		</form>
	</div>
</div>
<?php
/**************************Nueva meta*************************************/
?>
<div id="nueva-meta" class="modal hide" style="display: none;" aria-hidden="true">
	<div class="modal-header">
		<button data-dismiss="modal" class="close" type="button">×</button>
		<h3>Metas</h3>

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

		echo form_open('objetivos/single/'.$id);
		echo form_fieldset('Meta nueva');
		
		?>
		<div class="modal-body">
			<div class="control-group">
				<div class='controls'><input type='hidden' name='widget_nombre' value="Comentarios" /></div>
					<input type='hidden' value='comentario' name='type'>
				<?php
				echo "<p>Nombre</p>";
				echo form_input('nombre');

				echo "<p>Descripción</p>";
				echo form_textarea('descripcion');

				echo "<p>Estado actual</p>";
				echo form_input('edo_actual');

				echo "<p>Estado a lograr</p>";
				echo form_input('edo_lograr');

				echo "<p>Métrica</p>";
				echo form_dropdown('metrica', $metricas);

				echo "<p>fecha meta</p>";
				echo form_input('fecha_meta', '', 'class="datepicker"')."<br />";

				echo form_checkbox('cuantificable', 'accept', true)."Cuantificable";

				echo "<p>Tipo</p><div class='controls'>";
				echo form_dropdown('tipo',$tipo);
				echo "</div>";

				echo "<p>Objetivos</p>";
				echo form_checkbox('promover', 'accept', true)."Promover en el personal, clientes y partes interesadas una cultura de responsabilidad en el cuidado del medio ambiente.<br />";
				echo form_checkbox('usar_menos', 'accept', true)."Usar menor número de autos";

				?>
				<input type='hidden' value='<?php echo $id; ?>' name='objetivo_id'>
				<input type='hidden' value='<?php echo $user_id; ?>' name='usuario_id'>
				<!-- CODIGO PARA DATE PICKER-->
			    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
			    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
			    <script>
			    $(function() {
			      $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
			    });
			    </script>
			    <!--TERMINA DATE PICKER-->
				
				
			</div>
		<div class="modal-footer">
			<?php
			echo form_fieldset_close();

			echo form_submit('submit_meta', 'Enviar', 'class="btn btn-primary"');
			?>
			<a data-dismiss="modal" class="btn btn-danger" href="#">Cerrar</a>
		</div>
		<?php
		echo form_close();
		?>
				

		
	</div>
</div>
<!-- ***************************** Modal Evento	***************************** -->
<div id="nuevo-event" class="modal hide" style="display: none;" aria-hidden="true">
	<div class="modal-header">
		<button data-dismiss="modal" class="close" type="button">×</button>
		<h3>Eventos</h3>
		<div class="modal-body">
			<div class="control-group">
				<?php
					$publicos=array(
						'todos'=>'todos',
						'empleados'=>'empleados',
						'niños'=>'niños',
						'vecinos'=>'vecinos',
						'clientes'=>'clientes',
						'proveedores'=>'proveedores',
						'ejecutivos'=>'ejecutivos',
					);
					$hidden=array('objetivo_id'=>$id);

					echo form_open('objetivos/single/'.$id, '', $hidden);
					echo form_fieldset('Evento nuevo');

					echo "<p>Nombre</p>";
					echo form_input('nombre');

					echo "<p>Descripción</p>";
					echo form_textarea('descripcion');

					echo "<p>fecha del evento</p>";
					echo form_input('fecha_evento', '', 'class="datepicker"');

					echo "<p>Público</p>";
					echo form_dropdown('publico', $publicos);

					echo "<p>Opciones</p>";
					echo form_checkbox('publicar', 'accept', false)."Publicar.<br />";
					echo form_checkbox('interno', 'accept', false)."Interno.";

					echo "<p>Responsable</p>";
					echo form_input('responsable');

					echo "<p>Lugar</p>";
					echo form_input('lugar');
				 ?>
				
				
			</div>
	</div>
		<div class="modal-footer">
			<?php 
			echo form_fieldset_close();
			echo form_submit('submit_evento', 'Crear Evento', 'class="btn btn-primary"');
			echo form_close();
			 ?>
			<a data-dismiss="modal" class="btn btn-danger" href="#">Cerrar</a>
		</div>
</div>
</div>


<div class="alert alert-info">
	En esta sección podrás gestionar el <strong>objetivo</strong> que seleccionaste, agregando diferentes tipos de <strong>elementos</strong>.
	<a href="#" data-dismiss="alert" class="close">×</a>
</div>
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
$this->load->view('forms/texto',$data);//Normal - Done
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
$this->load->view('forms/galeria',$data);
?>
	

	
<div style="text-align:center;">
	<div class="btn-group">
		<button id="nuevo-text" class="btn btn-success tip-top" data-original-title="Texto"><i class="icon-list-alt icon-white"></i></button>
		<button id="nuevo-impacto" class="btn btn-success tip-top" data-original-title="Impacto ambiental"><i class="icon-leaf icon-white"></i></button>
		<button id="nuevo-archivo" class="btn btn-success tip-top" data-original-title="Archivos"><i class="icon-file icon-white"></i></button>
		<button id="nuevo-meta" class="btn btn-success tip-top" data-original-title="Metas"><i class="icon-road icon-white"></i></button>
		<button id="nuevo-galeria" class="btn btn-success tip-top" data-original-title="Galería"><i class="icon-picture icon-white"></i></button>
		<button id="nuevo-legislacion" class="btn btn-success tip-top" data-original-title="Legislación ambiental"><i class="icon-briefcase icon-white"></i></button>
		<button id="nuevo-emergencia" class="btn btn-success tip-top" data-original-title="Respuesta a emergencias"><i class="icon-warning-sign icon-white"></i></button>
		<button id="nuevo-comentario" class="btn btn-success tip-top" data-original-title="Comentarios"><i class="icon-comment icon-white"></i></button>
		<button id="nuevo-evento" class="btn btn-success tip-top" data-original-title="Eventos"><i class="icon-calendar icon-white"></i></button>
		<button id="nuevo-check" class="btn btn-success tip-top" data-original-title="Lista de revisión"><i class="icon-check icon-white"></i></button>
		<button id="nuevo-responautor" class="btn btn-success tip-top" data-original-title="Responsabilidades y autoridades"><i class="icon-hand-right icon-white"></i></button>
		<button id="nuevo-mapa" class="btn btn-success tip-top" data-original-title="Mapa"><i class="icon-map-marker icon-white"></i></button>
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


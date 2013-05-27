
<?php 
$this->load->model('tiposModel');
foreach ($aspectos as $item): 

 	echo "Aspecto: ".$item->nombre;
 	echo "<br />";
 	echo "Descripción: ".$item->descripcion;
 	echo "<br />";
 	$id = $item->tipo_id;
 	$area = $this->tiposModel->getById($id);
 	

endforeach; ?>
<br/>


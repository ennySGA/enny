
<?php 
$this->load->model('tipos_aspectosModel');
foreach ($aspectos as $item): 

 	echo "Aspecto: ".$item->nombre;
 	echo "<br />";
 	echo "Descripción: ".$item->descripcion;
 	echo "<br />";
 	$id = $item->tipo_id;
 	$area = $this->tipos_aspectosModel->getById($id);
 	

endforeach; ?>
<br/>


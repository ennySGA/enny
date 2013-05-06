
<?php 
$this->load->model('areasModel');
foreach ($actividades as $item): 

 	echo "Actividad: ".$item->nombre;
 	echo "<br />";
 	echo "Descripción: ".$item->descripcion;
 	echo "<br />";
 	$id = $item->area_id;
 	$area = $this->areasModel->getById($id);
 	

endforeach; ?>
<br/>

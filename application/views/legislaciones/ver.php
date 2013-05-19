
<?php 
$this->load->model('tipos_legislacionesModel');
foreach ($legislaciones as $item): 

 	echo "Legislación: ".$item->nombre;
 	echo "<br />";
 	echo "Descripción: ".$item->descripcion;
 	echo "<br />";
 	$id = $item->nivel_id;
 	$nivel = $this->tipos_legislacionesModel->getById($id);
 	

endforeach; ?>
<br/>


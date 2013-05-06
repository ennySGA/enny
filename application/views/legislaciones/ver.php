
<?php 
$this->load->model('nivelesModel');
foreach ($legislaciones as $item): 

 	echo "Legislación: ".$item->nombre;
 	echo "<br />";
 	echo "Descripción: ".$item->descripcion;
 	echo "<br />";
 	$id = $item->nivel_id;
 	$nivel = $this->nivelesModel->getById($id);
 	

endforeach; ?>
<br/>


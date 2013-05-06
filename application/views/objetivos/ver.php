<?php 
$this->load->model('programasModel');
foreach ($objetivos as $item): 

 	echo "objetivo: ".$item->nombre;
 	echo "<br />";
 	echo "Descripción: ".$item->descripcion;
 	echo "<br />";
 	$id = $item->programa_id;
 	$programa = $this->programasModel->getById($id);
 	var_dump($progrma);

 	echo "progrma: ".$item->programa_id;

endforeach; ?>
<br/>


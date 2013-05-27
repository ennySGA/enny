
<?php 
$this->load->model('categoriasModel');
foreach ($usuarios as $item): 

 	echo "Nombre: ".$item->nombre;
 	echo "<br />";
 	echo "Apellido: ".$item->apellido;
 	echo "<br />";
 	echo "Correo: ".$item->correo;
 	echo "<br />";
 	$id = $item->categoria_id;
 	$area = $this->categoriasModel->getById($id);
 	

endforeach; ?>
<br/>


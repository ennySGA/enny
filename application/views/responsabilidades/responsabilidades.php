
	<p><a href="http://localhost/enny/index.php/responsabilidades/nuevaResponsabilidad">[+]</a> Nueva</p>
	<table>
 		<thead>
 		<tr>
 		<th></th>
 		<th></th>
 		<th>Responsable</th>
 		<th>Cargo</th>
 		<th>Responsabilidad</th>
 		<th>Autoridad</th>
 		</tr>
 		</thead>
 		<tbody>
 		<?php foreach ($responsabilidades as $r):?>
 		<tr>

 		<td><form name="alta" action="http://localhost/enny/index.php/responsabilidades/baja/" method="POST"> 		
		<input type="hidden" name="responsable" value="<?=$r->responsable?>" />
		<input type="submit" value="Eliminar"/></form></td>
		
		
		<td><form name="edit" action="http://localhost/enny/index.php/responsabilidades/accion/" method="POST"> 		
		<input type="hidden" name="editar" value="<?=$r->id?>" />
		<input type="submit" value="Editar"/></form></td>
 		<td><?=$r->responsable?></td>
 		<td><?=$r->cargo?></td>
 		<td><?=$r->responsabilidad?></td>
 		<td><?=$r->autoridad?></td>
 		</tr>
 		<?php endforeach;?>
 		</tbody>
 		</table>
 		

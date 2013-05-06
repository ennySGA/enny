
 <form name="editar" action="http://localhost/enny/index.php/responsabilidades/editar" method="POST">
 <table>
 <tr>
 <td>Responsable: </td><td><?=$responsabilidad[0]->responsable?></td>
 </tr>
 <tr><tr>
 <td>Cargo: </td><td><input name="cargo" value="<?=$responsabilidad[0]->cargo?>" type="text"/></td>
 </tr>
 <tr>
 <td>Responsabilidad: </td><td><input name="responsabilidad" value="<?=$responsabilidad[0]->responsabilidad?>" type="text"/></td>
 </tr>
 <tr>
 <td>Autoridad: </td><td><input name="autoridad" value="<?=$responsabilidad[0]->autoridad?>" type="text"/></td>
 </tr>
 </table>
 <input type="hidden" name="id" value="<?=$responsabilidad[0]->id?>"/>
 <input type="submit" value="Editar" />
 </form>

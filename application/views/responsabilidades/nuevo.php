

<?php
     $sql = "SELECT usuarios.nombre FROM usuarios INNER JOIN categorias ON usuarios.categoria_id=categorias.id WHERE categorias.nombre = 'Integrantes';";
     $query = mysql_query($sql);
     while ( $results[] = mysql_fetch_object ( $query ) );
     array_pop ( $results );
?>


<form name="alta" action="http://localhost/enny/index.php/responsabilidades/alta" method="POST">
<table>

 <tr>
 <td>Nombre</td> 
 <td>
 <select name="responsable">
     <?php foreach ( $results as $option ) : ?>
          <option value="<?php echo $option->nombre; ?>"><?php echo $option->nombre; ?></option>
     <?php endforeach; ?>
</select>
</td>
 
 <tr>
 <td>Cargo</td>
 <td><input type="text" name="cargo" value="" size="30" /></td>
 </tr>

 <tr>
 <td>Responsabilidad</td>
 <td><input type="text" name="responsabilidad" value="" size="30" /></td>
 </tr>

 <tr>
 <td>Autoridad</td>
 <td><input type="text" name="autoridad" value="" size="30" /></td>
 </tr>
 
 </table> 
 <input type="submit" value="Alta"/>
 </form>
<p></p>


<button><a href="http://localhost/enny/index.php/responsabilidades">Regresar</a></button>

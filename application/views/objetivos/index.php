<html>
<head>
	<title>Objetivos</title>
</head>
<body>
<h2>Objetivos: </h2>
<form id="posts" action="<?php echo base_url() ?>index.php/objetivos/add/" method="POST">
	<p>Nombre <input type="text" name="nombre" id="nombre" /></p>
	<p><input type="submit" value="guardar" id="guardar"></p>
</form>

<h2>Lista: </h2>
<?php if($objetivos)foreach ($objetivos as $objetivo): ?>
	<h2><?php echo anchor('objetivos/single/'.$objetivo->id, $objetivo->nombre); ?></h2>
<?php endforeach; ?>



</body>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/enny/assets/js/main.js"></script>
</html>
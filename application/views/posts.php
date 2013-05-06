<html>
<head>
	<title>Posts</title>
</head>
<body>
	<h4><?php echo anchor('posts/showAll', 'Ver todos'); ?></h4>
	<form id="posts" action="<?php echo base_url() ?>index.php/posts/addPost/" method="POST">
		<p>Titulo <input type="text" name="titulo" id="titulo" /></p>
		<p>Cuerpo<textarea id="cuerpo" name="cuerpo"></textarea></p>
		<p><input type="submit" value="guardar" id="guardar"></p>
	</form>
	<h2>Bienvenido <?php echo $this->session->userdata('username'); ?>!</h2>
     <p>Esta es un espacio solo para usuarios</p>
	<h4><?php echo anchor('login/logout', 'Logout'); ?></h4>

	<div id="items">

	</div>
	<input type="button" id="text" value="texto"/>

	

</body>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="/curso/assets/js/main.js"></script>
</html>
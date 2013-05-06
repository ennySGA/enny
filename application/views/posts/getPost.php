<html>
<head>
	<title>Post</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript">
		function getNew(id){
			$.ajax({
			  url: "<?php echo base_url() ?>index.php/posts/getNew/"+id,
			  context: document.body
			}).done(function(data) {
			  $('#new_data').html( $('#new_data').html() +"<br/>" +data);
			});
		}
	</script>
</head>
<body>
<h2>Posts: </h2>
<?php foreach ($posts as $post): ?>
		<h2><?php echo $post->titulo; ?></h2>
		<p><?php echo $post->cuerpo; ?></p>
<?php endforeach; ?>

<form action="<?php echo base_url() ?>index.php/posts/getPost/<?php echo $id ?>" method="POST">
	<textarea name="coment" id="coment"></textarea>
	<input type="submit" name="enviar" value="enviar"> 
</form>

<h2>Comentarios: </h2>
<?php if($comentarios)foreach ($comentarios as $comentario): ?>
		<p><?php echo $comentario->com_cuerpo; ?></p>
<?php endforeach; ?>

<a href="#" onmouseover="getNew(<?php echo $id ?>)">New</a>
<div id ="new_data">Hola</div>
<h2>Bienvenido <?php echo $this->session->userdata('username'); ?>!</h2>
     <p>Esta es un espacio solo para usuarios</p>
	<h4><?php echo anchor('login/logout', 'Logout'); ?></h4>
</body>
</html>

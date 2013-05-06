<html>
<head>
	<title>Todos los Posts</title>
</head>
<body>
<h4><?php echo anchor('posts/index', 'Agregar'); ?></h4>
<h2>Posts: </h2>
<?php foreach ($posts as $post): ?>
		<p><a href="<?php echo base_url(); ?>index.php/posts/getPost/<?php echo $post->id; ?>"><?php echo $post->titulo; ?></a></p>
<?php endforeach; ?>

<h2>Bienvenido <?php echo $this->session->userdata('username'); ?>!</h2>
     <p>Esta es un espacio solo para usuarios</p>
	<h4><?php echo anchor('login/logout', 'Logout'); ?></h4>

</body>
</html>

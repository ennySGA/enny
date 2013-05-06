<div id="login_form">

	<h1>Login</h1>
    <?php 
	echo form_open('login/validateCredentials');
	echo form_input('username', '','placeholder="Username"');
	echo form_password('password', '','placeholder="Password"');
	echo form_submit('submit', 'Login');
	echo "<br/><br/>";
	echo anchor('login/signup', 'Crea una cuenta');
	echo form_close();
	?>

</div><!-- end login_form-->
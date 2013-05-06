<h1>Crea una cuenta</h1>
<fieldset>
<?php
echo form_open('login/createUser');
?>
<legend>Login Info</legend>
<?php
echo form_input('username',set_value('username'),'placeholder="Username"');
echo form_input('password', set_value('password'),'placeholder="Password"');
echo form_input('password2', set_value('password2'),'placeholder="Pass confirm"');

echo form_submit('submit', 'Crear cuenta');
?>

<?php echo validation_errors('<p class="error">'); ?>
</fieldset>
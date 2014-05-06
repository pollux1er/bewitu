<div id="standardblock">
<div id="title">Formulaire de connexion</div><br>
<br>
<?php
	
	echo form_open('forms/login');
	
	echo form_fieldset('Informations de Connexion');
	
	echo form_label('Login ou Email', 'username');
	
	echo form_input('username', '');
	
	echo form_label('Mot de passe', 'password');
	
	echo form_password('password', '');
	
	echo form_fieldset_close(); 
	
	echo form_submit('mysubmit', 'Connexion');
	
	$string = "";

	echo form_close($string);
?>
</div>
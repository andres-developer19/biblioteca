<?php
	require_once("validation.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>yensdesign.com - Validate Forms using PHP and jQuery</title>
	<link rel="stylesheet" href="css/general.css" type="text/css" media="screen" />
</head>
<body>
<div id="container">
		<h1>Registration process</h1>
		
		<?php if( isset($_POST['send']) && (!validateName($_POST['name']) || !validateEmail($_POST['email']) || !validatePasswords($_POST['pass1'], $_POST['pass2']) || !validateMessage($_POST['message']) ) ):?>
				<div id="error">
					<ul>
						<?php if(!validateName($_POST['name'])):?>
							<li><strong>Nombre Inválido:</strong> Queremos los nombres con más de 3 letras!</li>
						<?php endif?>
						<?php if(!validateEmail($_POST['email'])):?>
							<li><strong>E-mail Inválido:</strong> Escriba un correo electrónico válido por favor: P</li>
						<?php endif?>
						<?php if(!validatePasswords($_POST['pass1'], $_POST['pass2'])):?>
							<li><strong>Contraseña Inválida:</strong> Las contraseñas no coinciden o no son válidas!</li>
						<?php endif?>
						<?php if(!validateMessage($_POST['message'])):?>
							<li><strong>mensage Inválido:</strong> Escriba un mensaje con por lo menos con 10 letras</li>
						<?php endif?>
					</ul>
				</div>
			<?php elseif(isset($_POST['send'])): ?>
				<div id="error" class="valid">
					<ul>
						<li><strong>Felicitaciones!</strong> todos los datos son correctos;)</li>
					</ul>
				</div>
		<?php endif?>

		<form method="post" id="customForm" action="">
			<div>
				<label for="name">Name</label>
				<input id="name" name="name" type="text" />
				<span id="nameInfo">Ingrese su nombre</span>
			</div>
			<div>
				<label for="email">E-mail</label>
				<input id="email" name="email" type="text" />
				<span id="emailInfo">Por favor ingrese un email valido!</span>
			</div>
			<div>
				<label for="pass1">Password</label>
				<input id="pass1" name="pass1" type="password" />
				<span id="pass1Info">Ingrese una clave de minimo 5 caracteres</span>
			</div>
			<div>
				<label for="pass2">Confirm Password</label>
				<input id="pass2" name="pass2" type="password" />
				<span id="pass2Info">Repita la clave</span>
			</div>
			<div>
				<label for="message">Ingrese su mensaje</label>
				<textarea id="message" name="message" cols="" rows=""></textarea>
			</div>
			<div>
				<input id="send" name="send" type="submit" value="Send" />
			</div>
		</form>
	</div>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="validation.js"></script>
</body>
</html>
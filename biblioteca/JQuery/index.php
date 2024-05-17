<?php
	require_once("validation.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Formulario</title>
	<link rel="stylesheet" href="css/general.css" type="text/css" media="screen" />
</head>
<body>
<div id="container">
		<h1>Registration process</h1>
	
		<form method="post" id="customForm" action="dos.php">
			<div>
				<label for="nombre">Nombre</label>
				<input id="nombre" name="nombre" type="text" />
				<span id="nameInfo">Ingrese su nombre</span>
			</div>
			
			<div>
				<label for="email">E-mail</label>
				<input id="email" name="email" type="text" />
				<span id="emailInfo">Por favor ingrese un email valido!</span>
			</div>
			<div>
				<label for="pass1">Clave</label>
				<input id="pass1" name="pass1" type="password" />
				<span id="pass1Info">Ingrese una clave de minimo 4 caracteres</span>
			</div>
		  <div>
				<label for="pass2">Confirme Clave </label>
				<input id="pass2" name="pass2" type="password" />
			  <span id="pass2Info">Repita la clave ingresada </span></div>
			<div>
				<label for="message">Ingrese su mensaje</label>
				<textarea id="message" name="message" cols="" rows=""></textarea>
			</div>
			<div>
				<input id="send" name="send" type="submit" value="Send" />
			</div>
		</form>
</div>
	<p>
	  <script type="text/javascript" src="jquery.js"></script>
	  <script type="text/javascript" src="validation.js"></script>
</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>fsdfsdf        </p>
</body>
</html>
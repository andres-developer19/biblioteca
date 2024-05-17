/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){
	//global vars
	var form = $("#Formulario");
	var user = $("#user");
	var userInfo = $("#userInfo");
	var pass1 = $("#pass1");
	var pass1Info = $("#pass1Info");
	var pass2 = $("#pass2");
	var pass2Info = $("#pass2Info");
	var name = $("#nombre");
	var nombreInfo = $("#nombreInfo");
	var apellido = $("#apellido");
	var apellidoInfo = $("#apellidoInfo");
	var direccion = $("#direccion");
	var telefono = $("#telefono");
	var telefonoInfo = $("#telefonoInfo");
	var email = $("#email");
	var emailInfo = $("#emailInfo");
	
	
	
	//On blur
	name.blur(validarNombre);
	apellido.blur(validarApellido);
	telefono.blur(validarTelefono);
	user.blur(validaruser);
	email.blur(validarEmail);
	pass1.blur(validarclave);
	pass2.blur(ConfirmarClave);
	//On key press
	name.keyup(validarNombre);
	apellido.keyup(validarApellido);
	telefono.keyup(validarTelefono);
	user.keyup(validaruser);
	pass1.keyup(validarclave);
	pass2.keyup(ConfirmarClave);
	direccion.keyup(validarDireccion);
	//On Submitting
	form.submit(function(){
		if(validaruser() & validarclave() & ConfirmarClave() & validarNombre() & validarApellido() & validarDireccion() & validarTelefono())
			return true
		else
			return false;
	});
	
	//funciones de validación
	function validarEmail(){
		//probando expresiones regulares
		var a = $("#email").val();
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		//Si no es un email válido
		if(filter.test(a)){
			email.removeClass("error");
			emailInfo.text("El E-mail ingresado es de tipo Valido!");
			emailInfo.removeClass("error");
			return true;
		}
		//Si no es válido
		else{
			email.addClass("error");
			emailInfo.text("El E-mail no es valido");
			emailInfo.addClass("error");
			return false;
		}
	}
	function validarNombre(){
		//Si no es válido
		if(name.val().length < 4){
			name.addClass("error");
			nombreInfo.text("El nombre debe tener al menos 4 caracteres!");
			nombreInfo.addClass("error");
			return false;
		}
		//Si es válido
		else{
			name.removeClass("error");
			nombreInfo.text("El nombre ingresado es valido");
			nombreInfo.removeClass("error");
			return true;
		}
	}
	
	function validaruser(){
		//Si no es válido
		if(user.val().length < 7){
			user.addClass("error");
			userInfo.text("El usuario debe tener al menos 7 caracteres!");
			userInfo.addClass("error");
			return false;
		}
		//Si es válido
		else{
			user.removeClass("error");
			userInfo.text("El usuario ingresada es valida");
			userInfo.removeClass("error");
			return true;
		}
	}
	
	function validarApellido(){
		//Si no es válido
		if(apellido.val().length < 4){
			apellido.addClass("error");
			apellidoInfo.text("El apellido debe tener al menos 4 caracteres!");
			apellidoInfo.addClass("error");
			return false;
		}
		//Si es válido
		else{
			apellido.removeClass("error");
			apellidoInfo.text("El apellido ingresado es valido");
			apellidoInfo.removeClass("error");
			return true;
		}
	}
	
	function validarTelefono(){
		//Si no es válido
		if(telefono.val().length < 4){
			telefono.addClass("error");
			telefonoInfo.text("El telefono debe tener al menos 4 caracteres!");
			telefonoInfo.addClass("error");
			return false;
		}
		//Si es válido
		else{
			telefono.removeClass("error");
			telefonoInfo.text("El telefono ingresado es valido");
			telefonoInfo.removeClass("error");
			return true;
		}
	}
	
	
	function validarclave(){
		var a = $("#password1");
		var b = $("#password2");

		//Si no es válido
		if(pass1.val().length <4){
			pass1.addClass("error");
			pass1Info.text("Ingrese una clave de al menos 4 caracteres!");
			pass1Info.addClass("error");
			return false;
		}
		//Si es válido
		else{			
			pass1.removeClass("error");
			pass1Info.text("La clave ingresada es de tipo valido");
			pass1Info.removeClass("error");
			ConfirmarClave();
			return true;
		}
	}
	function ConfirmarClave(){
		var a = $("#password1");
		var b = $("#password2");
		//Si no coinciden
		if( pass1.val() != pass2.val() ){
			pass2.addClass("error");
			pass2Info.text("Las claves ingresadas no coinciden!");
			pass2Info.addClass("error");
			return false;
		}
		//Si coinciden
		else{
			pass2.removeClass("error");
			pass2Info.text("Las claves ingresadas son correctas y coinciden");
			pass2Info.removeClass("error");
			return true;
		}
	}
	
	function ConfirmarClave(){
		var a = $("#password1");
		var b = $("#password2");
		//are NOT valid
		if( pass1.val() != pass2.val() ){
			pass2.addClass("error");
			pass2Info.text("Las claves ingresadas no coinciden!");
			pass2Info.addClass("error");
			return false;
		}
		//are valid
		else{
			pass2.removeClass("error");
			pass2Info.text("Las claves ingresadas son correctas y coinciden");
			pass2Info.removeClass("error");
			return true;
		}
	}
	
	function validarCampo(campo){
		//var a = $("#campo").val();
		//Si no es válido
		if(campo.val().length < 1){
			campo.addClass("error");
			campoInfo2.text("El campo debe tener al menos 1 caracteres!");
			campoInfo2.addClass("error");
			return false;
		}
		//Si no es un válido
		else{
			campo.removeClass("error");
			campoInfo2.text("El campo ingresado es valido");
			campoInfo2.removeClass("error");
			return true;
		}
	}
	
	function validarDireccion(){
		//it's NOT valid
		if(direccion.val().length < 10){
			direccion.addClass("error");
			return false;
		}
		//it's valid
		else{			
			direccion.removeClass("error");
			return true;
		}
		
	}
});
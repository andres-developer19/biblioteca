/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){
	//global vars
	var form = $("#Formulario");
	var rif = $("#rif");
	var rifInfo = $("#rifInfo");
	var razon = $("#razon");
	var razonInfo = $("#razonInfo");
	var representante = $("#representante");
	var representanteInfo = $("#representanteInfo");
	var direccion = $("#direccion");
	var telefono = $("#telefono");
	var telefonoInfo = $("#telefonoInfo");
	var email = $("#email");
	var emailInfo = $("#emailInfo");
	
	
	
	//On blur
	razon.blur(validarRazon);
	representante.blur(validarRepresentante);
	telefono.blur(validarTelefono);
	rif.blur(validarRif);
	email.blur(validarEmail);
	//On key press
	razon.keyup(validarRazon);
	representante.keyup(validarRepresentante);
	telefono.keyup(validarTelefono);
	rif.keyup(validarRif);
	direccion.keyup(validarDireccion);
	//On Submitting
	form.submit(function(){
		if(validarRif() & validarRazon() & validarRepresentante() & validarDireccion() & validarTelefono())
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
	function validarRazon(){
		//Si no es válido
		if(razon.val().length < 4){
			razon.addClass("error");
			razonInfo.text("La Razon Social debe tener al menos 4 caracteres!");
			razonInfo.addClass("error");
			return false;
		}
		//Si es válido
		else{
			razon.removeClass("error");
			razonInfo.text("La Razon Social ingresada es valido");
			razonInfo.removeClass("error");
			return true;
		}
	}
	
	function validarRif(){
		//Si no es válido
		if(rif.val().length < 7){
			rif.addClass("error");
			rifInfo.text("El Rif debe tener al menos 7 caracteres!");
			rifInfo.addClass("error");
			return false;
		}
		//Si es válido
		else{
			rif.removeClass("error");
			rifInfo.text("El Rif ingresado es valido");
			rifInfo.removeClass("error");
			return true;
		}
	}
	
	function validarRepresentante(){
		//Si no es válido
		if(representante.val().length < 4){
			representante.addClass("error");
			representanteInfo.text("El Nombre del representante debe tener al menos 4 caracteres!");
			representanteInfo.addClass("error");
			return false;
		}
		//Si es válido
		else{
			representante.removeClass("error");
			representanteInfo.text("El Nombre del representante ingresado es valido");
			representanteInfo.removeClass("error");
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
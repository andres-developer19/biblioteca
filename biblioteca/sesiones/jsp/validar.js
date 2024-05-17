function validacion(formulario) {

	var er_idf = /^[0-9]/	//numeros, espacios, + o -
	var er_nombref = /^([a-z]|[A-Z]|�|�|�|�|�|�|�|\s|\.|-)+$/ //letras, '.' y '-' o vacio
	var er_apellidof = /^([a-z]|[A-Z]|�|�|�|�|�|�|�|\s|\.|-)+$/ //letras, '.' y '-' o vacio
	var er_telefonof = /^([0-9\s\+\-])+$/	//numeros, espacios, + o -
	var er_telefono2f = /^([0-9\s\+\-])+$/	//numeros, espacios, + o -
     
	 if (formulario.idf.value.length > 8){
		alert('Contenido del campo CEDULA no v�lido.')
		return false
	 }
	 
   	if( !er_idf.test(formulario.idf.value) ) {
		alert('Contenido del campo CEDULA no v�lido.')
		return false
	}
   
   //comprueba campo de apellido
		if(!er_apellidof.test(formulario.apellidof.value)) { 
		alert('Contenido del campo APELLIDO no v�lido.')
		return false
	} 	
	
	//comprueba campo de nombre
	if(!er_nombref.test(formulario.nombref.value)) { 
		alert('Contenido del campo NOMBRE no v�lido.')
		return false
	}   	
	

	//comprueba campos de telefonos (permite campos vacios y guiones)
	if( !er_telefonof.test(formulario.telefonof.value) ) {
		alert('Contenido del campo MOVIL no v�lido.')
		return false
	}
	
		if( !er_telefono2f.test(formulario.telefono2f.value) ) {
		alert('Contenido del campo TELEFONO no v�lido.')
		return false
	}
   
	return true			
}

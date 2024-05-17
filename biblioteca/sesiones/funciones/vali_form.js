function valida_envia(){
	//se valida que no este la cja de texto vacia
	if (document.libro.cota_lib.value.length==0){
		alert("Ingrese el codigo por favor")
		document.libro.cota_lib.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
	if (document.libro.nombre_lib.value.length==0){
		alert("Ingrese el nombre por favor")
		document.libro.nombre_lib.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
	if (document.libro.autor_lib.value.length==0){
		alert("Ingrese el autor por favor")
		document.libro.autor_lib.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
	if (document.libro.asignatura_lib.value.length==0){
		alert("Ingrese el asignatura por favor")
		//document.libro.asignatura_lib.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
	if (document.libro.grado.value.length==0){
		alert("Ingrese el grado por favor")
	//	document.libro.grado_lib.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	if (document.libro.asignatura_lib.value.length==0){
		alert("Seleccione el tipo de documento por favor")
		document.libro.asignatura_lib.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	if (document.libro.grado.value.length==0){
		alert("Seleccione el grado por favor")
		document.libro.grado.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
	if (document.libro.cant_lib.value.length==0){
		alert("Ingrese la cantidad por favor")
		document.libro.cant_lib.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
/*	
	if (document.libro.otro.value.length==0){
		//alert("Ingrese el grado por favor")
	//	document.libro.grado_lib.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}*/

/*	//para validar que se ingrese una edad mayor de 18
	edad = document.fvalida.edad.value
	edad = validarEntero(edad)// se valida que sea un entero
	document.fvalida.edad.value=edad//se asigna edad a la caja detexto recuerden que si no es texto return "" lo que borra el valor vacio a la caja de texto
	if (edad==""){
		alert("Error!!!!! Ingrese un numero entero.")
		document.fvalida.edad.focus()// se devuelve el foco a la caj de texto
		return 0;
	}else{//sino esta vacio
		if (edad<18){
			alert("Solo contenido valido para mayores de 18 años.")
			document.fvalida.edad.focus()// se devuelve el foco a la caj de texto
			return 0;
		}
	}
	
	//valido el interés
	if (document.fvalida.interes.selectedIndex==0){
		alert("Debe seleccionar un motivo de su contacto.")
		document.fvalida.interes.focus()
		return 0;
	}
	
	//si llega aqui es por que todo esta lleno y ha pasado la validacion
//	*/
	
}

function valida_envia2(){
	//se valida que no este la cja de texto vacia
	if (document.documento.cota_doc.value.length==0){
		alert("Ingrese el codigo por favor")
		document.documento.cota_doc.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
	if (document.documento.nombre_doc.value.length==0){
		alert("Ingrese el nombre del documento por favor")
		document.documento.nombre_doc.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
	if (document.documento.tipo_doc.value.length==0){
		alert("Seleccione el tipo de documento por favor")
		document.documento.tipo_doc.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	if (document.documento.area.value.length==0){
		alert("Seleccione el area de documento por favor")
		document.documento.area.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
	if (document.documento.cant_doc.value.length==0){
		alert("Ingrese la cantidad por favor")
		document.documento.cant_doc.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
}


function valida_envia3(){
	//se valida que no este la cja de texto vacia
	if (document.usuario.cedulauser.value.length==0){
		alert("Ingrese la cedula por favor")
		document.usuario.cedulauser.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
	if (document.usuario.nombreuser.value.length==0){
		alert("Ingrese el nombre por favor")
		document.usuario.nombreuser.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
	if (document.usuario.apellidouser.value.length==0){
		alert("Ingrese el apellido por favor")
		document.usuario.apellidouser.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	if (document.usuario.usuario1.value.length==0){
		alert("Ingrese el usuario por favor")
		document.usuario.usuario1.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	if (document.usuario.clave.value.length==0){
		alert("Ingrese la clave por favor")
		document.usuario.clave.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	if (document.usuario.clave2.value.length==0){
		alert("Ingrese la clave otra vez por favor")
		document.usuario.clave.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	if (document.usuario.niveluser.value.length==0){
		alert("Seleccione el nivel por favor")
		document.usuario.nivel.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
}

function valida_envia4(){
	//se valida que no este la cja de texto vacia
	if (document.edituser.user.value.length==0){
		alert("Ingrese el usuario por favor")
		document.edituser.user.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
	if (document.edituser.nombreuser.value.length==0){
		alert("Ingrese el nombre por favor")
		document.edituser.nombreuser.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
	if (document.edituser.apellidouser.value.length==0){
		alert("Ingrese el apellido por favor")
		document.edituser.apellidouser.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	if (document.edituser.niveluser.value.length==0){
		alert("Seleccione el nivel por favor")
		document.edituser.niveluser.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
}


function valida_envia5(){
	//se valida que no este la cja de texto vacia
	if (document.perfil.nombre.value.length==0){
		alert("Ingrese el nombre por favor")
		document.perfil.nombre.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
	if (document.perfil.apellido.value.length==0){
		alert("Ingrese el apellido por favor")
		document.perfil.apellido.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
}

function valida_envia6(){
	//se valida que no este la cja de texto vacia
	if (document.perfil.usuario1.value.length==0){
		alert("Ingrese el nombre de usuario por favor")
		document.perfil.usuario1.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
	
}
function valida_envia7(){
	//se valida que no este la cja de texto vacia
	if (document.perfil.clave0.value.length==0){
		alert("Ingrese la contraseña anterior por favor")
		document.perfil.clave0.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
	if (document.perfil.clave1.value.length==0){
		alert("Ingrese la contraseña nueva por favor")
		document.perfil.clave1.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
	if (document.perfil.clave2.value.length==0){
		alert("Ingrese la contraseña nuevamente por favor")
		document.perfil.clave2.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
}

function valida_envia8(){
	//se valida que no este la cja de texto vacia
	if (document.estudiante.ci_est.value.length==0){
		alert("Ingrese la cedula por favor")
		//document.estudiante.ci_est.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
	if (document.estudiante.nombre_est.value.length==0){
		alert("Ingrese el nombre por favor")
	//	document.estudiante.nombre_est.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
	if (document.estudiante.apellido_est.value.length==0){
		alert("Ingrese el apellido  por favor")
		document.estudiante.apellido_est.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
/*	if (document.estudiante.grado.value.length==0){
		alert("Seleccione el grado  por favor")
		document.estudiante.grado.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	if (document.estudiante.seccion.value.length==0){
		alert("Seleccione la seccion  por favor")
		document.estudiante.seccion.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}*/
	
}

function valida_envia9(){
	//se valida que no este la cja de texto vacia
	if (document.prestamo.presionar.value.length==0){
		alert("Seleccione el tipo de persona por favor")
	//	document.estudiante.nombre_est.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
if (document.prestamo.ci_est.value.length==0){
		alert("Ingrese la cedula por favor")
		//document.estudiante.ci_est.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
}	
	
function valida_envia10(){
	//se valida que no este la cja de texto vacia
	if (document.acontecimiento.fecha4.value.length==0){
		alert("Seleccione la fecha por favor")
	//	document.estudiante.nombre_est.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
if (document.acontecimiento.titulo.value.length==0){
		alert("Ingrese el nombre del acontecimiento por favor")
		//document.estudiante.ci_est.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
	
if (document.acontecimiento.descripcion.value.length==0){
		alert("Ingrese la descripcion por favor")
		//document.estudiante.ci_est.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}
/*	
if (document.acontecimiento.archivo.value.length==0){
		alert("Seleccione la imagen por favor")
		//document.estudiante.ci_est.focus()// se devuelve el foco a la caj de texto
		return 0;//retorno  para decir que se ejecuto
	}*/
}	
	
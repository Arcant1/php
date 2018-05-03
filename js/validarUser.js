(function(){
	var formulario = document.getElementsByName('formulario')[0];
	var elementos = formulario.elements;
	var boton = document.getElementsByName('boton');
	var numeros="0123456789";
	var letras_minusculas="abcdefghyjklmnñopqrstuvwxyz";
	var letras_mayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";
	var caracteres="0123456789!@#$%&*/?";

	function tiene_caracteres(texto){
		for(i=0; i<texto.length; i++){
			if (caracteres.indexOf(texto.charAt(i),0)!=-1){
				return 1;
			}
		}
		return 0;
	}

	function tiene_mayusculas(texto){
		for(i=0; i<texto.length; i++){
			if (letras_mayusculas.indexOf(texto.charAt(i),0)!=-1){
				return 1;
			}
		}
		return 0;
	}

	function tiene_minusculas(texto){
		for(i=0; i<texto.length; i++){
			if (letras_minusculas.indexOf(texto.charAt(i),0)!=-1){
				return 1;
			}
		}
		return 0;
	}

	function tiene_numeros(texto){
		for(i=0; i<texto.length; i++){
			if (numeros.indexOf(texto.charAt(i),0)!=-1){
				return 1;
			}
		}
		return 0;
	}

	var validarNombre = function(e){
		if(formulario.nombre.value == 0) {
			alert("Completar el campo nombre");
			e.preventDefault();
		}

		if(tiene_numeros(formulario.nombre.value) == 1) {
			alert("El nombre no debe contener numeros");
			e.preventDefault();
		}

	}

	var validarApellido = function(e){
		if(formulario.apellido.value == 0) {
			alert("Completar el campo apellido");
			e.preventDefault();
		}

		if(tiene_numeros(formulario.apellido.value) == 1) {
			alert("El apellido no debe contener numeros");
			e.preventDefault();
		}
		
	}

	var validarEmail = function(e){
		if(formulario.email.value == 0) {
			alert("Completar el campo email");
			e.preventDefault();
		}
	}

	var validarPassword = function(e){
		if(formulario.password.value == 0) {
			alert("Completar el password");
			e.preventDefault();
		}

		if(formulario.password.value.length < 6){
			alert("El password debe contener mas de 6 caracteres");
			e.preventDefault();
		}

		if(!tiene_minusculas(formulario.password.value) == 1){
			alert("El password debe contener minusculas");
			e.preventDefault();
		}

		if(!tiene_mayusculas(formulario.password.value) == 1){
			alert("El password debe contener mayusculas");
			e.preventDefault();
		}

		if(!tiene_caracteres(formulario.password.value) == 1){
			alert("El password debe contener numeros o caracteres");
			e.preventDefault();
		}

	}

	var validarRePassword = function(e){
		if(formulario.password.value == formulario.confirmarpassword.value){
			if(formulario.confirmarpassword.value == 0) {
				alert("Completar el re - password");
				e.preventDefault();
			}

			if(formulario.confirmarpassword.value.length < 6){
				alert("El re - password debe contener mas de 6 caracteres");
				e.preventDefault();
			}

			if(!tiene_minusculas(formulario.confirmarpassword.value) == 1){
				alert("El Re password debe contener minusculas");
				e.preventDefault();
			}

			if(!tiene_mayusculas(formulario.confirmarpassword.value) == 1){
				alert("El Re password debe contener mayusculas");
				e.preventDefault();
			}

			if(!tiene_caracteres(formulario.confirmarpassword.value) == 1){
				alert("El Re password debe contener numeros o caracteres");
				e.preventDefault();
			}
		}else{
			alert("El password y la confirmacion deben ser iguales");
			e.preventDefault();
		}
	}

	var validar = function(e){
		validarNombre(e);
		validarApellido(e);
		validarEmail(e);
		validarPassword(e);
		validarRePassword(e);
	}
	formulario.addEventListener("submit",validar);
}());

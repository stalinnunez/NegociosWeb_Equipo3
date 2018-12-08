function burgerMenu() {
    var x = document.getElementById("burger");
    if (x.className === "burger") {
        x.className += "responsive";
    } else {
        x.className = "burger";
    }
}


function isEmail(email) {
  	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 	return regex.test(email);
}


function isText(text) {
	var regex = /^[a-zA-Z]+$/
	return regex.test(text);
}

$("#sopButton").click(function() {

	var errorMessage = "";
	var emptyMessage = "";

	if($("#sName").val() == "") {
		emptyMessage += "Falta el Nombre \n";
	}

	if($("#sLast").val() == "") {
		emptyMessage += "Falta el Apellido \n";
	}

	if($("#sTel").val() == "") {
		emptyMessage += "Falta el Telefono \n";
	}

	if($("#sEmail").val() == "") {
		emptyMessage += "Falta el Correo \n";
	}

	if(isEmail($("#sEmail").val()) == false) {
		errorMessage += "Correo no es valido \n";
	}

	if( $.isNumeric($("#sTel").val()) == false) {
		errorMessage += "Telefono no es valido \n";
	}

	if(isText($("#sName").val()) ==false) {
		errorMessage += "Nombre no es valido \n"
	}

	if(isText($("#sLast").val()) ==false) {
		errorMessage += "Apellido no es valido \n"
	}

	if( errorMessage != "") {
		alert(errorMessage)
	}

	if(emptyMessage != "") {
		alert(emptyMessage)
	}
/*
	if(emptyMessage === "" && errorMessage === "") {
		alert(formulario enviado);
	}*/

})



$("#cotButton").click(function() {

	var errorMessage = "";
	var emptyMessage = "";

	if($("#cName").val() == "") {
		emptyMessage += "Falta el Nombre \n";
	}

	if($("#cLast").val() == "") {
		emptyMessage += "Falta el Apellido \n";
	}


	if($("#cEmail").val() == "") {
		emptyMessage += "Falta el Correo \n";
	}

	if(isEmail($("#cEmail").val()) == false) {
		errorMessage += "Correo no es valido \n";


	}

	if(isText($("#cName").val()) ==false) {
		errorMessage += "Nombre no es valido \n"
	}

	if(isText($("#cLast").val()) ==false) {
		errorMessage += "Apellido no es valido \n"
	}

	if( errorMessage != "") {
		alert(errorMessage)
	}

	if(emptyMessage != "") {
		alert(emptyMessage)
	}
/*
	if(emptyMessage === "" && errorMessage === "") {
		alert(formulario enviado);
	}*/

})
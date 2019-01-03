function formataData() {
var data = document.getElementById("textoIdade").value;

if(data.length == 2) data = data + "/";
document.getElementById("textoIdade").value = data;

}

function formataTelefone() {
var telefone = document.getElementById("textoTelefone").value;

/*if(telefone.length == 0) telefone = "(" + telefone;
if(telefone.length == 3) telefone = telefone + ") ";
if(telefone.length == 9) telefone = telefone + "-";
if(telefone.length == 14) {
	dois = telefone.replace("-", "");
	seg = dois.substring(10, 14);
	telefone = dois.substring(0, 10) + "-" + seg;
}*/
switch(telefone.length) {
	case 0:
	    telefone = "(" + telefone;
	    break;
	case 3:
	    telefone = telefone + ") ";
	    break;
	case 9:
	    telefone = telefone + "-";
	    break;
	case 14:
	    dois = telefone.replace("-", "");
	    telefone = dois.substring(0, 10) + "-" + dois.substring(10, 14);
	    break;
}
document.getElementById("textoTelefone").value = telefone;

}

function validaForm() {
	
	if(document.getElementById("selectCidade").value == 0) {
		alert("Por favor, selecione a cidade");
		return false;
	}
	
	if(document.getElementById("textoNome").value == "") {
		alert("Por favor, preencha o nome");
		document.getElementById("textoNome").focus();
		return false;
	}
	
	if(document.getElementById("textoRaca").value == "") {
		alert("Por favor, preencha a raça");
		document.getElementById("textoRaca").focus();
		return false;
	}
	
	if(document.getElementById("selectSexo").value == 0) {
		alert("Por favor, selecione o sexo do animal");
		return false;
	}
	
	if(document.getElementById("textoIdade").value != "") {
		var idade = [];
		var dia = new Date();
		ano = dia.getFullYear();
		mes = dia.getMonth() + 1;
		idade = document.getElementById("textoIdade").value.split("/");
		if(idade[0] < 1 || idade[0] > 12) {
			alert("Informe o mês de nascimento correto");
			return false;
			}
			else if(idade[1] > ano) {
				alert("Informe o ano de nascimento correto");
				return false;
				}
				else if(idade[0] > mes && idade[1] >= ano) {
					alert("Informe o mês e ano de nascimento corretos");
					return false;
					}
	} else {
		if(document.getElementById("textoIdade").value < 7 && document.getElementById("textoIdade").value > 0) {
			alert("Por favor, preencha o mês e ano de nascimento corretos.");
			return false;
		}
	}
	
	if(document.getElementById("textoEmail").value == "") {
		alert("Por favor, preencha o e-mail");
		document.getElementById("textoEmail").focus();
		return false;
	}

	if(document.getElementById("textoTelefone").value == "" || document.getElementById("textoTelefone").value.length < 14) {
		alert("Por favor, preencha o telefone nos seguintes formatos: (##) ####-#### ou (##) #####-####");
		document.getElementById("textoTelefone").focus();
		return false;
	}
	
	if(document.getElementById("textoTelefone").value.substring(9, 10) != "-" && document.getElementById("textoTelefone").value.length == 14) {
		dois = document.getElementById("textoTelefone").value.replace("-","");
		document.getElementById("textoTelefone").value = dois.substring(0, 9) + "-" + dois.substring(9, 13);
		alert("O número do telefone será formatado");
		return false;
	}
	
	if(document.getElementById("arqFoto").value == "") {
		alert("Por favor, carregue uma foto");
		return false;
    }
	
	if(!document.getElementById("arqFoto").value.endsWith(".jpg") && !document.getElementById("arqFoto").value.endsWith(".bmp") && 
	!document.getElementById("arqFoto").value.endsWith(".jpeg") && !document.getElementById("arqFoto").value.endsWith(".png")) {
		alert("Por favor, adicione um arquivo de foto.");
		return false;
	}
	
}

/*window.onload = function() {
	var dataNasc = document.getElementById("textoIdade");
	dataNasc.onkeypress = mascaraNasc('##-####', dataNasc.value);
}*/
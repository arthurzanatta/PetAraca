function formatar(mascara, documento) {
var i = documento.value.length, saida = mascara.substring(0,1), texto = mascara.substring(i), j;

//alert(i);
if(texto.substring(0,1) != saida) {
    documento.value += texto.substring(0,1);
}

}

function formatarTelefone(telefone) {
var re = /(\d{2})\s(\d{4,5})(\d{4})/;
var aux;

document.getElementById("textoTelefone").value = telefone.replace(re, "($1) $2-$3");
alert(document.getElementById("textoTelefone").value.charAt(document.getElementById("textoTelefone").value.length - 5));
if(document.getElementById("textoTelefone").value.length == 14 && document.getElementById("textoTelefone").value.charAt(document.getElementById("textoTelefone").value.length - 5) != '-') {
    aux = document.getElementById("textoTelefone").value.charAt(document.getElementById("textoTelefone").value.length - 5);
    document.getElementById("textoTelefone").value.replace(document.getElementById("textoTelefone").value.length - 5, document.getElementById("textoTelefone").value.length - 4, '-');
    document.getElementById("textoTelefone").value.replace(document.getElementById("textoTelefone").value.length - 4, document.getElementById("textoTelefone").value.length - 3, aux);
    //document.getElementById("textoTelefone").value.charAt(document.getElementById("textoTelefone").value.length - 5) = '-';
    //document.getElementById("textoTelefone").value.charAt(document.getElementById("textoTelefone").value.length - 4) = aux;
}

}

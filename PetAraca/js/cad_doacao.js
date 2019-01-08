function validaForm() {
    if(document.getElementById("textoAnunciante").value == "") {
        alert("Por favor, informe o anunciante");
        return false;
    }
    if(document.getElementById("textoContato").value == "") {
        alert("Por favor, informe o contato");
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
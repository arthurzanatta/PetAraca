/*window.onload = function() {
	var site = location.href;
	var tabela = site.split("=");
	var btn = document.getElementById("botaoVoltar");
	btn.onclick = window.open("moderador_anuncios_" + tabela[2] + ".php");
}*/

function PaginaModeracao(tipo) {
	if(tipo == 'animal') location.href = "moderador_anuncios_namoro.php"
	else if(tipo == 'doacao') location.href = "moderador_anuncios_doacao.php"
	else if(tipo == 'moderador') location.href = "moderador_pendente.php"
}

function PaginaInicialModeracao() {
	location.href = "opcoes_moderador.php"
}
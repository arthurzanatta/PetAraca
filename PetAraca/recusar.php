<?php
include_once("conexao.php");

$tabela = $_GET['tabela'];
if($tabela == 'moderador') {
	$codigo = $_GET['cod'];
	mysqli_query($mysqli, "DELETE FROM $tabela WHERE codigo = $codigo");
}
else {
	$id = $_GET['id'];
	mysqli_query($mysqli, "DELETE FROM $tabela WHERE id = $id");
}
echo 'Cadastro recusado!';
echo '<head><script type="text/javascript" src="js/moderador.js"></script></head>';
echo '</br></br><button id="botaoVoltar" onClick="PaginaModeracao(\'' . $tabela . '\')">Voltar</button>';
mysqli_close($mysqli);
?>
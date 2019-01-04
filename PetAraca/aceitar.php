<?php
include_once("conexao.php");

$tabela = $_GET['tabela'];
if($tabela == 'moderador'){
    $codigo = $_GET['cod'];
    mysqli_query($mysqli, "UPDATE $tabela SET aprovado = 1 WHERE codigo = $codigo");
}
else {
    $id = $_GET['id'];
    mysqli_query($mysqli, "UPDATE $tabela SET disponivel = 1 WHERE id = $id");
}
echo 'Cadastro aceito!';
echo '<head><script type="text/javascript" src="js/moderador.js"></script></head>';
echo '</br></br><button id="botaoVoltar" onClick="PaginaModeracao(\'' . $tabela . '\')">Voltar</button>';
mysqli_close($mysqli);
?>
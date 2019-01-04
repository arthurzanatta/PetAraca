<?php

session_start();
header('Content-Type: text/html; charset=utf-8');
include_once("busca.php");

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>PetAraçá - Moderador de Anúncios PetNamoro</title>
</head>
<body>
<link href="anuncios_namoro.css" rel="stylesheet">
<?php
if(isset($_SESSION['usuarioLogin']) && isset($_SESSION['usuarioSenha'])) {
    $query = 'SELECT Max(id) FROM animal WHERE disponivel = 0';
    $max = buscaNum($query);
    $query = 'SELECT Min(id) FROM animal WHERE disponivel = 0';
    $min = buscaNum($query);
    if($min != "") {
        for($i = $min; $i <= $max; $i++) {
            echo '<div>';
            echo '<div class="esquerda">';
            if($i > $min) echo '<br>';
            echo 'Cidade: ';
            $query = 'SELECT cidade FROM animal WHERE id = ' . $i . ' AND disponivel = 0';
            echo busca($query, 0, 0, "") . '</br>';
            echo 'Nome: ';
            $query = 'SELECT nome FROM animal WHERE id = ' . $i . ' AND disponivel = 0';
            echo busca($query, 0, 0, "") . '</br>';
            echo 'Raça: ';
            $query = 'SELECT raca FROM animal WHERE id = ' . $i . ' AND disponivel = 0';
            echo busca($query, 0, 0, "") . '</br>';
            echo 'Sexo: ';
            $query = 'SELECT sexo FROM animal WHERE id = ' . $i . ' AND disponivel = 0';
            echo busca($query, 0, 0, "") . '</br>';
            echo 'Cor: ';
            $query = 'SELECT cor FROM animal WHERE id = ' . $i . ' AND disponivel = 0';
            echo busca($query, 0, 0, "") . '</br>';
            echo 'Ano de nascimento: ';
            $query = 'SELECT anonasc FROM animal WHERE id = ' . $i . ' AND disponivel = 0';
            $array = explode("-", $query);
            echo busca($query, 1, 0, "") . '</br>';
            echo 'E-mail: ';
            $query = 'SELECT email FROM animal WHERE id = ' . $i . ' AND disponivel = 0';
            echo busca($query, 0, 0, "") . '</br>';
            echo 'Telefone: ';
            $query = 'SELECT telefone FROM animal WHERE id = ' . $i . ' AND disponivel = 0';
            echo busca($query, 0, 0, "") . '</br>';
            echo '</div>';
            echo '<div class="direita">';
            if($i > $min) echo '<br>';
            $query = 'SELECT descricao FROM animal WHERE id = ' . $i . ' AND disponivel = 0';
            echo busca($query, 0, 0, "") . '</br>';
            $query = 'SELECT datapublicacao FROM animal WHERE id = ' . $i . ' AND disponivel = 0';
            echo 'Data de publicação: ' . buscaDataAtual($query) . '</br>';
            $query = 'SELECT foto FROM animal WHERE id = ' . $i . ' AND disponivel = 0';
            echo busca($query, 2, $i, "animal");
            echo '</br>';
            echo '<form action="aceitar.php?id=' . $i . '&tabela=animal" method="post"><input type="submit" name="botaoAceitar' . $i . '" value="Aceitar" onClick=""></form> &nbsp;';
            echo '<form action="recusar.php?id=' . $i . '&tabela=animal" method="post"><input type="submit" name="botaoRecusar' . $i . '" value="Recusar" onClick=""></form></br>';
            echo '</div>';
            echo '</div>';
        }
    } else echo 'Não há registros de novos animais para o PetNamoro.';
}
else header("Location: login_moderador.php");
echo '<head><script type="text/javascript" src="js/moderador.js"></script></head>';
echo '</br></br><button id="botaoPagInicial" onClick="PaginaInicialModeracao()">Voltar à pagina de moderador</button>';

?>
</div>
</body>
</html>
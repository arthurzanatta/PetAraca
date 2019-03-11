<?php

session_start();
header('Content-Type: text/html; charset=utf-8');
include_once("busca.php");

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pet Araçá - Moderação de Anúncios de Doação</title>
</head>
<body>
<link href="anuncios_namoro.css" rel="stylesheet">
<?php
if(isset($_SESSION['usuarioLogin']) && isset($_SESSION['usuarioSenha'])) {
    $query = 'SELECT Max(id) FROM doacao WHERE disponivel = 0';
    $max = buscaNum($query);
    $query = 'SELECT Min(id) FROM doacao WHERE disponivel = 0';
    $min = buscaNum($query);
    if($min != "") {
        for($i = $min; $i <= $max; $i++) {
            echo '<div>';
            if($i > $min) echo '<br>';
            echo 'Descricao: ';
            $query = 'SELECT descricao FROM doacao WHERE id = ' . $i;
            echo busca($query, 0, 0, "") . '</br>';
            echo 'Anunciante: ';
            $query = 'SELECT anunciante FROM doacao WHERE id = ' . $i;
            echo busca($query, 0, 0, "") . '</br>';
            echo 'Contato: ';
            $query = 'SELECT contato FROM doacao WHERE id = ' . $i;
            echo busca($query, 0, 0, "") . '</br>';
            $query = 'SELECT foto FROM doacao WHERE id = ' . $i;
            echo busca($query, 2, $i, "doacao");
            echo '</br>';
            echo '<form action="aceitar.php?id=' . $i . '&tabela=doacao" method="post"><input type="submit" name="botaoAceitar' . $i . '" value="Aceitar" onClick=""></form> &nbsp;';
            echo '<form action="recusar.php?id=' . $i . '&tabela=doacao" method="post"><input type="submit" name="botaoRecusar' . $i . '" value="Recusar" onClick=""></form></br>';
            echo '</div>';
        }
    } else echo 'Não há novos registros de doações.';
}
else header("Location: login_moderador.php");
echo '<head><script type="text/javascript" src="js/moderador.js"></script></head>';
echo '</br></br><button id="botaoPagInicial" onClick="PaginaInicialModeracao()">Voltar à pagina de moderador</button>';
?>
</div>
</body>
</html>
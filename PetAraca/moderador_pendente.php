<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include_once("busca.php");

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pet Araçá - Moderadores Pendentes</title>
</head>
<body>
<link href="anuncios_namoro.css" rel="stylesheet">
<?php
if(isset($_SESSION['usuarioLogin']) && isset($_SESSION['usuarioSenha'])) {
    $query = 'SELECT Max(codigo) FROM moderador WHERE aprovado = 0';
    $max = buscaNum($query);
    $query = 'SELECT Min(codigo) FROM moderador WHERE aprovado = 0';
    $min = buscaNum($query);
    if($min != "") {
        for($i = $min; $i <= $max; $i++) {
            echo '<div>';
            echo '<div class="esquerda">';
            if($i > $min) echo '<br>';
            echo 'Nome: ';
            $query = 'SELECT nome FROM moderador WHERE codigo = ' . $i . ' AND aprovado = 0';
            echo busca($query, 0, 0, "") . '</br>';
            echo 'Login: ';
            $query = 'SELECT login FROM moderador WHERE codigo = ' . $i . ' AND aprovado = 0';
            echo busca($query, 0, 0, "") . '</br></br>';
            echo '<form action="aceitar.php?cod=' . $i . '&tabela=moderador" method="post"><input type="submit" name="botaoAceitar' . $i . '" value="Aceitar"
            onClick=""></form> &nbsp;';
            echo '<form action="recusar.php?cod=' . $i . '&tabela=moderador" method="post"><input type="submit" name="botaoRecusar' . $i . '" value="Recusar"
            onClick=""></form></br>';
            echo '</div>';
            echo '</div>';
        }
    } else echo 'Não há solicitações para novos moderadores.';
}
else header("Location: login_moderador.php");
echo '<head><script type="text/javascript" src="js/moderador.js"></script></head>';
echo '</br></br><button id="botaoPagInicial" onClick="PaginaInicialModeracao()">Voltar à pagina de moderador</button>';
?>
</div>
</body>
</html>
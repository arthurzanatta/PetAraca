<?php
    header('Content-Type: text/html; charset=utf-8');
    session_start();
    
    if(isset($_SESSION['usuarioLogin']) && isset($_SESSION['usuarioSenha'])) {
        echo '</br><a href="moderador_anuncios_namoro.php">Novos cadastros de encontros</a>
        </br><a href="moderador_anuncios_doacao.php">Novos cadastros de doações</a>
        </br><a href="moderador_pendente.php">Novos cadastros de moderadores</a>
        </br></br><a href="sair_moderador.php">Sair</a>';
    }
    else {
        $_SESSION['loginErro'] = "Usuário ou senha inválidos!";
        header("Location: login_moderador.php");
    }
?>
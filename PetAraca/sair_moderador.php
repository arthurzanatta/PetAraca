<?php

session_start();
session_destroy();

unset (
    $_SESSION['usuarioLogin'],
	$_SESSION['usuarioSenha']
);

header("Location: login_moderador.php");

?>
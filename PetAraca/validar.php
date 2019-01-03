<?php
	session_start();
	include_once("conexao.php");
	
	if(isset($_POST['textoLogin']) && isset($_POST['textoSenha'])) {
		$login = mysqli_real_escape_string($mysqli, $_POST['textoLogin']); //Escapar de caracteres especiais, prevenindo SQL injection
		$senha = mysqli_real_escape_string($mysqli, $_POST['textoSenha']);
		$senha = md5($senha);
		$query = "SELECT * FROM moderador WHERE login = '$login' AND senha = '$senha' AND aprovado = 1 LIMIT 1";
		$result = mysqli_query($mysqli, $query);
		$resultado = mysqli_fetch_assoc($result);
		if(isset($resultado)) {
			$_SESSION['usuarioLogin'] = $resultado['login'];
			$_SESSION['usuarioSenha'] = $resultado['senha'];
			header("Location: opcoes_moderador.php");
		}
		else if(isset($_POST['textoLogin']) && isset($_POST['textoSenha'])){
			$_SESSION['loginErro'] = "Usuário ou senha inválidos!";
		    header("Location: login_moderador.php");
		}
	}
	else {
		$_SESSION['loginErro'] = "Insira o(s) campo(s) em branco!";
		header("Location: login_moderador.php");
	}
?>
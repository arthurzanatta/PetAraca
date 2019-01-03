<?php
    session_start();
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="img/logo-pet-araca.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="img/logo-pet-araca.ico" type="image/x-icon" />
	<title>PetAraçá - Login de moderador</title>
</head>
<body>
    <h1>Área de Moderação</h1>
    <div>
	<form action="validar.php" method="post" id="formLogin" name="formLogin">
	    <h3>Login de moderador</h3>
		<p>
		    <label>Login</label>
			<input type="text" required="true" id="textoLogin" name="textoLogin">
		</p>
		<p>
		    <label>Senha</label>
			<input type="password" required="true" id="textoSenha" name="textoSenha">
		</p>
		<p>
		    <input type="submit" id="botaoEntrar" name="botaoEntrar" value="Entrar">
		</p>
	</form>
	<p>
	    <?php
			if(isset($_SESSION['loginErro'])) {
				echo $_SESSION['loginErro'];
				unset($_SESSION['loginErro']);
			}
		?>
	</p>
	<p>
	    <?php
			if(isset($_SESSION['loginDeslogado'])) {
				echo $_SESSION['loginDeslogado'];
				unset($_SESSION['loginDeslogado']);
			}
		?>
	</p>
	</div>
	<div>
	<form action="form_cad_moderador.php" method="post" id="formCadastrar" name="formCadastrar">
	    <h3>Cadastro de moderador</h3>
		<p>
		    <label>Nome</label>
			<input type="text" required="true" id="textoNomeN" name="textoNomeN">
		</p>
		<p>
		    <label>Login</label>
			<input type="text" required="true" id="textoLoginN" name="textoLoginN">
		</p>
		<p>
		    <label>Senha</label>
			<input type="password" required="true" id="textoSenhaN" name="textoSenhaN">
		</p>
		<input type="submit" id="botaoCadastrar" name="botaoCadastrar" value="Cadastrar">
	</form>
	</div>
</body>
</html>
<?php
header('Content-Type: text/html; charset=utf-8');
//include_once("conexao.php");
include_once("busca.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function cadastrar() {

//if(isset($_POST['botaoCadastrar']) {
	$mysqli = new mysqli('*********', '****', '*****', '********') or die('Erro ao conectar ao banco: ' . mysqli_error($mysqli));
	$descricao = $_POST['textoDescricao'];
    $anunciante = $_POST['textoAnunciante'];
	$contato = $_POST['textoContato'];
	$foto = $_FILES['arqFoto'];
	//$conteudo = file_get_contents($foto['tmp_name']);
	$queryfoto = "SELECT Max(id) FROM doacao";
	$idfoto = buscaNum($queryfoto);
	$idfoto++;
	$mysqlFoto = NULL;
	
	if(isset($foto)) {
		$nomeFinal = 'img/doacao' . $idfoto . '.jpg';
		if(move_uploaded_file($foto['tmp_name'], $nomeFinal)) {
			$tamanhoFoto = filesize($nomeFinal);
			$mysqlFoto = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoFoto));
		}
	}
	else echo 'Você não fez o upload de forma satisfatória.';
	
    $sql = "INSERT INTO doacao (id, descricao, anunciante, contato, foto, disponivel) VALUES ('$idfoto', '$descricao','$anunciante', '$contato', '$mysqlFoto', 0)";
    $query = mysqli_query($mysqli, $sql) or die("Erro de inserção!");
	enviarEmail($descricao, $anunciante, $contato, $nomeFinal);
	if($mysqli == NULL) echo "A variável mysqli é nulo!";
	require_once "cad_ok.php";
    mysqli_close($mysqli);
//}
}

function enviarEmail($descricao, $anunciante, $contato, $foto) {

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'petaracatuba@gmail.com';
$mail->Password = '**********';
$mail->Port = 587;
$mail->setFrom('petaracatuba@gmail.com');
$mail->addAddress('petaracatuba@gmail.com');
$mail->addAddress('duguena@hotmail.com');
$mail->isHTML(true);
$mail->Subject = 'Novo cadastro para doação';
$mail->Body = "<!DOCTYPE HTML>
<html>
<head>
    <meta charset=\"utf-8\">
</head>
<body>
<h2>&nbsp;Novo cadastro de doação</h2>

Descrição: $descricao
<br>
Anunciante: $anunciante
<br>
Contato: $contato";
$mail->addAttachment($foto);
$mail->send();
}

cadastrar();
?>
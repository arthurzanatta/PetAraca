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
$sexoArray = array(0 => "", 1 => "Fêmea", 2 => "Macho");
$tamanhoArray = array(0 => "", 1 => "Micro", 2 => "Pequeno", 3 => "Médio", 4 => "Grande");
$cidadeArray = array(0 => "", 1 => "Araçatuba", 2 => "Auriflama", 3 => "Bilac", 4 => "Birigui", 5 => "Buritama",
6 => "Guararapes", 7 => "Penápolis");

date_default_timezone_set('America/Sao_Paulo');

//if(isset($_POST['botaoCadastrar']) {
    $mysqli = new mysqli('*********', '*******', '*****', '******') or die('Erro ao conectar ao banco: ' . mysqli_error($mysqli));
    $cidade = $cidadeArray[$_POST['selectCidade']];
    $nome = $_POST['textoNome'];
    $raca = $_POST['textoRaca'];
    $sexo = $sexoArray[$_POST['selectSexo']];
    $cor = $_POST['textoCor'];
    if($cor == null) $cor = "";
    $data = $_POST['textoIdade'];
    if($data != null) {
        $anoArray = explode('/', $data);
        $anoNascimento = $anoArray[1].'-'.$anoArray[0].'-'.'01';
    }
    else $anoNascimento = null;
    $tamanho = $tamanhoArray[$_POST['selectTamanho']];
    $email = $_POST['textoEmail'];
    $telefone = $_POST['textoTelefone'];
    $descricao = $_POST['textoDescricao'];
    if($descricao == null) $descricao = "";
    $foto = $_FILES['arqFoto'];
    $queryfoto = "SELECT Max(id) FROM animal";
    $nfoto = buscaNum($queryfoto);
    $nfoto++;
    $mysqlFoto = NULL;
    $dataAtual = date('Y-m-d', time());
    
    if(isset($foto)) {
        $nomeFinal = 'img/animal' . $nfoto . '.jpg';
        if(move_uploaded_file($foto['tmp_name'], $nomeFinal)) {
            $tamanhoFoto = filesize($nomeFinal);
            $mysqlFoto = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoFoto));
        }
    }
    else echo 'Você não fez o upload de forma satisfatória.';
    
    $sql = "INSERT INTO animal (id, cidade, nome, raca, sexo, cor, anonasc, tamanho, disponivel, email, telefone, descricao, foto, datapublicacao) VALUES
    ('$nfoto', '$cidade', '$nome', '$raca', '$sexo', '$cor', '$anoNascimento', '$tamanho', 0, '$email', '$telefone', '$descricao', '$mysqlFoto',
    '$dataAtual')";
    $query = mysqli_query($mysqli, $sql) or die("Erro de inserção!");
    enviarEmail($cidade, $nome, $raca, $sexo, $cor, $anoNascimento, $email, $telefone, $descricao, $nomeFinal, $dataAtual);
    if($mysqli == NULL) echo "mysqli é nulo!";
    require_once "cad_ok.php";
    mysqli_close($mysqli);
//}
}

function enviarEmail($cidade, $nome, $raca, $sexo, $cor, $anoNascimento, $email, $telefone, $descricao, $foto, $dataAtual) {

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'p3plcpnl0857.prod.phx3.secureserver.net';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Username = 'petaraca@petaraca.com.br';
$mail->Password = '**********';
$mail->Port = 465;
$mail->setFrom('petaraca@petaraca.com.br');
$mail->addAddress('petaracatuba@gmail.com');
$mail->addAddress('duguena@hotmail.com');
$mail->isHTML(true);
$mail->Subject = 'Novo cadastro para encontro';
$mail->Body = "<!DOCTYPE HTML>
<html>
<head>
    <meta charset=\"utf-8\">
</head>
<body>
<h2>&nbsp;Novo cadastro de animal</h2>

Cidade: $cidade
<br>
Nome: $nome
<br>
Raça: $raca
<br>
Sexo: $sexo
<br>
Cor: $cor
<br>
Ano de nascimento: $anoNascimento
<br>
E-mail: $email
<br>
Telefone: $telefone
<br>
Descrição: $descricao
<br>
Data de publicação: $dataAtual";
$mail->addAttachment($foto);
$mail->send();
}

cadastrar();